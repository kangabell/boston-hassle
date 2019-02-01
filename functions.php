<?php

/*

BOSTON HASSLE Theme Functions
Author: Kay Belardinelli
URL: http://kangabell.co

*/


/************* BASICS ***************/

// set maximum allowed width for content
if ( ! isset( $content_width ) )
    $content_width = 1400;

// remove WP version from RSS
add_filter('the_generator', 'bhass_rss_version');
// clean up gallery output in wp
add_filter('gallery_style', 'bhass_gallery_style');
// remove p tags from category description
remove_filter('term_description','wpautop');

// enqueue base scripts and styles
add_action('wp_enqueue_scripts', 'bhass_scripts_and_styles', 999);

// launching this stuff after theme setup
add_action('after_setup_theme','bhass_theme_support');
// add stuff to the wordpress Customizer
add_action( 'customize_register', 'bhass_customize_register' );
// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'bhass_register_sidebars' );
// adding the search form
add_filter( 'get_search_form', 'bhass_wpsearch' );

// cleaning up random code around images & blockquotes
add_filter('the_content', 'bhass_filter_ptags_on_images');
add_filter('the_content', 'bhass_filter_ptags_on_blockquotes');
// cleaning up excerpt
add_filter('excerpt_more', 'bhass_excerpt_more');
// shorter excerpt
add_filter( 'excerpt_length', 'bhass_lengthen_excerpt', 999 );
// add class to excerpt paragraph
add_filter( "the_excerpt", "add_excerpt_class" );
add_filter( "tribe_events_get_the_excerpt", "add_event_excerpt_class" );
//remove recurring info on events in list
add_action( 'tribe_before_get_template_part', 'bhass_remove_rec_tooltip' );
// modify output of WordPress Popular Posts plugin
add_filter( 'wpp_custom_html', 'bhass_popular_posts_html', 10, 2 );



/*********************
CLEANUP
*********************/

// remove WP version from RSS
function bhass_rss_version() { return ''; }

// remove WP version from scripts
function bhass_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}

// remove injected CSS from gallery
function bhass_gallery_style($css) {
  return preg_replace("!<style type='text/css'>(.*?)</style>!s", '', $css);
}

// remove the p from around imgs & blockquotes (http://css-tricks.com/snippets/wordpress/remove-paragraph-tags-from-around-images/)
function bhass_filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
function bhass_filter_ptags_on_blockquotes($content){
   return preg_replace('|<p><blockquote([^>]*)>|i', "<blockquote$1><p>", $content);
}

// Change "[...]more>>" to "...".
function bhass_excerpt_more($more) {
    global $post;
    return '...';
}

// Shorten excerpt length
function bhass_lengthen_excerpt( $length ) {
    return 22;
}

// Add a class to excerpt paragraph
function add_excerpt_class( $excerpt ) {
    $excerpt = str_replace( "<p", "<p class=\"excerpt\"", $excerpt );
    return $excerpt;
}
function add_event_excerpt_class( $excerpt ) {
    $excerpt = str_replace( "<p", "<p class=\"excerpt\"", $excerpt );
    return $excerpt;
}

// Disable Recurring Info on Events List
function bhass_remove_rec_tooltip( $template ) {
    Tribe__Events__Pro__Main::instance()->disable_recurring_info_tooltip();
}

// Get name of first category in categories array
function category_name() {
        
    $category = get_the_category();
    $event_id = get_the_ID();
    $event_cats = wp_get_object_terms( $event_id, array( 'tribe_events_cat' ) );
     
    if ( empty( $event_cats ) ) { // not an event
        $name = $category[0]->cat_name;
    } else {
        $name = $event_cats[0]->name;
    }

    return '<span class="category">' . $name . '</span>';

}

function short_title() {

    $title = get_the_title();
    return wp_trim_words( $title, 14, '...' );

}


/*********************
SCRIPTS & ENQUEUEING
*********************/

// loading jquery and reply script
function bhass_scripts_and_styles() {
  if (!is_admin()) {

    // main stylesheet
    wp_register_style( 'bhass-stylesheet', get_stylesheet_directory_uri() . '/library/stylesheets/screen.css', array(), filemtime( plugin_dir_path( __FILE__ ) .  '/library/stylesheets/screen.css' ), 'all' );

    // theme scripts file
    wp_register_script( 'bhass-js', get_stylesheet_directory_uri() . '/library/scripts/scripts.js', array( 'jquery' ), '', true );

    // enqueue styles and scripts
    wp_enqueue_style( 'bhass-stylesheet' );

    wp_enqueue_script( 'bhass-js' );

    // create site url variable to be used in js
    $translation_array = array( 'templateUrl' => get_stylesheet_directory_uri() );
    wp_localize_script( 'bhass-js', 'wpurl', $translation_array );

  }
}

function bhass_replace_tribe_events_bar() {

    wp_dequeue_script( 'tribe-events-bar' );

    wp_enqueue_script( 'bhass-events-bar', get_stylesheet_directory_uri() . '/library/scripts/tribe-events-bar.min.js', array( 'jquery' ), '', true );

}

add_action( 'wp_print_scripts', 'bhass_replace_tribe_events_bar', 100 );


/*********************
THEME SUPPORT
*********************/

// Adding WP 3+ Functions & Theme Support
function bhass_theme_support() {

    // rss thingy
    add_theme_support('automatic-feed-links');

    // wp menus
    add_theme_support( 'menus' );

    // registering wp3+ menus
    register_nav_menus(
        array(
            'main-nav-top' => __( 'Main Menu First Section', 'bhass' ),
            'main-nav-categories' => __( 'Main Menu Categories', 'bhass' ),
            'main-nav-links' => __( 'Main Menu Second Links', 'bhass' ),
            'main-nav-buttons' => __( 'Main Menu Buttons', 'bhass' )
        )
    );

    // featured images
    add_theme_support( 'post-thumbnails' ); 

    add_image_size( 'grid-thumb', 560, 300, array( 'center', 'center') );
    
} /* end bhass theme support */

/*********************
CUSTOMIZER
*********************/

function bhass_customize_register( $wp_customize ) {


    // add customizable logo

    $wp_customize->add_setting( 'bhass_logo', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'bhass_logo', array(
        'label'    => __( 'Logo', 'bhass' ),
        'section'  => 'title_tagline',
        'priority' => 1,
        'settings' => 'bhass_logo',
    ) ) );


    // add customizable subfooter text

    $wp_customize->add_setting( 'sub_footer' );

    $wp_customize->add_control(
        new WP_Customize_Control(
            $wp_customize,
            'sub_footer',
            array(
                'label'          => __( 'Sub-footer Text', 'bhass' ),
                'section'        => 'title_tagline',
                'settings'       => 'sub_footer',
                'type'           => 'text'
            )
        )
    );

}

/*********************
MENUS & NAVIGATION
*********************/

// main menu top area
function bhass_main_nav_top() {
    wp_nav_menu(array(
        'container' => false,
        'menu' => __( 'Main Menu First Area', 'bhass' ),
        'theme_location' => 'main-nav-top',
        'depth' => 2,
    ));
}

// main menu categories area
function bhass_main_nav_categories() {
    wp_nav_menu(array(
        'container' => false,
        'menu' => __( 'Main Menu Categories Area', 'bhass' ),
        'theme_location' => 'main-nav-categories',
        'depth' => 2,
    ));
}

// main menu links area
function bhass_main_nav_links() {
    wp_nav_menu(array(
        'container' => false,
        'menu' => __( 'Main Menu Links Area', 'bhass' ),
        'theme_location' => 'main-nav-links',
        'depth' => 2,
        // 'fallback_cb' => 'bhass_main_nav_fallback'
    ));
}

// main menu buttons area
function bhass_main_nav_buttons() {
    wp_nav_menu(array(
        'container' => false,
        'menu' => __( 'Main Menu Buttons Area', 'bhass' ),
        'theme_location' => 'main-nav-buttons',
        'depth' => 1,
    ));
}


/************* MODIFIED TITLE ********************/
// makes a nicely formatted title to go in the head of the document

function bhass_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() )
        return $title;

    // Add the site name.
    $title .= get_bloginfo( 'name' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    return $title;
}
add_filter( 'wp_title', 'bhass_wp_title', 10, 2 );


/************* ACTIVE SIDEBARS ********************/

function bhass_register_sidebars() {
    register_sidebar(array(
        'id' => 'sidebar',
        'name' => __('Sidebar', 'bhass'),
        'description' => __('The sidebar for the archive/category pages.', 'bhass'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'id' => 'sidebar_events',
        'name' => __('Events Sidebar', 'bhass'),
        'description' => __('The sidebar for the events page.', 'bhass'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'id' => 'sidebar_page',
        'name' => __('Page Sidebar', 'bhass'),
        'description' => __('The sidebar for the pages using the "Two-Column Page" template.', 'bhass'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'id' => 'footer_left',
        'name' => __('Footer: Left', 'bhass'),
        'description' => __('Left section of the footer.', 'bhass'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
       'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'id' => 'footer_middle',
        'name' => __('Footer: Middle', 'bhass'),
        'description' => __('Middle section of the footer.', 'bhass'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'id' => 'footer_right',
        'name' => __('Footer: Right', 'bhass'),
        'description' => __('Right section of the footer.', 'bhass'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
    register_sidebar(array(
        'id' => 'home_widget-1',
        'name' => __('Homepage Widget #1', 'bhass'),
        'description' => __('Single widget section on the homepage.', 'bhass'),
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'id' => 'home_widget-2',
        'name' => __('Homepage Widget #2', 'bhass'),
        'description' => __('Another single widget section on the homepage.', 'bhass'),
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'id' => 'home_widget-3',
        'name' => __('Homepage Widget #3', 'bhass'),
        'description' => __('Double-widget section on the homepage.', 'bhass'),
        'before_widget' => '<div>',
        'after_widget' => '</div>',
        'before_title' => '<h2>',
        'after_title' => '</h2>',
    ));
}


/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bhass_wpsearch($form) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <input type="search" value="' . get_search_query() . '" name="s" id="s" placeholder="Search..." />
    <button type="submit"><span class="visually-hidden">Go</span><span class="icon-search"></span></button>
    </form>';
    return $form;
}

/************* ARTICLE BACKGROUND IMAGES *****************/
// show the featured images. if no featured image, show placeholder as fallback

function bhass_article_img() {
    if ( has_post_thumbnail() ) {
        the_post_thumbnail_url('grid-thumb');
    } else {
        echo get_template_directory_uri() . '/library/img/placeholder.jpg';
    }
}


/************* FEATURED EVENT CATEGORIES LIST *****************/

function bhass_featured_event_categories() {

    // list our category names and ID's
    $categories = array (
        'Hassle Shows' => '21638',
        'Music Shows' => '9492',
        'Film Screenings' => '21623',
        'Art Events' => '21625'
    );

    // create wrapper
    echo '<ul class="featured-event-categories">';

    // display view-all link
    echo '<li><a href="' . tribe_get_events_link() . '">All Shows</a></li>';

    // loop through each category, displaying it as a link inside a list item
    foreach( $categories as $name => $id ) {
        echo '<li><a href="' ;
        if ( tribe_is_view('month') ) {
            echo tribe_get_gridview_link($id);
        } else {
            echo tribe_get_listview_link($id);
        }
        echo '">' . $name . '</a></li>';
    }

    // close wrapper
    echo '</ul>';

}

?>