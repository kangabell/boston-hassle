<?php
/*
Template Name: Homepage
*/
?>

<?php

  $featured_ids = get_field('featured_posts', false, false);

  $freshstream_id = get_cat_ID( 'Fresh Stream' );
  $freshstream_link = get_category_link( $freshstream_id );

  $cat_1 = get_field('cat_1');
  $cat_2 = get_field('cat_2');
  $cat_3 = get_field('cat_3');

?>

<?php include 'header.php'; ?>

  <main>

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
          <article class="hero"><a href="<?php the_permalink(); ?>">

            <div class="image">
              <div class="thumbnail">
                <?php the_post_thumbnail('large'); ?>
              </div>
            </div>
            <div class="text">
              <?php get_template_part('partials/date-category'); ?>
              <h3><?php echo short_title(); ?></h3>
              <?php the_excerpt(); ?>
              <p class="meta"><?php echo get_the_author(); ?></p>
            </div>

          </a></article>  
        <?php
          endwhile; endif;
          wp_reset_query();
        ?>
      </div>

      <div class="events">
        <h2>Chosen Shows</h2>
        <?php // upcoming events in the Go To category
          $events = tribe_get_events( array(
              'posts_per_page' => 5,
              'start_date' => current_time( 'Y-m-d H:i:s' ), // upcoming
              'tax_query' => array(
                array(
                  'taxonomy' => 'tribe_events_cat',
                  'field' => 'slug',
                  'terms' => 'chosen-shows',
                )
              )
          ) );
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

    </div> <!-- end .primary -->

    <div class="secondary">

      <?php // 3 more Featured Posts

        $args = array(
          'posts_per_page' => 3,
          'post__in' => $featured_ids,
          'orderby' => 'post__in',
          'ignore_sticky_posts' => true,
          'offset' => 1
        );
        query_posts ($args);

        if (have_posts()) : while (have_posts()) : the_post();
          include 'partials/article.php';
        endwhile; endif;
        wp_reset_query();

      ?>

    </div>

    <div class="tertiary">

      <?php // 2 more Featured Posts

        $args = array(
          'posts_per_page' => 2,
          'post__in' => $featured_ids,
          'orderby' => 'post__in',
          'ignore_sticky_posts' => true,
          'offset' => 4
        );
        query_posts ($args);

        if (have_posts()) : while (have_posts()) : the_post();
          include 'partials/article.php';
        endwhile; endif;
        wp_reset_query();

      ?>

    </div>

    <div>

      <?php
        // Category #1
        $category = $cat_1;
        $class = 'category-1';
        $count = 6;
        include(locate_template('partials/category-section.php'));
      ?>

      <?php
        // Category #2
        $category = $cat_2;
        $class = 'category-2';
        $count = 6;
        include(locate_template('partials/category-section.php'));
      ?>

      <div class="home-widget">
        <?php dynamic_sidebar( 'home_widget' ); ?>
      </div>

    </div>

    <div class="articles">
      <div>
        <?php // General stream of articles
          $loop = new WP_Query( array(
            'posts_per_page'=>8, 
            'ignore_sticky_posts'=>true,
            'post__not_in' => $featured_ids, // exclude featured posts, since they've already appeared above
            'category__not_in' => $freshstream_id // exclude fresh stream posts, since they have their own big section
          ) );
          while ($loop->have_posts()) : 
            $class = 'default';
            $loop->the_post();
            include 'partials/article.php';
          endwhile; wp_reset_postdata();
        ?>
      </div>
    </div>

    <div>

      <div class="fresh-stream category">
        <h2>Fresh Stream</h2>
        <?php // all Fresh Stream articles
          $loop = new WP_Query( array(
            'posts_per_page'=>6, 
            'ignore_sticky_posts'=>true, 
            'cat'=>$freshstream_id
          ) );
          while ($loop->have_posts()) : 
            $loop->the_post();
        ?>
          <article><a href="<?php the_permalink(); ?>">
              <div class="thumbnail" style="background-image: url('<?php the_post_thumbnail_url(); ?>')"></div>
              <div class="text">
                <h3><a href="<?php the_permalink(); ?>"><?php echo short_title(); ?></a></h3>
              </div>
              <p class="meta"><?php echo get_the_author(); ?></p>
          </a></article>
        <?php
          endwhile; wp_reset_postdata();
        ?>
        <a class="view-all" href="<?php echo $freshstream_link; ?>">View All Fresh Stream</a>
      </div>

      <?php
        // Category #3
        $category = $cat_3;
        $class = 'category-3';
        $count = 12;
        include(locate_template('partials/category-section.php'));
      ?>

    </div>

    <div class="articles">
      <div>
        <?php // General stream of articles, continued
        $loop = new WP_Query( array(
          'posts_per_page'=>8, 
          'ignore_sticky_posts'=>true, 
          'offset' => 8, 
          'post__not_in' => $featured_ids,
          'category__not_in' => $freshstream_id
        ) );
        while ($loop->have_posts()) : 
          $class = 'default';
          $loop->the_post();
          include 'partials/article.php';
        endwhile; wp_reset_postdata();
        ?>
      </div>

    </div>

  </main>

<?php get_footer(); ?>