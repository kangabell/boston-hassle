<nav class="pagination">
    <span class="prev-link">
	<?php 
		if ( tribe_is_event_query() ) { // if it's an event page
			previous_posts_link(__('&#8592; Earlier', 'bhass'));
		} else {
    		next_posts_link(__('&#8592; Older', 'bhass'));
		}
	?>
    </span>
    <span class="next-link">
		<?php 
			if ( tribe_is_event_query() ) { // if it's an event page
				next_posts_link(__('Later &#8594;', 'bhass'));
			} else {
	    		previous_posts_link(__('Newer &#8594;', 'bhass'));
			}
		?>
    </span>
</nav> 