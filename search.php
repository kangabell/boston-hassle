<!--
SEARCH RESULTS PAGE
-->

<?php get_header(); ?>

<main>
  
  <header>
    <h1 class="page-title">
      <?php _e('Results for:', 'bhass'); ?></span> <?php echo esc_attr(get_search_query()); ?>
    </h1>
  </header>

  <div class="left">
    <?php
      if (have_posts()) : while (have_posts()) : the_post();
        $class = 'archive';
        include 'partials/article.php';
      endwhile;
        get_template_part('partials/pagination');
      else: ?>
      <h2>No Results</h2>
      <p>Sorry, no results were found! Try again?</p>
      <?php echo get_search_form(); ?>
    <?php
      endif;
    ?>
  </div>

  <?php get_sidebar(); ?>

</main>

<?php get_footer(); ?>

