<?php
/*
Template Name: Homepage
*/

if ( class_exists( 'Tribe__Events__Main' ) ) :
  $events = tribe_get_events( array(
      'posts_per_page' => 6,
      'start_date' => current_time( 'Y-m-d' ) // upcoming
  ) );
endif;

if ( function_exists( 'get_field' ) ) :
  $featured_ids = get_field('featured_posts', false, false);

  $cat_1 = get_field('cat_1');
  $cat_2 = get_field('cat_2');
  $cat_3 = get_field('cat_3');

  $cta2_img = get_field('cta2_img');
  if ( !empty( $cta2_img ) ) {
    $cta2_bg = esc_url($cta2_img['url']);
  } else {
    $cta2_bg = get_template_directory_uri() . '/library/img/texture-lt.jpg';
  }
endif;

?>

<?php include 'header.php'; ?>

  <main>

    <?php
    if ( function_exists( 'get_field' ) ) :
    ?>
      <div class="primary">

        <div class="hero">
          <?php // first Featured Post

            $args = array(
              'posts_per_page' => 1,
              'post__in' => $featured_ids,
              'orderby' => 'post__in',
              'ignore_sticky_posts' => true
            );
            query_posts ($args);

            if (have_posts()) : while (have_posts()) : the_post();
            
          ?>
            <article><a href="<?php the_permalink(); ?>">

              <div class="image">
                <div class="thumbnail">
                  <?php the_post_thumbnail('grid-large'); ?>
                </div>
              </div>
              <div class="text">
                <?php get_template_part('partials/date-category'); ?>
                <h3><?php echo short_title(); ?></h3>
                <?php
                // use a custom excerpt if there is one, or if not use the subtitle,
                // and if there's neither, use the automatic excerpt
                  if ( has_excerpt() ) {
                    the_excerpt();
                  } elseif ( function_exists( 'get_field' ) && get_field('subtitle') ) {
                    echo '<p class="excerpt">';
                    the_field('subtitle');
                    echo '</p>';
                  } else {
                    the_excerpt();
                  }
                ?>
                <p class="meta">
                  <?php 
                  if ( function_exists( 'coauthors_posts_links' ) ) {
                      coauthors();
                  } else {
                      the_author();
                  }
                  ?>  
                </p>
              </div>

            </a></article>
          <?php
            endwhile; endif;
            wp_reset_query();
          ?>
        </div>

        <?php
        if ( class_exists( 'Tribe__Events__Main' ) ) :
          if ( $events ) :
          ?>
            <div class="events">
              <h2>Hassle Picks</h2>
              <?php
                foreach ( $events as $post ) {
                    setup_postdata( $post );
              ?>
                <article>
                  <p class="meta">
                    <?php echo tribe_events_event_schedule_details(); ?>
                    <?php if ( tribe_get_cost() ) : ?>
                      <span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
                    <?php endif; ?>
                  </p>
                  <h3><a href="<?php echo esc_url( tribe_get_event_link() ); ?>"><?php the_title(); ?></a></h3>
                  <p class="meta category"><?php echo tribe_get_venue(); ?></p>
                </article>
              <?php } wp_reset_postdata(); ?>
              <a class="view-all" href="<?php echo tribe_get_events_link(); ?>">View All</a>
            </div>
          <?php
          endif;
        endif;
        ?>
      </div> <!-- end .primary -->

      <div class="secondary">

        <?php // Additional Featured Posts

        if ( $events ) {
          $args = array(
            'posts_per_page' => 4,
            'post__in' => $featured_ids,
            'orderby' => 'post__in',
            'ignore_sticky_posts' => true,
            'offset' => 1
          );
        } else {
          $args = array(
            'posts_per_page' => 2,
            'post__in' => $featured_ids,
            'orderby' => 'post__in',
            'ignore_sticky_posts' => true,
            'offset' => 1
          );
        }

        query_posts ($args);

        if (have_posts()) : while (have_posts()) : the_post();
          include 'partials/article.php';
        endwhile; endif;
        wp_reset_query();

        ?>

      </div>
    <?php
    endif;
    ?>

    <?php
    if ( function_exists( 'get_field' ) ) :
    ?>
      <div class="tertiary category-lists">

        <?php
        if (!empty ( $cat_1 ) ) {
          // Category #1
          $category = $cat_1;
          $class = 'category-1';
          include(locate_template('partials/category-section.php'));
        }
        ?>

        <?php
        if (!empty ( $cat_2 ) ) {
          // Category #2
          $category = $cat_2;
          $class = 'category-2';
          include(locate_template('partials/category-section.php'));
        }
        ?>

        <?php
        if (!empty ( $cat_3 ) ) {
          // Category #3
          $category = $cat_3;
          $class = 'category-3';
          include(locate_template('partials/category-section.php'));
        }
        ?>

      </div>
    <?php
    endif;
    ?>

    <div class="articles">
      <div>
        <?php // General stream of articles
        if ( function_exists( 'get_field' ) ) {
          $loop = new WP_Query( array(
            'posts_per_page'=>12,
            'ignore_sticky_posts'=>true,
            'post__not_in' => $featured_ids // exclude featured posts, since they've already appeared above
          ) );
        } else {
          $loop = new WP_Query( array(
            'posts_per_page'=>12,
            'ignore_sticky_posts'=>true,
          ) );
        }
        while ($loop->have_posts()) : 
          $class = 'default';
          $loop->the_post();
          include 'partials/article.php';
        endwhile; wp_reset_postdata();
        ?>
      </div>
    </div>

    <?php
    if ( function_exists( 'get_field' ) ) :
    ?>
      <div class="newsletter cta" style="background-image: url('<?php echo $cta2_bg; ?>');">

        <?php if ( get_field('cta2_text') ) : ?>
          <p class="h4">
              <?php the_field('cta2_text'); ?>
          </p>
        <?php endif; ?>

        <?php if ( get_field('cta2_heading') ) : ?>
          <h2 class="h1">
              <?php the_field('cta2_heading'); ?>
          </h2>
        <?php endif; ?>
        <a href="<?php the_field('cta2_link'); ?>" class="button large"><?php the_field('cta2_link-text'); ?></a>
      </div>
    <?php
    endif;
    ?>

  </main>

<?php get_footer(); ?>