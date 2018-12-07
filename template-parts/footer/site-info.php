<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage Historiador
 */

?>
<div class="site-info">
	<?php
	if ( function_exists( 'the_privacy_policy_link' ) ) {
		the_privacy_policy_link( '', '<span role="separator" aria-hidden="true"></span>' );
	}
	?>
	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'historiador' ) ); ?>" class="imprint">
		<?php printf( __( 'Powered by %s', 'historiador' ), 'WordPress' ); ?>
	</a>

	|

	<a href="<?php echo esc_url( __( 'https://github.com/historiador/historiador-wp-theme/', 'historiador' ) ); ?>" class="imprint">
		<?php printf( __( 'Running the %s', 'historiador' ), 'Historiador Theme' ); ?>
	</a>

</div><!-- .site-info -->
