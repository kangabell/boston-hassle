<?php
/**
 * List View Loop
 * This file sets up the structure for the list loop
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/loop.php
 *
 * @version 4.4
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php
global $post;
global $more;
$more = false;
?>

<div class="tribe-events-loop">

	<?php while ( have_posts() ) : the_post(); ?>
		<?php do_action( 'tribe_events_inside_before_loop' ); ?>

		<!-- Event  -->
		<?php

		if ( tribe_event_in_category('hassle-shows') ) {
			$hassle_show = true;
		} else {
			$hassle_show = false;
		}

		include(locate_template('partials/event.php'));

		?>


		<?php do_action( 'tribe_events_inside_after_loop' ); ?>
	<?php endwhile; ?>

</div><!-- .tribe-events-loop -->
