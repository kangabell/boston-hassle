<?php
/**
 * List View Template
 *
 */

?>

<main>
  
  <header>
    <h1><?php echo tribe_get_events_title(); ?></h1>
  </header>

  <div id="tribe-events-content" class="left">

      <?php
      if ( ! defined( 'ABSPATH' ) ) {
        die( '-1' );
      }

      do_action( 'tribe_events_before_template' );
      do_action( 'tribe_events_list_before_the_content' );
      ?>

      <!-- Events Loop -->
      <?php if ( have_posts() ) : ?>
        <?php do_action( 'tribe_events_before_loop' ); ?>
        <?php tribe_get_template_part( 'list/loop' ) ?>
        <?php do_action( 'tribe_events_after_loop' ); ?>
      <?php 
        endif;
        get_template_part('partials/pagination');
      ?>

      </div>

      <!-- #tribe-events-footer -->
      <?php do_action( 'tribe_events_after_footer' ) ?>

  </div>

  <?php get_sidebar('events'); ?>

</main>
<?php
do_action( 'tribe_events_after_template' );