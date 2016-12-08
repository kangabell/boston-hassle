<?php
/**
 * Address Module Template
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

$venue_id = get_the_ID();

$full_region = tribe_get_full_region( $venue_id );

?>

<?php
// This location's street address.
if ( tribe_get_address( $venue_id ) ) {
	echo tribe_get_address( $venue_id );
} ?>

<?php
// This locations's city.
if ( tribe_get_city( $venue_id ) ) {
	echo tribe_get_city( $venue_id ) . ',';
} ?>

<?php
// This location's abbreviated region. Full region name in the element title.
if ( tribe_get_region( $venue_id ) ) : ?>
	<abbr class="tribe-region tribe-events-abbr" title="<?php esc_attr_e( $full_region ); ?>"><?php echo tribe_get_region( $venue_id ); ?></abbr>
<?php endif; ?>

</span>
