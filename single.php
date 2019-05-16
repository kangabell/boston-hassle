<!--
SINGLE POST / ARTICLE PAGE
-->

<?php get_header(); ?>

<main>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <header>
      
      <p class="meta">
        <span class="datetime"><?php printf(__('<time pubdate>%1$s</time>', 'bhass'), get_the_time('M d, Y')); ?></span>
      </p>
      <p class="meta">
        <span class="category"><?php echo get_the_category_list(', '); ?></span>
      </p>

      <h1 class="page-title"><?php the_title(); ?></h1>

      <?php if ( get_field('subtitle') ) : ?>
        <p class="subheading">
            <?php the_field('subtitle'); ?>
        </p>
      <?php endif; ?>

      <p class="meta">by <?php the_author_posts_link(); ?></p>

    </header>

    <article>
    
      <?php the_content(); ?>

    </article>

    <?php if ( has_tag() ) : ?>
      <section class="tags meta">

        <span class="label">Tags:</span>
        <?php the_tags(''); ?>

      </section>
    <?php endif; ?>

    <section class="related-posts">

      <?php 
        $orig_post = $post;
        global $post;
        $categories = get_the_category($post->ID);

        if ($categories) {

          echo '<h2>You Might Also Like...</h2>';

          $category_ids = array();

          foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

          $args = array(
            'category__in' => $category_ids,
            'post__not_in' => array($post->ID),
            'posts_per_page' => 3,
            'ignore_sticky_posts' => true
          );

          $query = new wp_query( $args );

          if ( $query->have_posts() ) : while( $query->have_posts() ) {

              $query->the_post();

              get_template_part('partials/article');

          } endif;
        }

      wp_reset_query(); 

      ?>
    </section>

    <?php
      if ( comments_open() || get_comments_number() ) {
        comments_template();
      }
    ?>

    <?php endwhile; endif; ?>

    
      
  </main>

<?php get_footer(); ?>

