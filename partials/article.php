<article class="<?php echo $class; ?>"><a href="<?php the_permalink(); ?>">

	<?php if ( $class != 'archive' ) { echo category_name(); }; ?>
  	<div class="thumbnail" style="background-image: url('<?php the_post_thumbnail_url('grid-thumb'); ?>')"></div>
  	<div class="text">
  		<?php if ( $class == 'archive' ) : ?>
        <p class="meta">
          <span class="datetime"><?php printf(__('<time pubdate>%1$s</time>', 'bhass'), get_the_time('M d, Y')); ?></span>
          | <span class="category"><?php echo category_name(); ?></span>
        </p>
  		<?php endif; ?>
  		<h3><?php echo short_title(); ?></h3>
  		<?php the_excerpt(); ?>
  		<p class="meta"><?php echo get_the_author(); ?></p>
  	</div>

</a></article>