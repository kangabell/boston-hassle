<?php
/**
 * List View Template
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

do_action( 'tribe_events_before_template' );
?>

<!-- filters -->
<?php // tribe_get_template_part( 'modules/bar' ); ?>

	<!-- Main Events Content -->
<?php tribe_get_template_part( 'list/content' ); ?>

<?php
do_action( 'tribe_events_after_template' );
