<div class="announcement">
  Announcement!<button style="float:right">X Close</button>
</div>

<header id="header">
  <div>
    <a class="toggle-nav" href="javascript:void(0)">&#8801;</a> 
    <h1>
      <a class="logo" href="<?php echo get_home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/library/hassle-logo.png"></a>
    </h1>
    <?php echo get_search_form(); ?>
  </div>
</header>

<nav id="nav">

  <button class="toggle-nav">x Close</button>

  <section>
    <a href="/events">Calendar</a>
  </section>

  <section class="categories">
    <a href="archive.php">New Music</a>
    <a href="archive.php">Art</a>
    <a href="archive.php">Film Flam</a>
  </section>

  <section class="pages">
    <?php bhass_main_nav_links(); ?>
  </section>

  <section class="buttons">
    <?php bhass_main_nav_buttons(); ?>
  </section>

</nav>