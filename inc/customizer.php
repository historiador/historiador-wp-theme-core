<?php
/**
 * Historiador: Customizer
 *
 * @package WordPress
 * @subpackage Historiador
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function historiador_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	$wp_customize->selective_refresh->add_partial(
		'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'historiador_customize_partial_blogname',
		)
	);
	$wp_customize->selective_refresh->add_partial(
		'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'historiador_customize_partial_blogdescription',
		)
	);

	/**
	 * Theme options.
	 */
	$wp_customize->add_section(
		'theme_options', array(
			'title'    => __( 'Historiador Options', 'historiador' ),
			'priority' => 130, // Before Additional CSS.
		)
	);

	$wp_customize->add_setting(
		'page_layout', array(
			'default'           => 'two-column',
			'sanitize_callback' => 'historiador_sanitize_page_layout',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		'page_layout', array(
			'label'           => __( 'Page Layout', 'historiador' ),
			'section'         => 'theme_options',
			'type'            => 'radio',
			'description'     => __( 'When the two-column layout is assigned, the page title is in one column and content is in the other.', 'historiador' ),
			'choices'         => array(
				'one-column' => __( 'One Column', 'historiador' ),
				'two-column' => __( 'Two Column', 'historiador' ),
			),
			'active_callback' => 'historiador_is_view_with_layout_option',
		)
	);

	/**
	 * Filter number of front page sections in Historiador.
	 *
	 * @param int $num_sections Number of front page sections.
	 */
	$num_sections = apply_filters( 'historiador_front_page_sections', 8 );

	// Create a setting and control for each of the sections available in the theme.
	for ( $i = 1; $i < ( 1 + $num_sections ); $i++ ) {
		$wp_customize->add_setting(
			'panel_' . $i, array(
				'default'           => false,
				'sanitize_callback' => 'absint',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'panel_' . $i, array(
				/* translators: %d is the front page section number */
				'label'           => sprintf( __( 'Front Page Section %d Content', 'historiador' ), $i ),
				'description'     => ( 1 !== $i ? '' : __( 'Select pages to feature in each area from the dropdowns. Add an image to a section by setting a featured image in the page editor. Empty sections will not be displayed.', 'historiador' ) ),
				'section'         => 'theme_options',
				'type'            => 'dropdown-pages',
				'allow_addition'  => true,
				'active_callback' => 'historiador_is_static_front_page',
			)
		);

		$wp_customize->selective_refresh->add_partial(
			'panel_' . $i, array(
				'selector'            => '#panel' . $i,
				'render_callback'     => 'historiador_front_page_section',
				'container_inclusive' => true,
			)
		);
	}

	// No need to mess around with these
	$wp_customize->remove_panel('widgets');
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'static_front_page' );
	$wp_customize->remove_section( 'custom_css' );
}
add_action( 'customize_register', 'historiador_customize_register' );

/**
 * Sanitize the page layout options.
 *
 * @param string $input Page layout.
 */
function historiador_sanitize_page_layout( $input ) {
	$valid = array(
		'one-column' => __( 'One Column', 'historiador' ),
		'two-column' => __( 'Two Column', 'historiador' ),
	);

	if ( array_key_exists( $input, $valid ) ) {
		return $input;
	}

	return '';
}

/**
 * Render the site title for the selective refresh partial.
 *
 * @see historiador_customize_register()
 *
 * @return void
 */
function historiador_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @see historiador_customize_register()
 *
 * @return void
 */
function historiador_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Return whether we're previewing the front page and it's a static page.
 */
function historiador_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

/**
 * Return whether we're on a view that supports a one or two column layout.
 */
function historiador_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}

/**
 * Bind JS handlers to instantly live-preview changes.
 */
function historiador_customize_preview_js() {
	wp_enqueue_script( 'historiador-customize-preview', get_theme_file_uri( '/assets/js/customize-preview.js' ), array( 'customize-preview' ), '1.0', true );
}
add_action( 'customize_preview_init', 'historiador_customize_preview_js' );
