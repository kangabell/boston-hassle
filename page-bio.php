<?php
/*
Template Name: Bio Page
*/
?>

<?php get_header(); ?>

<main>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <header>
      <h1><?php the_title(); ?></h1>
      <?php if ( get_field('subheading') ) : ?>
      	<p class="subheading">
	      	<?php the_field('subheading'); ?>
      	</p>
      <?php endif; ?>
    </header>

    <article>
    
      <?php the_content(); ?>

    </article>
      
  </main>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>

