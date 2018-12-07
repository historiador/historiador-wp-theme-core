<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage Historiador
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'historiador' ); ?>">
	<button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
		<?php
		echo historiador_get_svg( array( 'icon' => 'bars' ) );
		echo historiador_get_svg( array( 'icon' => 'close' ) );
		_e( 'Menu', 'historiador' );
		?>
	</button>

	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'top',
			'menu_id'        => 'top-menu',
		)
	);
	?>
</nav><!-- #site-navigation -->
