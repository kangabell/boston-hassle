<?php
/**
 * List View Title Template
 * The title template for the list view of events.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/list/title-bar.php
 *
 * @package TribeEventsCalendar
 * @version 4.6.19
 * @since   4.6.19
 *
 */
?>

<header class="calendar-header tribe-events-title-bar">

	<?php do_action( 'tribe_events_before_the_title' ); ?>
	<h1 class="tribe-events-page-title"><?php echo tribe_get_events_title() ?></h1>
	<?php bhass_featured_event_categories(); ?>
	<?php do_action( 'tribe_events_after_the_title' ); ?>

	<?php tribe_get_template_part( 'modules/bar' ); ?>
</header>