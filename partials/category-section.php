<div class="<?php echo $category->slug . ' ' . $class; ?> category">
  <h2><?php echo $category->name; ?></h2>
  <?php // all articles within given category
    $loop = new WP_Query( array(
      'posts_per_page'=>$count, 
      'ignore_sticky_posts'=>true, 
      'cat'=>$category->term_id
    ) );
    while ($loop->have_posts()) : 
      $loop->the_post();
      include 'article-sm.php';
    endwhile; wp_reset_postdata();
  ?>
  <a class="view-all" href="<?php echo get_category_link( $category->term_id ); ?>">View All <?php echo $category->name; ?></a>
</div>