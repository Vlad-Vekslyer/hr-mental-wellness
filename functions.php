<?php

function enqueue_styles() {
   wp_enqueue_style('style', '/wp-content/themes/hr/style.css');
   wp_enqueue_style('font', 'https://fonts.googleapis.com/css?family=Assistant%3A300%2C400%2C600%2C800&#038;ver=5.4.1');
}
add_action( 'wp_enqueue_scripts', 'enqueue_styles' );

// @uri URI path to a page
// @return array or a string containing text to be displayed in the hero section
function hero_desc(string $uri) {
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

// @id is the id of a page
// @return the path to the appropriate image for the page
function page_img(int $id) {
  $img_link = wp_get_attachment_url( get_post_thumbnail_id($id));
  if($img_link)
    return $img_link;
  else
    // returns default image if no image was found specific for the page
    return get_theme_mod('hr_hero_image');
}
add_filter('get_page_img', 'page_img');

function hr_widgets_init() {
  register_sidebar(array(
    'name' => 'Top Wrap',
    'id' => 'top-wrap',
    'before_widget' => '<div class="modal-link">',
    'after_widget' => '</div>'
  ));

  register_sidebar(array(
    'name' => ' Blog Sidebar',
    'id' => 'blod-sidebar'
  ));
}
add_action( 'widgets_init', 'hr_widgets_init' );

// queries pages using tags
// @tags is an array of tag data
// @postID is the ID of the current page
// @pageNum is the max number of pages the query should return
// @return a WP_Query object containing the queried pages
function query_by_tags(array $tags, int $postID, int $pageNum = 3) {
  $tag_ids = array();
  foreach($tags as $tag)
    array_push($tag_ids, $tag->term_id);
  $args = array(
    'post_type' => 'page',
    'tag__in' => $tag_ids,
    'post__not_in' => array($postID),
    'posts_per_page'=> $pageNum
  );
  $query = new WP_Query($args);
  return $query;
}
add_filter('tag_query', 'query_by_tags', 10, 3);

// prints the markup for the related pages section
// @query will contain the data of the pages
function print_related_pages(WP_Query $query) {
  echo "<h2>Related Pages</h2>";
  echo "<div class='pages'>";
  // print markup for each individual related page inside the query
  while($query->have_posts()) {
    $query->the_post();
    $content = get_the_content();
    $content_paragraphs = preg_replace('/<!-- wp:heading -->\s*<h\d>.*<\/h\d>\s*<!-- \/wp:heading -->/i', '', $content);
    ?>

    <div class="page">
      <a href=<?= the_permalink(); ?>>
        <h3><?= the_title(); ?></h3>
        <hr>
        <p><?= substr($content_paragraphs, 0, 150); ?>...</p>
      </a>
    </div>

    <?php
  }
  echo "</div>";
  wp_reset_query();
}
add_action('related_pages', 'print_related_pages');

// Import and register custom customization options
require get_stylesheet_directory() . '/inc/customizer.php';
// Import and register custom widgets
require get_stylesheet_directory() . '/inc/widgets.php';

add_theme_support( 'post-thumbnails' );
?>
