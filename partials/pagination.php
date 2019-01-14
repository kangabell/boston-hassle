<!--
PAGE NAVIGATION
used on archive, events archive, and search-results pages
-->

<nav class="pagination">
	<span class="prev-link">
		<?php next_posts_link(__('&#8592; Older', 'bhass')); ?>
	</span>
	<span class="next-link">
		<?php previous_posts_link(__('Newer &#8594;', 'bhass')); ?>
	</span>
</nav>