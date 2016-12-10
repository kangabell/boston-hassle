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

<main>
  
  <header>
    <h1><?php echo tribe_get_events_title(); ?></h1>
  </header>

  <div class="left">

  	<?php
  	  if (have_posts()) : while (have_posts()) : the_post();
  	    get_template_part('partials/event');
  	  endwhile; endif;
  	?>

  </div>

  <?php get_sidebar('events'); ?>

</main>
<?php
do_action( 'tribe_events_after_template' );