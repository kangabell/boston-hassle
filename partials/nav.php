<!--
HEADER AND MAIN NAVIGATION
-->


<header id="header">
  
  <div>
    <a class="toggle-nav" href="javascript:void(0)">
      <span class="icon-menu"></span> 
      <span class="visually-hidden">Menu</span>
    </a> 
    <h1>
      <a class="logo" href="<?php echo get_home_url(); ?>">
        <?php if(get_theme_mod( 'bhass_logo' )) : ?>       
          <img src="<?php echo get_theme_mod( 'bhass_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
        <?php else : ?>       
          <?php bloginfo('name'); ?>  
        <?php endif; ?>
      </a>
    </h1>

    <div class="desktop">
      <?php bhass_main_nav_top(); ?>
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
    <?php bhass_main_nav_top(); ?>
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