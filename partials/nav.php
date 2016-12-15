<div class="announcement">
  <p>
    Announcement! From the crew. Might be a little long, so typing some stuff now. Clik herrr.
    <a href="javascript:void(0)">
      <span class="icon-cancel"></span> 
      <span class="visually-hidden">Dismiss</span>
    </a>
  </p> 
</div>

<header id="header">
  <div>
    <a class="toggle-nav" href="javascript:void(0)">
      <span class="icon-menu"></span> 
      <span class="visually-hidden">Menu</span>
    </a> 
    <h1>
      <a class="logo" href="<?php echo get_home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/library/bhass-logo.jpg"></a>
    </h1>
  </div>
</header>

<nav id="nav">

  <a class="toggle-nav" href="javascript:void(0)">
    <span class="icon-cancel"></span> 
    <span class="visually-hidden">Close</span>
  </a>

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