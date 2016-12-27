<?php
/*
Template Name: Bio Page
*/
?>

<?php get_header(); ?>

<main>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php get_template_part('partials/page-header'); ?>

    <article>
    
      <?php the_content(); ?>

    </article>
      
  </main>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>

