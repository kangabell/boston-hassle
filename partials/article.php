<article class="<?php echo $class; ?>">

	<?php if ( $class != 'big-feature' ) { echo category_name(); }; ?>
  	<img src="<?php echo get_stylesheet_directory_uri(); ?>/library/img.png">

  	<div class="text">
  		<?php if ( $class == 'big-feature' ) { echo category_name(); }; ?>
  		<h3><?php echo short_title(); ?></h3>
  		<p><?php the_excerpt(); ?></p>
  		<p class="meta"><?php echo get_the_author(); ?></p>
  	</div>

</article>