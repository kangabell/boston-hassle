<?php get_header(); ?>

<main>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <header>
      <?php echo category_name(); ?>

      <h1><?php the_title(); ?></h1>

      <p class="meta"><?php echo get_the_author(); ?></p>
    </header>

    <article>
    
      <?php the_content(); ?>

      <div class="tags meta">
        <?php the_tags(''); ?>
      </div>

      <?php
        if ( comments_open() || get_comments_number() ) {
          comments_template();
        }
      ?>

    </article>
      
  </main>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>

