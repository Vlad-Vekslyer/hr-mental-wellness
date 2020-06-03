<?php

function hr_customize_register( $wp_customize ) {

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	 //Panel for section & control
	$wp_customize->add_panel( 'theme_options', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => 'Theme Options Panel', 'flourish-lite',
	) );

	// Contact Info Options
	$wp_customize->add_section('contact_info', array(
		'title' => 'Contact Information',
		'capability' => 'edit_theme_options',
		'panel' => 'theme_options'
	));

	$wp_customize->add_setting('phone', array(
		'type' => 'theme_mod',
		'default' => ''
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'phone',
			array(
				'label' => 'Phone Number',
				'section' => 'contact_info'
			)
		)
	);

	$wp_customize->add_setting('address', array(
		'type' => 'theme_mod',
		'default' => ''
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'address',
			array(
				'label' => 'Address',
				'section' => 'contact_info'
			)
		)
	);

	//Homepage Options
	$wp_customize->add_section('hr_hero', array(
		'title' => 'Homepage Options',
		'capability' => 'edit_theme_options',
		'panel' => 'theme_options'
	));

	$wp_customize->add_setting('hr_hero_image', array(
		'type' => 'theme_mod',
		'default' => '',
	));

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'hr_hero_image',
			array(
				'description' => 'The default hero image will be used for the homepage',
				'label' => 'Hero Image',
				'section' => 'hr_hero'
			)
		)
	);
}
add_action( 'customize_register', 'hr_customize_register');
