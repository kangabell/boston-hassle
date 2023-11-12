<?php get_header(); ?>

<main>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php get_template_part('partials/page-header'); ?>

    <article>

      <?php the_content(); ?>

    </article>

  <?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>