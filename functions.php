<?php

/*

BOSTON HASSLE Theme Functions
Author: Kay Belardinelli
URL: http://kangabell.co

*/

/*** 

TEMP: Replace image urls with Production directory
(http://www.polevaultweb.com/2014/03/5-ways-synchronise-wordpress-uploads-across-environments/#wordpressfilters)

This will work for uploaded media that is being served by WordPress’ standard image functions such as the_post_thumbnail() or wp_get_attachment_image().

The function my_wp_get_attachment_url() does the work, but will only be added if it is not the live site, as it will already have all the images.

The function then hooks into the WordPress filter wp_get_attachment_url, so for each time WordPress is serving an attachment url our function jumps in and checks if that attachment file exists in our site, and if not swaps out the site url with the live url.

***/

add_action('init', 'my_replace_image_urls' );
function my_replace_image_urls() {
    if ( defined('WP_SITEURL') && defined('LIVE_SITEURL') ) {
        if ( WP_SITEURL != LIVE_SITEURL ){
            add_filter('wp_get_attachment_url', 'my_wp_get_attachment_url', 10, 2 );
        }
    }
}

function my_wp_get_attachment_url( $url, $post_id) {
    if ( $file = get_post_meta( $post_id, '_wp_attached_file', true) ) {
        if ( ($uploads = wp_upload_dir()) && false === $uploads['error'] ) {
            if ( file_exists( $uploads['basedir'] .'/'. $file ) ) {
                return $url;
            }
        }
    }
    return str_replace( WP_SITEURL, LIVE_SITEURL, $url );
}

?>