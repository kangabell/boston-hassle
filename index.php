
<?php include 'header.php'; ?>

<body class="home">

<?php include 'partials/nav.php'; ?>

<main>
    <div>
      <div class="big-feature">
        <article>
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/library/img.png">
          <p class="meta category">Film Flam</p>
          <h3>(Featured) Article Title</h3>
          <p>What else to write here What else to write here What else to write here Whatelseto write here onomotopaeia is a reallylongword</p>
          <p class="meta">W. Logan Freeman</p>
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
      <article>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/library/img.png">
        <h3>(Featured) Article Title</h3>
        <p>Date Name Some Information</p>
        <p class="meta">Kylie Obermeier</p>
      </article>
      <article>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/library/img.png">
        <h3>(Featured) Article Title</h3>
        <p>Date Some Information for People</p>
        <p class="meta">Kylie Obermeier</p>
      </article>
      <article>
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/library/img.png">
        <h3>(Featured) Article Title</h3>
        <p>What else to write here</p>
        <p class="meta">Kylie Obermeier</p>
      </article>
    </div>

    <div>

      <div class="music">
        <h2>Music</h2>
        <?php include 'partials/article.php'; ?>
        <?php include 'partials/article-sm.php'; ?>
        <?php include 'partials/article-sm.php'; ?>
      </div>

      <div class="film">
        <h2>Film</h2>
        <?php include 'partials/article-sm.php'; ?>
        <?php include 'partials/article-sm.php'; ?>
        <?php include 'partials/article-sm.php'; ?>
        <?php include 'partials/article-sm.php'; ?>
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
          global $query_string;
          query_posts ('posts_per_page=8');
          if (have_posts()) : while (have_posts()) : the_post();
        ?>
          <?php include 'partials/article.php'; ?>
        <?php endwhile; endif; ?>
      </div>
      <div class="view-all"><button>View All Posts</button></div>
    </div>

  </main>

  <?php include 'footer.php'; ?>