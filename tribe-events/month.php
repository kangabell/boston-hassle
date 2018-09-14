<?php
/**
 * Month View Template
 *
 */

?>

<div id="tribe-events-content">

    <?php
    if ( ! defined( 'ABSPATH' ) ) {
      die( '-1' );
    }

    do_action( 'tribe_events_before_template' );
    // do_action( 'tribe_events_list_before_the_content' );
    ?>

    <!-- Events Loop -->
    <?php if ( have_posts() ) : ?>
      <?php do_action( 'tribe_events_before_loop' ); ?>
      <?php tribe_get_template_part( 'month/content' ); ?>
      <?php do_action( 'tribe_events_after_loop' ); ?>
    <?php endif; ?>

    </div>
    <!-- #tribe-events-footer -->
    <?php do_action( 'tribe_events_after_footer' ) ?>

</div>

<?php
do_action( 'tribe_events_after_template' );



// if ( ! defined( 'ABSPATH' ) ) {
// 	die( '-1' );
// }

// do_action( 'tribe_events_before_template' );

// // Tribe Bar
// tribe_get_template_part( 'modules/bar' );

// // Main Events Content
// tribe_get_template_part( 'month/content' );

// do_action( 'tribe_events_after_template' );