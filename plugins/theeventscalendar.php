<?php
/*
The Events Calendar & The Events Calendar PRO functions
*/



// Disable Recurring Info on Events List
if ( class_exists( 'Tribe__Events__Pro__Main' ) ) {
    function bhass_remove_rec_tooltip( $template ) {
        Tribe__Events__Pro__Main::instance()->disable_recurring_info_tooltip();
    }
    add_action( 'tribe_before_get_template_part', 'bhass_remove_rec_tooltip' );
}

// Add a class to excerpt paragraph
function add_event_excerpt_class( $excerpt ) {
    $excerpt = str_replace( "<p", "<p class=\"excerpt\"", $excerpt );
    return $excerpt;
}
add_filter( "tribe_events_get_the_excerpt", "add_event_excerpt_class" );



function bhass_replace_tribe_events_bar() {

    wp_dequeue_script( 'tribe-events-bar' );

    wp_enqueue_script( 'bhass-events-bar', get_stylesheet_directory_uri() . '/library/scripts/tribe-events-bar.min.js', array( 'jquery' ), '', true );

}

add_action( 'wp_print_scripts', 'bhass_replace_tribe_events_bar', 100 );


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