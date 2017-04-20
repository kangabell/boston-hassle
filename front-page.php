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
        <?php // upcoming events in the Chosen Shows category
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

    <div>

      <div class="comments">

        <h2>The People Have Spoken</h2>

        <div>

          <h3>Re: PHILIP LEWIN – AM I REALLY HERE ALL ALONE?</h3>

          <ul class="comment-list">
                <li class="comment even thread-even depth-1" id="comment-21336">
              <div id="div-comment-21336" class="comment-body">
              <div class="comment-author vcard">
            <img alt="" src="https://secure.gravatar.com/avatar/11982d1f13172fc78228b841747f6d68?s=42&amp;d=mm&amp;r=g" srcset="https://secure.gravatar.com/avatar/11982d1f13172fc78228b841747f6d68?s=84&amp;d=mm&amp;r=g 2x" class="avatar avatar-42 photo" height="42" width="42">      <cite class="fn">Marlowe</cite> <span class="says">says:</span>   </div>
          

          <p>Thanks for this review, which introduced me to a musician I should have listened to long ago. Lewin connects nicely to the folk roots of the 1960s and the popular rock of the 70s.</p>


          </li><!-- #comment-## -->
          <li class="comment odd alt thread-odd thread-alt depth-1" id="comment-21400">
              <div id="div-comment-21400" class="comment-body">
              <div class="comment-author vcard">
            <img alt="" src="https://secure.gravatar.com/avatar/2c870952ebfd42b26e071d5e1063ed34?s=42&amp;d=mm&amp;r=g" srcset="https://secure.gravatar.com/avatar/2c870952ebfd42b26e071d5e1063ed34?s=84&amp;d=mm&amp;r=g 2x" class="avatar avatar-42 photo" height="42" width="42">     
             <cite class="fn"><a href="http://www.philipjohnlewin.com" rel="external nofollow" class="url">Philip John Lewin</a></cite> <span class="says">says:</span>    </div>
          

          <p>Thank you for listening. For the most part I’m finding your comments insightful and food for thought. Only exception is, I can’t ever recall even listening to Astral Weeks! I was more into The Velvet...</p>

          </li><!-- #comment-## -->
          </ul>

        </div>

        <div>

          <h3>Re: REVIEW: YOUR NAME (2016) DIR. MAKOTO SHINKAI</h3>

          <ul class="comment-list">
             <li class="comment even thread-even depth-1" id="comment-21346">
                    <div id="div-comment-21346" class="comment-body">
                    <div class="comment-author vcard">
                  <img alt="" src="https://secure.gravatar.com/avatar/3b4a25fd643321b6f154d00e5751034f?s=42&amp;d=mm&amp;r=g" srcset="https://secure.gravatar.com/avatar/3b4a25fd643321b6f154d00e5751034f?s=84&amp;d=mm&amp;r=g 2x" class="avatar avatar-42 photo" height="42" width="42">      <cite class="fn">oddds</cite> <span class="says">says:</span>   </div>
                
                <p>This really was so, so so good.</p>

                </li>

          </ul>

        </div>

        <!-- <div>

          <h3>Re: TAMPOPO (1985) DIR. JÛZÔ ITAMI</h3>

          <ul class="comment-list">
             <li class="comment even thread-even depth-1" id="comment-21344">
                    <div id="div-comment-21344" class="comment-body">
                    <div class="comment-author vcard">
                  <img alt="" src="https://secure.gravatar.com/avatar/00d3498d5577213e6e712c5942310cff?s=42&amp;d=mm&amp;r=g" srcset="https://secure.gravatar.com/avatar/00d3498d5577213e6e712c5942310cff?s=84&amp;d=mm&amp;r=g 2x" class="avatar avatar-42 photo" height="42" width="42">      <cite class="fn"><a href="https://kjchoi10.github.io" rel="external nofollow" class="url">Kevin</a></cite> <span class="says">says:</span>    </div>
                
                <p>love this movie! checkout the brattle too they play there sometimes</p>

                </li>

          </ul>

        </div> -->

      </div> <!-- end .comments -->

      <div class="home-widget-1">
        <?php dynamic_sidebar( 'home_widget-1' ); ?>
      </div>

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
        <?php
          $loop = new WP_Query( array(
            'posts_per_page'=> 6, 
            'ignore_sticky_posts'=>true, 
            'cat'=>$picture_cat->term_id
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
        <a class="view-all" href="<?php echo get_category_link( $picture_cat->term_id ); ?>">View All <?php echo $picture_cat->name; ?></a>
      </div>

      <div class="home-widget-2">
        <?php dynamic_sidebar( 'home_widget-2' ); ?>
      </div>

    </div>

    <div class="cta">
      <div style="background:white;width:100%;padding:2rem"><a href="javascript:void(0)"><h2 class="h1">Donate!</h2></a></div>
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

    <div class="newsletter">
      <p class="h4">The Most Relevant Newsletter of Your Life</p>
      <h2 class="h1">Join the Boston Hassle Mailing List</h2>
      <p class="form">
        <input type="email" placeholder="Email Address"><a href="javascript:void(0)" class="button large">Subscribe</a>
      </p>
    </div>

  </main>

<?php get_footer(); ?>