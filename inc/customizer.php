<?php
/**
 *flourish-lite Theme Customizer
 *
 * @package Flourish Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function flourish_lite_child_customize_register( $wp_customize ) {

	function flourish_lite_child_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );

	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function flourish_lite_child_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	 //Panel for section & control
	$wp_customize->add_panel( 'flourish_lite_panel_section', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'flourish-lite' ),
	) );

	//Homepage Options
	$wp_customize->add_section('flourish_lite_child_hero', array(
		'title' => __( 'Hero' ),
		'description' => __('Customize the Hero section'),
		'capability' => 'edit_theme_options',
		'panel' => 'flourish_lite_panel_section'
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

	//Layout Options
	$wp_customize->add_section('flourish_lite_layout_option',array(
		'title' => __('Site Layout Options','flourish-lite'),
		'priority' => 1,
		'panel' => 	'flourish_lite_panel_section',
	));

	$wp_customize->add_setting('flourish_lite_boxlayout',array(
		'sanitize_callback' => 'flourish_lite_child_sanitize_checkbox',
	));

	$wp_customize->add_control( 'flourish_lite_boxlayout', array(
    	'section'   => 'flourish_lite_layout_option',
		'label' => __('Check to Box Layout','flourish-lite'),
		'description' => __('If you want to box layout please check the Box Layout Option.','flourish-lite'),
    	'type'      => 'checkbox'
     )); //Layout Section

	$wp_customize->add_setting('flourish_lite_site_color_options',array(
		'default' => '#e96300',
		'sanitize_callback' => 'sanitize_hex_color'
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'flourish_lite_site_color_options',array(
			'label' => __('Color Options','flourish-lite'),
			'description' => __('More color options in PRO Version','flourish-lite'),
			'section' => 'colors',
			'settings' => 'flourish_lite_site_color_options'
		))
	);

	$wp_customize->add_setting('flourish_lite_site_hovercolor_options',array(
		'default' => '#c17600',
		'sanitize_callback' => 'sanitize_hex_color'
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'flourish_lite_site_hovercolor_options',array(
			'label' => __('Hover Color Options','flourish-lite'),
			'description' => __('More color options in PRO Version','flourish-lite'),
			'section' => 'colors',
			'settings' => 'flourish_lite_site_hovercolor_options'
		))
	);

	//Header Top  Contact info
	$wp_customize->add_section('flourish_lite_htcontactinfo',array(
		'title' => __('Header Top Contact info','flourish-lite'),
		'priority' => null,
		'panel' => 	'flourish_lite_panel_section',
	));

	$wp_customize->add_setting('flourish_lite_site_htphoneinfo',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('flourish_lite_site_htphoneinfo',array(
		'type' => 'text',
		'label' => __('Add phone number here','flourish-lite'),
		'section' => 'flourish_lite_htcontactinfo',
		'setting' => 'flourish_lite_site_htphoneinfo'
	));


	$wp_customize->add_setting('flourish_lite_htemailinfo',array(
		'sanitize_callback' => 'sanitize_email'
	));

	$wp_customize->add_control('flourish_lite_htemailinfo',array(
		'type' => 'text',
		'label' => __('Add email address here.','flourish-lite'),
		'section' => 'flourish_lite_htcontactinfo'
	));


	$wp_customize->add_setting('flourish_lite_show_ht_contactinfo_sections',array(
		'default' => false,
		'sanitize_callback' => 'flourish_lite_child_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'flourish_lite_show_ht_contactinfo_sections', array(
	   'settings' => 'flourish_lite_show_ht_contactinfo_sections',
	   'section'   => 'flourish_lite_htcontactinfo',
	   'label'     => __('Check To show This Section','flourish-lite'),
	   'type'      => 'checkbox'
	 ));//Show Header Contact Info


	// Header Slider Section
	$wp_customize->add_section( 'flourish_lite_frontpage_slidesec', array(
		'title' => __('Slider Sections', 'flourish-lite'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 600 pixel.','flourish-lite'),
		'panel' => 	'flourish_lite_panel_section',
    ));

	$wp_customize->add_setting('flourish_lite_frontslider_selectpagebx1',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'flourish_lite_child_sanitize_dropdown_pages'
	));

	$wp_customize->add_control('flourish_lite_frontslider_selectpagebx1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slider first:','flourish-lite'),
		'section' => 'flourish_lite_frontpage_slidesec'
	));

	$wp_customize->add_setting('flourish_lite_frontslider_selectpagebx2',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'flourish_lite_child_sanitize_dropdown_pages'
	));

	$wp_customize->add_control('flourish_lite_frontslider_selectpagebx2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slider second:','flourish-lite'),
		'section' => 'flourish_lite_frontpage_slidesec'
	));

	$wp_customize->add_setting('flourish_lite_frontslider_selectpagebx3',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'flourish_lite_child_sanitize_dropdown_pages'
	));

	$wp_customize->add_control('flourish_lite_frontslider_selectpagebx3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slider third:','flourish-lite'),
		'section' => 'flourish_lite_frontpage_slidesec'
	));	// Slider Section Options

	$wp_customize->add_setting('flourish_lite_frontslider_morebtntext',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'
	));

	$wp_customize->add_control('flourish_lite_frontslider_morebtntext',array(
		'type' => 'text',
		'label' => __('Add slider Read more button name here','flourish-lite'),
		'section' => 'flourish_lite_frontpage_slidesec',
		'setting' => 'flourish_lite_frontslider_morebtntext'
	)); // Slider Read More Button Text

	$wp_customize->add_setting('flourish_lite_show_home_slider_section',array(
		'default' => false,
		'sanitize_callback' => 'flourish_lite_child_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'flourish_lite_show_home_slider_section', array(
	    'settings' => 'flourish_lite_show_home_slider_section',
	    'section'   => 'flourish_lite_frontpage_slidesec',
	     'label'     => __('Check To Show This Section','flourish-lite'),
	   'type'      => 'checkbox'
	 ));//Show Home Slider Section


	 // Three Column Services Section
	$wp_customize->add_section('flourish_lite_threebox_services_sections', array(
		'title' => __('Three Column Services Sections','flourish-lite'),
		'description' => __('Select pages from the dropdown for services section','flourish-lite'),
		'priority' => null,
		'panel' => 	'flourish_lite_panel_section',
	));

	$wp_customize->add_setting('flourish_lite_select3page_column1',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'flourish_lite_child_sanitize_dropdown_pages'
	));

	$wp_customize->add_control(	'flourish_lite_select3page_column1',array(
		'type' => 'dropdown-pages',
		'section' => 'flourish_lite_threebox_services_sections',
	));

	$wp_customize->add_setting('flourish_lite_select3page_column2',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'flourish_lite_child_sanitize_dropdown_pages'
	));

	$wp_customize->add_control(	'flourish_lite_select3page_column2',array(
		'type' => 'dropdown-pages',
		'section' => 'flourish_lite_threebox_services_sections',
	));

	$wp_customize->add_setting('flourish_lite_select3page_column3',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'flourish_lite_child_sanitize_dropdown_pages'
	));

	$wp_customize->add_control(	'flourish_lite_select3page_column3',array(
		'type' => 'dropdown-pages',
		'section' => 'flourish_lite_threebox_services_sections',
	));


	$wp_customize->add_setting('flourish_lite_show_threebox_services_sections',array(
		'default' => false,
		'sanitize_callback' => 'flourish_lite_child_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'flourish_lite_show_threebox_services_sections', array(
	   'settings' => 'flourish_lite_show_threebox_services_sections',
	   'section'   => 'flourish_lite_threebox_services_sections',
	   'label'     => __('Check To Show This Section','flourish-lite'),
	   'type'      => 'checkbox'
	 ));//Show three column Services Sections


	 // Why You Should Choose Us Section
	$wp_customize->add_section('flourish_lite_whychooseus_sections', array(
		'title' => __('Why Choose Us Section','flourish-lite'),
		'description' => __('Select Pages from the dropdown for Why Choose Us section','flourish-lite'),
		'priority' => null,
		'panel' => 	'flourish_lite_panel_section',
	));

	$wp_customize->add_setting('flourish_lite_createpagefor_whychooseus',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'flourish_lite_child_sanitize_dropdown_pages'
	));

	$wp_customize->add_control(	'flourish_lite_createpagefor_whychooseus',array(
		'type' => 'dropdown-pages',
		'section' => 'flourish_lite_whychooseus_sections',
	));


	$wp_customize->add_setting('flourish_lite_show_whychooseus_sections',array(
		'default' => false,
		'sanitize_callback' => 'flourish_lite_child_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'flourish_lite_show_whychooseus_sections', array(
	    'settings' => 'flourish_lite_show_whychooseus_sections',
	    'section'   => 'flourish_lite_whychooseus_sections',
	    'label'     => __('Check To Show This Section','flourish-lite'),
	    'type'      => 'checkbox'
	));//Show Why Choose Us Section

	//Sidebar Settings
	$wp_customize->add_section('flourish_lite_sidebar_options', array(
		'title' => __('Sidebar Options','flourish-lite'),
		'priority' => null,
		'panel' => 	'flourish_lite_panel_section',
	));

	$wp_customize->add_setting('flourish_lite_hidesidebar_from_homepage',array(
		'default' => false,
		'sanitize_callback' => 'flourish_lite_child_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'flourish_lite_hidesidebar_from_homepage', array(
	   'settings' => 'flourish_lite_hidesidebar_from_homepage',
	   'section'   => 'flourish_lite_sidebar_options',
	   'label'     => __('Check to hide sidebar from latest post page','flourish-lite'),
	   'type'      => 'checkbox'
	 ));// Hide sidebar from latest post page


	 $wp_customize->add_setting('flourish_lite_hidesidebar_singlepost',array(
		'default' => false,
		'sanitize_callback' => 'flourish_lite_child_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'flourish_lite_hidesidebar_singlepost', array(
	   'settings' => 'flourish_lite_hidesidebar_singlepost',
	   'section'   => 'flourish_lite_sidebar_options',
	   'label'     => __('Check to hide sidebar from single post','flourish-lite'),
	   'type'      => 'checkbox'
	 ));// hide sidebar single post


	  //Footer Social icons
	$wp_customize->add_section('flourish_lite_footer_social_sections',array(
		'title' => __('Footer social icons','flourish-lite'),
		'description' => __( 'Add social icons link here to display icons in footer.', 'flourish-lite' ),
		'priority' => null,
		'panel' => 	'flourish_lite_panel_section',
	));

	$wp_customize->add_setting('flourish_lite_hdrfb_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control('flourish_lite_hdrfb_link',array(
		'label' => __('Add facebook link here','flourish-lite'),
		'section' => 'flourish_lite_footer_social_sections',
		'setting' => 'flourish_lite_hdrfb_link'
	));

	$wp_customize->add_setting('flourish_lite_hdrtwitt_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control('flourish_lite_hdrtwitt_link',array(
		'label' => __('Add twitter link here','flourish-lite'),
		'section' => 'flourish_lite_footer_social_sections',
		'setting' => 'flourish_lite_hdrtwitt_link'
	));

	$wp_customize->add_setting('flourish_lite_hdrgplus_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control('flourish_lite_hdrgplus_link',array(
		'label' => __('Add google plus link here','flourish-lite'),
		'section' => 'flourish_lite_footer_social_sections',
		'setting' => 'flourish_lite_hdrgplus_link'
	));

	$wp_customize->add_setting('flourish_lite_hdrlinked_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));

	$wp_customize->add_control('flourish_lite_hdrlinked_link',array(
		'label' => __('Add linkedin link here','flourish-lite'),
		'section' => 'flourish_lite_footer_social_sections',
		'setting' => 'flourish_lite_hdrlinked_link'
	));

	$wp_customize->add_setting('flourish_lite_show_footer_social_sections',array(
		'default' => false,
		'sanitize_callback' => 'flourish_lite_child_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'flourish_lite_show_footer_social_sections', array(
	   'settings' => 'flourish_lite_show_footer_social_sections',
	   'section'   => 'flourish_lite_footer_social_sections',
	   'label'     => __('Check To show This Section','flourish-lite'),
	   'type'      => 'checkbox'
	 ));//Show Footer Social icons area

}
add_action( 'customize_register', 'flourish_lite_child_customize_register', 15);
