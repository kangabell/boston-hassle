<!--
MEDIUM-SIZED ARTICLE SNIPPET
used on the homepage, archive pages, event archive pages, search results pages, and related posts
-->

<article class="<?php if ( isset($class) ) { echo $class; } ?>"><a href="<?php the_permalink(); ?>">

	<?php if ( (isset($class)) && ($class != 'archive') ) { get_template_part('partials/date-category'); } ?>
	<div class="thumbnail" style="background-image: url('<?php bhass_article_img(); ?>')"></div>
	<div class="text">
		<?php if ( (isset($class)) && ($class == 'archive') ) { get_template_part('partials/date-category'); } ?>
		<h3><?php echo short_title(); ?></h3>
		<?php
		// use a custom excerpt if there is one, or if not use the subtitle,
		// and if there's neither, use the automatic excerpt
			if ( has_excerpt() ) {
				the_excerpt(); 
			} elseif ( get_field('subtitle') ) {
				echo '<p class="excerpt">';
				the_field('subtitle');
				echo '</p>';
			} else {
				the_excerpt();
			}
		?>
		<p class="meta"><?php echo get_the_author(); ?></p>
	</div>

</a></article>