<?php
get_header(); ?>
<div class="container two-column">
  <div class="content-holder two-column">
    <nav class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php
        if(function_exists('bcn_display')) { bcn_display(); }
      ?>
    </nav>
    <?php
      $query_args = array();
      // the blog page shows all posts and doesn't need a category_name arg for its query
      if($post->post_name !== 'blog') {
        // format the title of the category into a slug name for the query
        $cat_slug = preg_replace('/[_\s]/i' , '-', single_cat_title('', false));
        $cat_slug = strtolower($cat_slug);
        $query_args = array('category_name' => $cat_slug);
      }
      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
      $query_args = array_merge($query_args, array(
        'post_type' => 'post',
        'posts_per_page' => 5,
        'paged' => $paged
      ));
      $query = new WP_Query($query_args);
      // 'hack' that allowss post_nav_link to work by setting wp_query to our custom query
      global $wp_query;
      $tmp_query = $wp_query;
      $wp_query = null;
      $wp_query = $query;
      // generate post preview markup
      do_action('post_preview', $query);
    ?>
    <nav class="pagination">
      <span><?= previous_posts_link(); ?></span>
      <span><?= next_posts_link(); ?></span>
    </nav>
    <?php
      wp_reset_query();
    ?>
  </div><!-- .content_holder -->
  <aside class="two-column">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Blog Sidebar") ) : ?>
    <?php endif;?>
  </aside>
</div><!-- .container -->
<?php get_footer(); ?>
