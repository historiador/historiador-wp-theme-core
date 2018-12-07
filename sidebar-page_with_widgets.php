<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Historiador
 */

// NOTE see functions.php `register_sidebar()`
if ( ! is_active_sidebar( 'sidebar-page_with_widgets' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Sidebar for search results', 'historiador' ); ?>">
	<?php dynamic_sidebar( 'sidebar-page_with_widgets' ); ?>
</aside><!-- #secondary -->
