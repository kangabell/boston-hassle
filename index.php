
<?php include 'header.php'; ?>

<body class="home">

<?php include 'partials/nav.php'; ?>

<main>
    <div>
      <div class="big-feature">
        <article>
          <?php 
            query_posts ('posts_per_page=1&cat=4');
            if (have_posts()) : while (have_posts()) : the_post();
              include 'partials/article.php';
            endwhile; endif;
            wp_reset_query();
          ?>
        </article>
      </div>

      <div class="events">
        <h2>Go To</h2>
        <?php include 'partials/event-sm.php'; ?>
        <?php include 'partials/event-sm.php'; ?>
        <?php include 'partials/event-sm.php'; ?>
        <?php include 'partials/event-sm.php'; ?>
        <a href="">View Calendar</a>
      </div>
    </div>

    <div class="featured">
      <?php 
        query_posts ('posts_per_page=3&cat=4&offset=1');
        if (have_posts()) : while (have_posts()) : the_post();
          include 'partials/article.php';
        endwhile; endif;
        wp_reset_query();
      ?>
    </div>

    <div>

      <div class="music">
        <h2>Music</h2>
        <?php
          $loop = new WP_Query( array('posts_per_page'=>3,'cat'=>198) );
          while ($loop->have_posts()) : 
            $loop->the_post();
            if ($loop->current_post == 0) {
              include 'partials/article.php';
            } else {
              include 'partials/article-sm.php';
            }
          endwhile; wp_reset_postdata();
        ?>
      </div>

      <div class="film">
        <h2>Film</h2>
        <?php
          query_posts ('posts_per_page=4&cat=5');
          if (have_posts()) : while (have_posts()) : the_post();
            include 'partials/article-sm.php';
          endwhile; endif;
          wp_reset_query();
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
          query_posts ('posts_per_page=8');
          if (have_posts()) : while (have_posts()) : the_post();
            include 'partials/article.php';
          endwhile; endif;
        ?>
      </div>
      <div class="view-all"><button>View All Posts</button></div>
    </div>

  </main>

  <?php include 'footer.php'; ?>