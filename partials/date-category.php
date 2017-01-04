<!--
DATE + CATEGORY META DATA
used in article snippets
-->

<p class="meta">
  <span class="datetime"><?php printf(__('<time pubdate>%1$s</time>', 'bhass'), get_the_time('M d, Y')); ?></span>
  | <span class="category"><?php echo category_name(); ?></span>
</p>