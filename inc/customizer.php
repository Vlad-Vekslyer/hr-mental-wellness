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

	$wp_customize->add_setting('street', array(
		'type' => 'theme_mod',
		'default' => ''
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'street',
			array(
				'label' => 'Street',
				'section' => 'contact_info'
			)
		)
	);

	$wp_customize->add_setting('postal_code', array(
		'type' => 'theme_mod',
		'default' => ''
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'postal_code',
			array(
				'label' => 'Postal Code',
				'section' => 'contact_info'
			)
		)
	);

	//Homepage Options
	$wp_customize->add_section('hr_homepage', array(
		'title' => 'Homepage Options',
		'capability' => 'edit_theme_options',
		'panel' => 'theme_options'
	));

	$wp_customize->add_setting('book_description', array(
		'type' => 'theme_mod',
		'default' => ''
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'book_description',
			array(
				'label' => 'Book Description',
				'description' => 'The text body for the book section',
				'section' => 'hr_homepage',
				'type' => 'textarea'
			)
		)
	);

	$wp_customize->add_setting('rayes_description', array(
		'type' => 'theme_mod',
		'default' => ''
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rayes_description',
			array(
				'label' => 'Rayes Description',
				'description' => 'The text body for the Dr.Rayes section',
				'section' => 'hr_homepage',
				'type' => 'textarea'
			)
		)
	);

	// rayes link refers to the page that contains information about dr.rayes
	$wp_customize->add_setting('rayes_link', array(
		'type' => 'theme_mod',
		'default' => ''
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'rayes_link',
			array(
				'label' => 'Dr.Rayes Page Link',
				'section' => 'hr_homepage'
			)
		)
	);

	// book link refers to the page that contains information about the book
	$wp_customize->add_setting('book_link', array(
		'type' => 'theme_mod',
		'default' => ''
	));

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'book_link',
			array(
				'label' => 'Book Page Link',
				'section' => 'hr_homepage'
			)
		)
	);

	$wp_customize->add_setting('hr_hero_image', array(
		'type' => 'theme_mod',
		'default' => ''
	));

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'hr_hero_image',
			array(
				'description' => 'The default hero image will be used for the homepage',
				'label' => 'Hero Image',
				'section' => 'hr_homepage'
			)
		)
	);
}
add_action( 'customize_register', 'hr_customize_register');
