<header>
  <h1><?php the_title(); ?></h1>
  <?php if ( get_field('subtitle') ) : ?>
  	<p class="subheading">
      	<?php the_field('subtitle'); ?>
  	</p>
  <?php endif; ?>
</header>