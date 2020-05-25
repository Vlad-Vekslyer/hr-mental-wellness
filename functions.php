<?php

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style',  '/wp-content/themes/flourish-lite-child/style.css' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

// Filter hook that return the hero section description depending on the path
function hero_desc($uri) {
  if($uri === '/') {
    return array(
      'top' => get_bloginfo('name'),
      'bottom' => get_bloginfo('description')
    );
  }
  else
    return the_title('', '', false);
}
add_filter('get_hero_desc', 'hero_desc');

// Filter hook that returns the hero section image depending on the post ID
function page_img($id) {
  $img_link = wp_get_attachment_url( get_post_thumbnail_id($id));
  if($img_link)
    return $img_link;
  else
    return get_theme_mod('flourish_lite_child_hero_image');
}
add_filter('get_page_img', 'page_img');

function flourish_lite_child_widgets_init() {
  register_sidebar(array(
    'name' => 'Top Wrap',
    'id' => 'top-wrap',
    'before_widget' => '<div class="modal-link">',
    'after_widget' => '</div>'
  ));
}
add_action( 'widgets_init', 'flourish_lite_child_widgets_init' );

// remove_all_actions('wp_head');

// Import and register custom customization options
require get_stylesheet_directory() . '/inc/customizer.php';
// Import and register custom widgets
require get_stylesheet_directory() . '/inc/widgets.php';

?>
