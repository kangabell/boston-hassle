<?php get_header(); ?>

<main>
  
  <header>
    <h1>
      <?php 
        if (is_category()) { 
          single_cat_title();
        } elseif (is_tag()) {
          single_tag_title();
        } elseif (is_author()) {
          global $post;
          $author_id = $post->post_author;
          echo get_the_author_meta('display_name', $author_id);
        } else {
          echo 'Archives';
        }
      ?>
    </h1>
  </header>

  <div class="left">
    <?php
      if (have_posts()) : while (have_posts()) : the_post();
        $class = 'archive';
        include 'partials/article.php';
      endwhile;
        get_template_part('partials/pagination');
      endif;
    ?>
  </div>

  <?php get_sidebar(); ?> 

</main>

<?php get_footer(); ?>

