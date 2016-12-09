<?php get_header(); ?>

<main>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <header>
      <h1><?php the_title(); ?></h1>
    </header>

    <article>
    
      <?php the_content(); ?>

    </article>
      
  </main>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>

