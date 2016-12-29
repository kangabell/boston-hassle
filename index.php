<?php

    $film_id = get_cat_ID( 'Film Flam' );
    $music_id = get_cat_ID( 'New Music' );
    $featured_id = get_cat_ID( 'Featured' );
    $freshstream_id = get_cat_ID( 'Fresh Stream' );
    $art_id = get_cat_ID( 'Art Attack' );
    $goto_id = get_cat_ID( 'Go To' );

    $film_link = get_category_link( $film_id );
    $music_link = get_category_link( $music_id );
    $freshstream_link = get_category_link( $freshstream_id );
    $art_link = get_category_link( $art_id );
?>

<?php include 'header.php'; ?>

<main>

    <div class="primary">

      <div class="hero">
        <?php // most recent Featured article
          $args = array(
            'posts_per_page' => 1,
            'ignore_sticky_posts' => true,
            'cat' => $featured_id
          );
          query_posts ($args);
          if (have_posts()) : while (have_posts()) : the_post();
        ?>
          <article class="hero">

            <div class="image">
              <a class="thumbnail" href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('large'); ?>
              </a>
            </div>
            <div class="text">
              <?php echo category_name(); ?>
              <h3><a href="<?php the_permalink(); ?>"><?php echo short_title(); ?></a></h3>
              <?php the_excerpt(); ?>
              <p class="meta"><?php echo get_the_author(); ?></p>
            </div>

          </article>  
        <?php
          endwhile; endif;
          wp_reset_query();
        ?>
      </div>

      <div class="events">
        <h2><a href="<?php echo tribe_get_events_link(); ?>">Go To</a></h2>
        <?php // upcoming events in the Go To category
          $events = tribe_get_events( array(
              'posts_per_page' => 5,
              'start_date' => date( 'Y-m-d H:i:s' ) // upcoming
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
        <a class="view-all" href="<?php echo tribe_get_events_link(); ?>">View All Events</a>
      </div>

    </div> <!-- end .primary -->

    <div class="secondary">

      <?php // 2 more Featured article
        $args = array(
          'posts_per_page' => 3,
          'ignore_sticky_posts' => true,
          'cat' => $featured_id,
          'offset' => 1
        );
        query_posts ($args);
        if (have_posts()) : while (have_posts()) : the_post();
          $class = 'featured';
          include 'partials/article.php';
        endwhile; endif;
        wp_reset_query();
      ?>

    </div> <!-- end .tertiary -->

    <div class="tertiary">
      <?php // 2 more Featured article
        $args = array(
          'posts_per_page' => 2,
          'ignore_sticky_posts' => true,
          'cat' => $featured_id,
          'offset' => 4
        );
        query_posts ($args);
        if (have_posts()) : while (have_posts()) : the_post();
          $class = 'featured';
          include 'partials/article.php';
        endwhile; endif;
        wp_reset_query();
      ?>
    </div>

    <div>

      <div class="music">
        <h2><a href="<?php echo $music_link; ?>">Music</a></h2>
        <?php // all Music articles
          $loop = new WP_Query( array(
            'posts_per_page'=>6, 
            'ignore_sticky_posts'=>true, 
            'cat'=>$music_id
          ) );
          while ($loop->have_posts()) : 
            $loop->the_post();
            include 'partials/article-sm.php';
          endwhile; wp_reset_postdata();
        ?>
      </div>

      <div class="film">
        <h2><a href="<?php echo $film_link; ?>">Film</a></h2>
        <?php // all Film articles
          $loop = new WP_Query( array(
            'posts_per_page'=>6, 
            'ignore_sticky_posts'=>true, 
            'cat'=>$film_id
          ) );
          while ($loop->have_posts()) : 
            $loop->the_post();
            include 'partials/article-sm.php';
          endwhile; wp_reset_postdata();
        ?>
      </div>

      <div class="home-widget">
        <?php dynamic_sidebar( 'home_widget' ); ?>
      </div>

    </div>

    <div class="articles">
      <div>
        <?php // all articles, except Featured & Fresh Stream ones
          $loop = new WP_Query( array(
            'posts_per_page'=>8, 
            'ignore_sticky_posts'=>true, 
            'category__not_in' => array($featured_id, $freshstream_id) 
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

      <div class="fresh-stream">
        <h2><a href="<?php echo $freshstream_link; ?>">Fresh Stream</a></h2>
        <?php // all Fresh Stream articles
          $loop = new WP_Query( array(
            'posts_per_page'=>6, 
            'ignore_sticky_posts'=>true, 
            'cat'=>$freshstream_id
          ) );
          while ($loop->have_posts()) : 
            $loop->the_post();
        ?>
          <article>
              <a class="thumbnail" href="<?php the_permalink(); ?>" style="background-image: url('<?php the_post_thumbnail_url(); ?>')"></a>
              <div class="text">
                <h3><a href="<?php the_permalink(); ?>"><?php echo short_title(); ?></a></h3>
              </div>
              <p class="meta"><?php echo get_the_author(); ?></p>
          </article>
        <?php
          endwhile; wp_reset_postdata();
        ?>
      </div>

      <div class="art">
        <h2><a href="<?php echo $art_link; ?>">Art</a></h2>
        <?php // all Art articles
          $loop = new WP_Query( array(
            'posts_per_page'=>9, 
            'ignore_sticky_posts'=>true, 
            'cat'=>$art_id
          ) );
          while ($loop->have_posts()) : 
            $loop->the_post();
            include 'partials/article-sm.php';
          endwhile; wp_reset_postdata();
        ?>
      </div>

    </div>

    <div class="articles">
      <div>
        <?php // more articles, but not Featured or Fresh Stream ones
        $loop = new WP_Query( array(
          'posts_per_page'=>8, 
          'ignore_sticky_posts'=>true, 
          'offset' => 8, 
          'category__not_in' => array($featured_id, $freshstream_id) 
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