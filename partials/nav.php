<div class="announcement">
  Announcement! From the crew. Clik herrr.
</div>

<header id="header">
  <div>
    <a class="toggle-nav" href="javascript:void(0)">&#8801;</a> 
    <h1>
      <a class="logo" href="<?php echo get_home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/library/bhass-logo.jpg"></a>
    </h1>
  </div>
</header>

<nav id="nav">

  <button class="toggle-nav">x Close</button>

  <section>
    <a href="/events">Calendar</a>
  </section>

  <section class="categories">
    <?php bhass_main_nav_categories(); ?>
  </section>

  <section class="pages">
    <?php bhass_main_nav_links(); ?>
  </section>

  <?php echo get_search_form(); ?>

  <section class="buttons">
    <?php bhass_main_nav_buttons(); ?>
  </section>

</nav>