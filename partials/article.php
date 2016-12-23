<article class="<?php echo $class; ?>">

	<?php if ( $class != 'archive' ) { echo category_name(); }; ?>
  	<a class="thumbnail" href="<?php the_permalink(); ?>" style="background-image: url('<?php the_post_thumbnail_url('grid-thumb'); ?>')"></a>
  	<div class="text">
  		<?php if ( $class == 'archive' ) { 
  			echo '<p class="meta category">' . get_the_category_list(', ') . '</p>';
  		} ?>
  		<h3><a href="<?php the_permalink(); ?>"><?php echo short_title(); ?></a></h3>
  		<?php the_excerpt(); ?>
  		<p class="meta"><?php echo get_the_author(); ?></p>
  	</div>

</article>