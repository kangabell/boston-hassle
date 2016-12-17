<?php

    $film_id = get_cat_ID( 'Film Flam' );
    $music_id = get_cat_ID( 'New Music' );
    $featured_id = get_cat_ID( 'Featured' );
    $freshstream_id = get_cat_ID( 'Fresh Stream' );
    $art_id = get_cat_ID( 'Art Attack' );

    $film_link = get_category_link( $film_id );
    $music_link = get_category_link( $music_id );
    $freshstream_link = get_category_link( $freshstream_id );
    $art_link = get_category_link( $art_id );
?>

<?php include 'header.php'; ?>

<main>
    <div class="hero">
      <?php 
        $args = array(
          'posts_per_page' => 1,
          'ignore_sticky_posts' => true,
          'cat' => $featured_id
        );
        query_posts ($args);
        if (have_posts()) : while (have_posts()) : the_post();
          $class = 'hero';
          include 'partials/article.php';
        endwhile; endif;
        wp_reset_query();
      ?>
    </div>

    <div class="secondary">
      <?php 
        $args = array(
          'posts_per_page' => 2,
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
    </div>

    <div class="tertiary">

      <?php 
        $args = array(
          'posts_per_page' => 2,
          'ignore_sticky_posts' => true,
          'cat' => $featured_id,
          'offset' => 3
        );
        query_posts ($args);
        if (have_posts()) : while (have_posts()) : the_post();
          $class = 'featured';
          include 'partials/article.php';
        endwhile; endif;
        wp_reset_query();
      ?>

      <div class="events">
        <h2><a href="/events">Go To</a></h2>
        <?php
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
            <h3 class="h5"><a href="<?php echo esc_url( tribe_get_event_link() ); ?>"><?php the_title(); ?></a></h3>
          </article>
        <?php } wp_reset_postdata(); ?>
      </div>

    </div>

    <div>

      <div class="music">
        <h2><a href="<?php echo $music_link; ?>">Music</a></h2>
        <?php
          $loop = new WP_Query( array('posts_per_page'=>6, 'ignore_sticky_posts'=>true, 'cat'=>$music_id) );
          while ($loop->have_posts()) : 
            $loop->the_post();
            include 'partials/article-sm.php';
          endwhile; wp_reset_postdata();
        ?>
      </div>

      <div class="film">
        <h2><a href="<?php echo $film_link; ?>">Film</a></h2>
        <?php
          $loop = new WP_Query( array('posts_per_page'=>6, 'ignore_sticky_posts'=>true, 'cat'=>$film_id) );
          while ($loop->have_posts()) : 
            $loop->the_post();
            include 'partials/article-sm.php';
          endwhile; wp_reset_postdata();
        ?>
      </div>

      <div class="compass">
        <h2>Boston Compass</h2>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/library/img.png">
        <a href="">Read More</a>
      </div>

    </div>

    <div class="articles">
      <div>
        <?php 
          query_posts ('posts_per_page=8&ignore_sticky_posts=true');
          $class = 'default';
          if (have_posts()) : while (have_posts()) : the_post();
            include 'partials/article.php';
          endwhile; endif;
        ?>
      </div>
    </div>

    <div>

      <div class="fresh-stream">
        <h2><a href="<?php echo $freshstream_link; ?>">Fresh Stream</a></h2>
        <?php
          $loop = new WP_Query( array('posts_per_page'=>4, 'ignore_sticky_posts'=>true, 'cat'=>$freshstream_id) );
          while ($loop->have_posts()) : 
            $loop->the_post();
        ?>
          <article>
              <a class="thumbnail" href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('grid-thumb'); ?>
              </a>
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
        <?php
          $loop = new WP_Query( array('posts_per_page'=>9, 'ignore_sticky_posts'=>true, 'cat'=>$art_id) );
          while ($loop->have_posts()) : 
            $loop->the_post();
            include 'partials/article-sm.php';
          endwhile; wp_reset_postdata();
        ?>
      </div>

    </div>

    <div class="articles">
      <div>
        <?php 
          query_posts ('posts_per_page=8&ignore_sticky_posts=true&offset=8');
          $class = 'default';
          if (have_posts()) : while (have_posts()) : the_post();
            include 'partials/article.php';
          endwhile; endif;
        ?>
      </div>
    </div>

  </main>

<?php get_footer(); ?>