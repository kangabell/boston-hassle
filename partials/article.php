<article>
	<p class="meta category"><?php echo category_name(); ?></p>
  	<img src="<?php echo get_stylesheet_directory_uri(); ?>/library/img.png">
  	<h3><?php echo short_title(); ?></h3>
  	<p><?php the_excerpt(); ?></p>
  	<p class="meta"><?php echo get_the_author(); ?></p>
</article>