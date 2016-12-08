<article class="<?php echo $class; ?>">

	<?php if ( $class != 'hero' && $class != 'archive' ) { echo category_name(); }; ?>
  	<img src="https://bostonhassle.com/wp-content/uploads/2016/12/manchester0002-768x512.jpg">

  	<div class="text">
  		<?php if ( $class == 'hero' ) { 
  			echo category_name(); 
  		} ?>
  		<?php if ( $class == 'archive' ) { 
  			echo '<p class="meta category">' . get_the_category_list(', ') . '</p>';
  		} ?>
  		<h3><a href="<?php the_permalink(); ?>"><?php echo short_title(); ?></a></h3>
  		<?php the_excerpt(); ?>
  		<p class="meta"><?php echo get_the_author(); ?></p>
  	</div>

</article>