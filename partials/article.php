<!--
MEDIUM-SIZED ARTICLE SNIPPET
used on the homepage, archive pages, event archive pages, and search results pages
-->

<article class="<?php echo $class; ?>"><a href="<?php the_permalink(); ?>">

	<?php if ( $class != 'archive' ) { get_template_part('partials/date-category'); } ?>
	<div class="thumbnail" style="background-image: url('<?php the_post_thumbnail_url('grid-thumb'); ?>')"></div>
	<div class="text">
		<?php if ( $class == 'archive' ) { get_template_part('partials/date-category'); } ?>
		<h3><?php echo short_title(); ?></h3>
		<?php the_excerpt(); ?>
		<p class="meta"><?php echo get_the_author(); ?></p>
	</div>

</a></article>