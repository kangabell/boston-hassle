<!--
ARCHIVE PAGE TEMPLATE
Used for all blog type pages, such as category pages (e.g. "Film Flam"),
tag pages (e.g. "somerville"), author pages (e.g. "Articles by Sam P"), etc.
Does not include Event pages.
-->

<?php get_header(); ?>

<main>
  
  <header>
    <?php if (is_author()) {
      echo '<p class="subheading">Articles by</p>';
    } ?>
    <h1 class="page-title">
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
    <?php if (category_description()) : ?>
      <p class="subheading">
        <?php echo category_description(); ?>
      </p>
    <?php endif; ?>
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

