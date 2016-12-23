<?php
/**
 * Single Event Template
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
  die( '-1' );
}

$events_label_singular = tribe_get_event_label_singular();
$events_label_plural = tribe_get_event_label_plural();

$event_id = get_the_ID();

?>

<?php get_header(); ?>

<main>

  <?php while (have_posts()) : the_post(); ?>

    <header>

      <p class="meta">
        <?php echo tribe_events_event_schedule_details( $event_id ); ?>
        <?php if ( tribe_get_cost() ) : ?>
          <span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
        <?php endif; ?>
      </p>
      
      <h1><?php the_title(); ?></h1>

      <p class="meta">
        <?php echo tribe_get_venue() ?>
      </p>
    </header>

    <article>

    	<?php echo tribe_event_featured_image( $event_id, 'full', false ); ?>

	    <?php do_action( 'tribe_events_single_event_before_the_content' ) ?>
	    <?php the_content(); ?>
	    <!-- .tribe-events-single-event-description -->
	    <?php do_action( 'tribe_events_single_event_after_the_content' ) ?>

	    <!-- Event meta -->
	    <?php do_action( 'tribe_events_single_event_before_the_meta' ) ?>
	    <?php tribe_get_template_part( 'modules/meta' ); ?>
	    <?php do_action( 'tribe_events_single_event_after_the_meta' ) ?>

    </article>
      
  </main>

  <?php if ( get_post_type() == Tribe__Events__Main::POSTTYPE && tribe_get_option( 'showComments', false ) ) comments_template() ?>

  <?php endwhile; ?>

<?php get_footer(); ?>

