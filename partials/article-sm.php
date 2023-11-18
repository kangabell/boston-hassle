<!--
SMALL ARTICLE SNIPPET
used on the homepage (index.php)
-->

<article class="article-sm">
	<h3><a href="<?php the_permalink(); ?>"><?php echo short_title(); ?></a></h3>
	<p class="meta">
		<?php
		if ( function_exists( 'coauthors_posts_links' ) ) {
			coauthors();
		} else {
			the_author();
		}
		?>
	</p>
</article>