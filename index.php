
<?php include 'header.php'; ?>

<body class="home">

<?php include 'partials/nav.php'; ?>

<main>
    <div>
      <div class="big-feature">
        <article>
          <img src="img.png">
          <h3>(Featured) Article Title</h3>
          <p>What else to write here What else to write here What else to write here Whatelseto write here onomotopaeia is a reallylongword</p>
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
        <img src="img.png">
        <h3>(Featured) Article Title</h3>
        <p>Date Name Some Information</p>
      </article>
      <article>
        <img src="img.png">
        <h3>(Featured) Article Title</h3>
        <p>Date Some Information for People</p>
      </article>
      <article>
        <img src="img.png">
        <h3>(Featured) Article Title</h3>
        <p>What else to write here</p>
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
        <img src="img.png">
        <a href="">Read More</a>
      </div>

    </div>

    <div class="articles">
      <div>
        <?php include 'partials/article.php'; ?>
        <?php include 'partials/article.php'; ?>
        <?php include 'partials/article.php'; ?>
        <?php include 'partials/article.php'; ?>
        <?php include 'partials/article.php'; ?>
        <?php include 'partials/article.php'; ?>
        <?php include 'partials/article.php'; ?>
        <?php include 'partials/article.php'; ?>
      </div>
      <div class="view-all"><button>View All Posts</button></div>
    </div>

  </main>

  <?php include 'footer.php'; ?>