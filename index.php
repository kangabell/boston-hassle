
<?php include 'header.php'; ?>

<body class="home">

<?php include 'partials/nav.php'; ?>

<main>
    <div>
      <div class="big-feature">
        <article>
          <img src="">
          <h4>(Featured) Article Title</h4>
          <p>What else to write here What else to write here What else to write here Whatelseto write here onomotopaeia is a reallylongword</p>
        </article>
      </div>

      <div class="events">
        <h3>Upcoming Go-To Events</h3>
        <p>Date Name Some Information</p>
        <p>Date Some Information for People</p>
        <p>Information and Name</p>
        <p>What else to write here</p>
        <a href="">View Calendar</a>
      </div>
    </div>

    <div class="featured">
      <article>
        <img src="">
        <h4>(Featured) Article Title</h4>
        <p>Date Name Some Information</p>
      </article>
      <article>
        <img src="">
        <h4>(Featured) Article Title</h4>
        <p>Date Some Information for People</p>
      </article>
      <article>
        <img src="">
        <h4>(Featured) Article Title</h4>
        <p>What else to write here</p>
      </article>
    </div>

    <div>

      <div class="music">
        <h3>Music</h3>
        <?php include 'partials/article-sm.php'; ?>
        <?php include 'partials/article-sm.php'; ?>
        <?php include 'partials/article-sm.php'; ?>
        <?php include 'partials/article-sm.php'; ?>
      </div>

      <div class="compass">
        <h3>Boston Compass</h3>
        <img src="">
        <a href="">Read More</a>
      </div>

    </div>

    <div class="articles">
      <div>
        <?php include 'partials/article.php'; ?>
        <?php include 'partials/article.php'; ?>
        <?php include 'partials/article.php'; ?>
        <?php include 'partials/article.php'; ?>
      </div>
      <div class="view-all"><button>View All Posts</button></div>
    </div>

  </main>

  <?php include 'footer.php'; ?>