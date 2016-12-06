<?php

/*

BOSTON HASSLE Theme Functions
Author: Kay Belardinelli
URL: http://kangabell.co

*/


/************* BASICS ***************/

// set maximum allowed width for content
if ( ! isset( $content_width ) )
    $content_width = 1140;

// remove WP version from RSS
add_filter('the_generator', 'bhass_rss_version');
// clean up gallery output in wp
add_filter('gallery_style', 'bhass_gallery_style');

// enqueue base scripts and styles
add_action('wp_enqueue_scripts', 'bhass_scripts_and_styles', 999);

// launching this stuff after theme setup
add_action('after_setup_theme','bhass_theme_support');
// adding sidebars to Wordpress (these are created in functions.php)
add_action( 'widgets_init', 'bhass_register_sidebars' );
// adding the search form
add_filter( 'get_search_form', 'bhass_wpsearch' );
// filtering the search results
add_filter('pre_get_posts','bhass_filtersearch');

// cleaning up random code around images & blockquotes
add_filter('the_content', 'bhass_filter_ptags_on_images');
add_filter('the_content', 'bhass_filter_ptags_on_blockquotes');
// cleaning up excerpt
add_filter('excerpt_more', 'bhass_excerpt_more');
// shorter excerpt
add_filter( 'excerpt_length', 'bhass_shorten_excerpt', 999 );
// modify output of WordPress Popular Posts plugin
add_filter( 'wpp_custom_html', 'bhass_popular_posts_html', 10, 2 );

// hide editor on certain pages
add_action( 'admin_init', 'hide_editor' );

// add custom post types
add_action( 'init', 'create_posttype' );



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

// Shorten excerpt length to 100 characters
function bhass_shorten_excerpt( $length ) {
    return 15; // this can be more flexible than hero_excerpt because it is written intentionally
}

// Shorten Hero Content to just an excerpt. Used in Athvia page case study tiles.
function hero_excerpt() {
  global $post;
  $text = get_field('hero_content');
  if ( '' != $text ) {
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]>>', $text);
    $excerpt_length = 9;
    $excerpt_more = ' ...';
    $text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
  }
  return apply_filters('the_excerpt', $text);
}

function custom_excerpt($new_length = 43, $new_more = '...') {
  add_filter('excerpt_length', function () use ($new_length) {
    return $new_length;
  }, 999);
  add_filter('excerpt_more', function () use ($new_more) {
    return $new_more;
  });
  $output = get_the_excerpt();
  $output = apply_filters('wptexturize', $output);
  $output = apply_filters('convert_chars', $output);
  $output = '<p>' . $output . '</p>';
  echo $output;
}

/*
 * Modified the_author_posts_link(). Needed to allow usage of the usual l10n process with printf().
 */
function bhass_get_the_author_posts_link() {
    global $authordata;
    if ( !is_object( $authordata ) )
        return false;
    $link = sprintf(
        '<a href="%1$s" title="%2$s" rel="author">%3$s</a>',
        get_author_posts_url( $authordata->ID, $authordata->user_nicename ),
        esc_attr( sprintf( __( 'Posts by %s', 'bhass' ), get_the_author() ) ),
        get_the_author()
    );
    return $link;
}

/**
 * Hide editor on specific pages.
 */

function hide_editor() {

  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  if( !isset( $post_id ) ) return;

  $template_file = get_post_meta($post_id, '_wp_page_template', true);
  if( ($template_file == 'front-page.php') || ($template_file == 'athiva-page.php') || ($template_file == 'startups-page.php') || ($template_file == 'blog.php') ) {
    remove_post_type_support('page', 'editor');
  }
  
}


/*********************
SCRIPTS & ENQUEUEING
*********************/

// loading jquery and reply script
function bhass_scripts_and_styles() {
  if (!is_admin()) {

    // main stylesheet
    wp_register_style( 'bhass-stylesheet', get_stylesheet_directory_uri() . '/library/stylesheets/screen.css', array(), '', 'all' );

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
            'main-nav' => __( 'The Main Menu', 'bhass' ),   // main nav in header
        )
    );

    // featured images
    add_theme_support( 'post-thumbnails' ); 

    add_image_size( 'grid-thumb', 600, 440, array( 'center', 'center') );
    
} /* end bhass theme support */


/*********************
MENUS & NAVIGATION
*********************/

// the main menu
function bhass_main_nav() {
    // display the wp3 menu if available
    wp_nav_menu(array(
        'container' => false,                           // remove nav container
        'container_class' => 'menu clearfix',           // class of container
        'menu' => __( 'The Main Menu', 'bhass' ),  // nav name
        'menu_class' => 'nav top-nav clearfix',         // adding custom nav class
        'theme_location' => 'main-nav',                 // where it's located in the theme
        'depth' => 2,                                   // limit the depth of the nav
        'fallback_cb' => 'bhass_main_nav_fallback'      // fallback function
    ));
} /* end bhass main nav */


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
        'id' => 'sidebar_blog',
        'name' => __('Blog Sidebar', 'bhass'),
        'description' => __('The widget area for the blog pages.', 'bhass'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widgettitle">',
        'after_title' => '</h2>',
    ));
    register_sidebar(array(
        'id' => 'footer_links',
        'name' => __('Footer Links', 'bhass'),
        'description' => __('Links for the footer go here.', 'bhass'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
    ));
    register_sidebar(array(
        'id' => 'footer_address',
        'name' => __('Footer Address', 'bhass'),
        'description' => __('Company address for the footer.', 'bhass'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
    ));
    register_sidebar(array(
        'id' => 'footer_phone-email',
        'name' => __('Footer Contact Info', 'bhass'),
        'description' => __('Company phone number and email address for the footer.', 'bhass'),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
    ));
}


/************* SEARCH FORM LAYOUT *****************/

// Search Form
function bhass_wpsearch($form) {
    $form = '<span class="icon-search"></span><form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
    <input type="search" value="' . get_search_query() . '" name="s" id="s" placeholder="Enter Text Here..." />
    <button type="submit"><span class="visually-hidden">Submit</span><span class="icon-arrow"></span></button>
    </form>';
    return $form;
}



?>