<?php
/**
 * Events Navigation Bar Module Template
 * Renders our events navigation bar used across our views
 *
 * $filters and $views variables are loaded in and coming from
 * the show funcion in: lib/Bar.php
 *
 * @package TribeEventsCalendar
 *
 */
?>

<?php

$filters = tribe_events_get_filters();
$views   = tribe_events_get_views();

$current_url = tribe_events_get_current_filter_url();
?>

<?php do_action( 'tribe_events_bar_before_template' ) ?>
<div id="tribe-events-bar">

	<form id="tribe-bar-form" class="tribe-clearfix" name="tribe-bar-form" method="post" action="<?php echo esc_attr( $current_url ); ?>">

		<!-- Mobile Filters Toggle -->

		<div id="tribe-bar-collapse-toggle" <?php if ( count( $views ) == 1 ) { ?> class="tribe-bar-collapse-toggle-full-width"<?php } ?>>
			<?php printf( esc_html__( 'Find %s', 'the-events-calendar' ), tribe_get_event_label_plural() ); ?><span class="tribe-bar-toggle-arrow"></span>
		</div>

		<!-- Views -->
		<?php if ( count( $views ) > 1 ) : ?>
			<div id="tribe-bar-views">
				<div class="tribe-bar-views-inner tribe-clearfix">
					<h3 class="tribe-events-visuallyhidden"><?php esc_html_e( 'Event Views Navigation', 'the-events-calendar' ) ?></h3>
					<label><?php esc_html_e( 'View As', 'the-events-calendar' ); ?></label>
					<select class="tribe-bar-views-select tribe-no-param" name="tribe-bar-view">
						<?php foreach ( $views as $view ) : ?>
							<option <?php echo tribe_is_view( $view['displaying'] ) ? 'selected' : 'tribe-inactive' ?> value="<?php echo esc_attr( $view['url'] ); ?>" data-view="<?php echo esc_attr( $view['displaying'] ); ?>">
								<?php echo $view['anchor']; ?>
							</option>
						<?php endforeach; ?>
					</select>
				</div>
				<!-- .tribe-bar-views-inner -->
			</div><!-- .tribe-bar-views -->
		<?php endif; ?>

		<?php if ( ! empty( $filters ) ) : ?>
			<div class="tribe-bar-filters">
				<input type="text" name="tribe-bar-search" id="tribe-bar-search">
				<input class="tribe-events-button tribe-no-param" type="submit" name="submit-bar" value="<?php printf( esc_attr__( 'Search', 'the-events-calendar' ), tribe_get_event_label_plural() ); ?>" />
			</div>
		<?php endif; ?>

	</form>
	<!-- #tribe-bar-form -->

</div><!-- #tribe-events-bar -->
<?php
do_action( 'tribe_events_bar_after_template' );
