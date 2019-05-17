<!--
PAGE HEADER
-->

<header>
  <h1 class="page-title"><?php the_title(); ?></h1>
  <?php if ( get_field('subtitle') ) : ?>
  	<p class="subheading">
      	<?php the_field('subtitle'); ?>
  	</p>
  <?php endif; ?>
</header>