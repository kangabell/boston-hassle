<?php
/*
Template Name: Homepage
*/
?>

<?php

  $featured_ids = get_field('featured_posts', false, false);

  $cat_1 = get_field('cat_1');
  $cat_2 = get_field('cat_2');
  $cat_3 = get_field('cat_3');
  $picture_cat = get_field('picture_cat');

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
              <?php
              // use a custom excerpt if there is one, or if not use the subtitle,
              // and if there's neither, use the automatic excerpt
                if ( has_excerpt() ) {
                  the_excerpt(); 
                } elseif ( get_field('subtitle') ) {
                  echo '<p class="excerpt">';
                  the_field('subtitle');
                  echo '</p>';
                } else {
                  the_excerpt();
                }
              ?>
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
        <?php // upcoming events in the Chosen Shows category
          $events = tribe_get_events( array(
              'posts_per_page' => 5,
              'start_date' => current_time( 'Y-m-d' ), // upcoming
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

      <?php // 2 more Featured Posts

        $args = array(
          'posts_per_page' => 2,
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

      <div class="home-widget-1">
        <?php dynamic_sidebar( 'home_widget-1' ); ?>
      </div>

    </div>

    <div class="tertiary">
      <?php // 2 more Featured Posts

        $args = array(
          'posts_per_page' => 2,
          'post__in' => $featured_ids,
          'orderby' => 'post__in',
          'ignore_sticky_posts' => true,
          'offset' => 3
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
        include(locate_template('partials/category-section.php'));
      ?>

      <?php
        // Category #2
        $category = $cat_2;
        $class = 'category-2';
        include(locate_template('partials/category-section.php'));
      ?>

      <?php
        // Category #3
        $category = $cat_3;
        $class = 'category-3';
        include(locate_template('partials/category-section.php'));
      ?>

    </div>

    <div class="articles">
      <div>
        <?php // General stream of articles
          $loop = new WP_Query( array(
            'posts_per_page'=>8, 
            'ignore_sticky_posts'=>true,
            'post__not_in' => $featured_ids, // exclude featured posts, since they've already appeared above
            'category__not_in' => $picture_cat->term_id// exclude, since this has its own bigger section
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

      <!-- Category Section with Pictures -->
      <div class="<?php echo $picture_cat->slug ?> picture-cat category">
        <h2><?php echo $picture_cat->name; ?></h2>
        <div>
          <?php
          $loop = new WP_Query( array(
            'posts_per_page'=> 9, 
            'ignore_sticky_posts'=>true, 
            'cat'=>$picture_cat->term_id
          ) );
          while ($loop->have_posts()) : 
            $loop->the_post();
          ?>
            <article><a href="<?php echo get_permalink(); ?>">
                <div class="thumbnail" style="background-image: url('<?php bhass_article_img(); ?>')"></div>
                <h3><?php echo short_title(); ?></h3>
                <p class="meta"><?php echo get_the_author(); ?></p>
            </a></article>
          <?php
          endwhile; wp_reset_postdata();
          ?>
        </div>
        <a class="view-all" href="<?php echo get_category_link( $picture_cat->term_id ); ?>">View All <?php echo $picture_cat->name; ?></a>
      </div>

      <div class="home-widget-2">
        <?php dynamic_sidebar( 'home_widget-2' ); ?>
      </div>

    </div>

    <div class="donate cta">
      <a href="/support">
        <h2>$ Support Local Art &amp; Music $</h2>
        <p class="h3">Together We Can Keep Things Strange in Boston and Beyond</p>
      </a>
    </div>

    <div class="articles">
      <div>
        <?php // General stream of articles, continued
        $loop = new WP_Query( array(
          'posts_per_page'=>8, 
          'ignore_sticky_posts'=>true, 
          'offset' => 8, 
          'post__not_in' => $featured_ids,
          'category__not_in' => $picture_cat->term_id
        ) );
        while ($loop->have_posts()) : 
          $class = 'default';
          $loop->the_post();
          include 'partials/article.php';
        endwhile; wp_reset_postdata();
        ?>
      </div>

    </div>

    <div class="newsletter cta">
      <p class="h4">The Most Relevant Mailing List of Your Life</p>
      <h2 class="h1">Get Our Newsletter</h2>
      <a href="https://bostonhassle.us5.list-manage.com/subscribe?u=b33396a0fbb4b5594a24fb24e&id=dbc4da5ea8" class="button large">Subscribe</a>
    </div>

  </main>

<?php get_footer(); ?>