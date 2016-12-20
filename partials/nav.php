
<header id="header">
  
  <div>
    <a class="toggle-nav" href="javascript:void(0)">
      <span class="icon-menu"></span> 
      <span class="visually-hidden">Menu</span>
    </a> 
    <h1>
      <a class="logo" href="<?php echo get_home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/library/bhass-logo.jpg"></a>
    </h1>

    <div class="desktop">
      <a href="/events" class="calendar">Calendar</a>
      <?php bhass_main_nav_categories(); ?>
    </div>

  </div>
</header>

<nav id="nav">

  <a class="toggle-nav" href="javascript:void(0)">
    <span class="icon-cancel"></span> 
    <span class="visually-hidden">Close</span>
  </a>

  <section class="calendar mobile">
    <a href="/events">Calendar</a>
  </section>

  <section class="categories mobile">
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