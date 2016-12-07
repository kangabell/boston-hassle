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

      <div class="comments">
        <h3>Comments</h3>
        <div style="height:20rem;background:silver"></div>
      </div>

    </article>
      
  </main>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>

