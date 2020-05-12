<?php

// Inherit Parent Theme
function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

// Filter hook that return the hero section description depending on the path
function hero_desc($uri) {
  $descriptions = array(
    '/' => array (
      'top' => 'HR Mental Wellness',
      'bottom' => 'Addressing body, mind and spirit to create a happier and more fulfilling life'
    )
  );
  if(in_array($uri, array_keys($descriptions)))
    return $descriptions[$uri];
  else
    return 'HR Mental Wellness Centre';
}
add_filter('get_hero_desc', 'hero_desc');

// Import and register custom customization options
require get_stylesheet_directory() . '/inc/customizer.php';

// Import and register custom widgets
require get_stylesheet_directory() . '/inc/widgets.php';

function flourish_lite_child_widgets_init() {
  register_sidebar(array(
    'name' => 'Top Wrap',
    'id' => 'top-wrap',
    'before_widget' => '<div class="modal-link">',
    'after_widget' => '</div>'
  ));
}
add_action( 'widgets_init', 'flourish_lite_child_widgets_init' );

?>
