<?php get_header(); ?>

<main role="article">

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <header>
      <?php echo category_name(); ?>

      <h1><?php the_title(); ?></h1>

      <p class="meta"><?php echo get_the_author(); ?></p>
    </header>
    
    <?php the_content(); ?>

    <div class="tags">
      <h4>Tags</h4>
      <p>Tag, Tag, Metadata</p>
    </div>

    <div class="comments">
      <h3>Comments</h3>
      <div style="height:20rem;background:silver"></div>
    </div>
      
  </main>

  <?php endwhile; endif; ?>

<?php get_footer(); ?>

