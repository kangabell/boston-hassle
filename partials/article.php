<article class="<?php echo $class; ?>">

	<?php if ( $class != 'hero' ) { echo category_name(); }; ?>
  	<img src="https://bostonhassle.com/wp-content/uploads/2016/12/manchester0002-768x512.jpg">

  	<div class="text">
  		<?php if ( $class == 'hero' ) { echo category_name(); }; ?>
  		<h3><?php echo short_title(); ?></h3>
  		<?php the_excerpt(); ?>
  		<p class="meta"><?php echo get_the_author(); ?></p>
  	</div>

</article>