<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Historiador
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header-single-column">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php historiador_edit_link( get_the_ID() ); ?>
	</header><!-- .entry-header-single-column -->
	<div class="entry-content-single-column">
		<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . __( 'Pages:', 'historiador' ),
					'after'  => '</div>',
				)
			);
		?>
	</div><!-- .entry-content-single-column -->
</article><!-- #post-## -->
