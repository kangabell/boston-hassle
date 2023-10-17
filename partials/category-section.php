<!--
CATEGORY SECTION
used on the homepage for category-based columns.
-->

<div class="<?php echo $category->slug . ' ' . $class; ?> category">
  <h2><?php echo $category->name; ?></h2>
  <?php // all articles within given category
    if ( $events ) {
      $loop = new WP_Query( array(
        'posts_per_page'=> 4,
        'ignore_sticky_posts'=>true,
        'cat'=>$category->term_id
      ) );
    } else {
      $loop = new WP_Query( array(
        'posts_per_page'=> 3,
        'ignore_sticky_posts'=>true,
        'cat'=>$category->term_id
      ) );
    }
    while ($loop->have_posts()) : 
      $loop->the_post();
      include 'article-sm.php';
    endwhile; wp_reset_postdata();
  ?>
</div>