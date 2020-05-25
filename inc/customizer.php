<?php

function flourish_lite_child_customize_register( $wp_customize ) {

	// function flourish_lite_child_sanitize_dropdown_pages( $page_id, $setting ) {
	//   // Ensure $input is an absolute integer.
	//   $page_id = absint( $page_id );
	//
	//   // If $page_id is an ID of a published page, return it; otherwise, return the default.
	//   return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	// }
	//
	// function flourish_lite_child_sanitize_checkbox( $checked ) {
	// 	// Boolean check.
	// 	return ( ( isset( $checked ) && true == $checked ) ? true : false );
	// }

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	 //Panel for section & control
	$wp_customize->add_panel( 'theme_options', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'flourish-lite' ),
	) );

	//Homepage Options
	$wp_customize->add_section('flourish_lite_child_hero', array(
		'title' => __( 'Default Hero Image' ),
		'description' => __('The default hero image will be used for the homepage'),
		'capability' => 'edit_theme_options',
		'panel' => 'theme_options'
	));

	$wp_customize->add_setting('flourish_lite_child_hero_image', array(
		'type' => 'theme_mod',
		'default' => '',
	));

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'flourish_lite_child_hero_image',
			array(
				'description' => 'Custom Hero Image URL',
				'label' => __('Hero Image'),
				'section' => 'flourish_lite_child_hero'
			)
		)
	);

	$wp_customize->remove_panel('flourish_lite_panel_section');
}
add_action( 'customize_register', 'flourish_lite_child_customize_register', 15);
