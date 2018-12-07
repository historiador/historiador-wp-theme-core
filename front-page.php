<?php
/**
 * The front page template file
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Historiador
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php
		// Show the selected front page content.
		if ( have_posts() ) :
			while ( have_posts() ) :
				the_post();
				get_template_part( 'template-parts/page/content', 'front-page' );
			endwhile;
		else :
			get_template_part( 'template-parts/post/content', 'none' );
		endif;
		?>

		<?php
		// Get each of our panels and show the post data.
		if ( 0 !== historiador_panel_count() || is_customize_preview() ) : // If we have pages to show.

			/**
			 * Filter number of front page sections in Historiador.
			 *
			 * @param int $num_sections Number of front page sections.
			 */
			$num_sections = apply_filters( 'historiador_front_page_sections', 8 );
			global $historiadorcounter;

			// Create a setting and control for each of the sections available in the theme.
			for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
				$historiadorcounter = $i;
				historiador_front_page_section( null, $i );
			}

	endif; // The if ( 0 !== historiador_panel_count() ) ends here.
	?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
