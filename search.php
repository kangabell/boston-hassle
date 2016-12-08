<?php get_header(); ?>

<main>
  
  <header>
    <h1>
      <?php _e('Results for:', 'bhass'); ?></span> <?php echo esc_attr(get_search_query()); ?>
    </h1>
  </header>

  <div class="left">
    <?php
      if (have_posts()) : while (have_posts()) : the_post();
        $class = 'archive';
        include 'partials/article.php';
      endwhile; endif;
    ?>
  </div>

  <?php get_sidebar(); ?>

</main>

<?php get_footer(); ?>

