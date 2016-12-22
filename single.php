<?php get_header(); ?>

<main>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <header>
      
      <p class="meta">
        <span class="datetime"><?php printf(__('<time pubdate>%1$s</time>', 'bhass'), get_the_time('M d, Y')); ?></span>
        | <span class="category"><?php echo get_the_category_list(', '); ?></span>
      </p>

      <h1><?php the_title(); ?></h1>

      <p class="meta">by <?php the_author_posts_link(); ?></p>

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

