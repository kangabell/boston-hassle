<?php
/*
Template Name: Two-Column Page
*/
?>

<?php get_header(); ?>

<main>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php get_template_part('partials/page-header'); ?>

    <div class="left">

      <article>
      
        <?php the_content(); ?>

      </article>

    </div>

    <aside class="sidebar" role="complementary">
      <?php dynamic_sidebar( 'sidebar_page' ); ?>
    </aside>
      
  </main>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>

