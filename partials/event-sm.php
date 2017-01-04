<!--
SMALL EVENT SNIPPET
used for non-featured events in the Events archive page
-->

<article>
  	<p class="meta">
  		<?php echo tribe_events_event_schedule_details(); ?>
  		<?php if ( tribe_get_cost() ) : ?>
  			<span class="tribe-events-cost"><?php echo tribe_get_cost( null, true ) ?></span>
  		<?php endif; ?>
  	</p>
  	<h3><a href="<?php echo esc_url( tribe_get_event_link() ); ?>"><?php the_title(); ?></a></h3>
  	<p class="meta category"><?php echo tribe_get_venue(); ?></p>
</article>