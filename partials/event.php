<!--
MEDIUM-SIZED EVENT SNIPPET
used for events in the Events archive page
-->

<article <?php if ( (isset($hassle_show)) && ($hassle_show == true) ) { echo 'class="featured"'; } ?>>
	<a href="<?php echo esc_url( tribe_get_event_link() ); ?>">
		<div class="thumbnail" style="background-image: url('<?php bhass_article_img(); ?>')"></div>
		<div class="text">
			<p class="meta">
				<?php echo tribe_events_event_schedule_details(); ?>
				<?php if ( tribe_get_cost() ) : ?>
					<span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
				<?php endif; ?>
			</p>
			<h3><?php the_title(); ?></h3>
			<p class="meta category"><?php echo tribe_get_venue(); ?></p>
			<?php echo tribe_events_get_the_excerpt( null, wp_kses_allowed_html( 'post' ) ); ?>
			<?php
			if ( (isset($hassle_show)) && ($hassle_show == true) ) :
			?>
				<span class="badge"><?php _e( 'Hassle Show!', 'bhass' ); ?></span>
			<?php
			endif;
			?>
		</div>
	</a>
</article>