<?php
/*
Template Name: Two-Column Page
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

    <div class="left">

      <article>
      
        <?php the_content(); ?>

      </article>

    </div>

    <aside role="complementary">
      <?php dynamic_sidebar( 'sidebar_page' ); ?>
    </aside>
      
  </main>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>

