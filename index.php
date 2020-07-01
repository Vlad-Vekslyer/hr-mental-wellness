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
      $args = array();
      // some of the arguments to the query are determined by whether we're at the blog index of a category page
      if($post->post_name !== 'blog') {
        // format the title of the category into a slug name for the query
        $cat_slug = preg_replace('/[_\s]/i' , '-', single_cat_title('', false));
        $cat_slug = strtolower($cat_slug);
        $args = array('category_name' => $cat_slug);
      }
      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
      $args = array_merge($args, array(
        'post_type' => 'post',
        'posts_per_page' => 5,
        'paged' => $paged
      ));
      $query = new WP_Query($args);
      // 'hack' that allowss post_nav_link to work
      global $wp_query;
      $tmp_query = $wp_query;
      $wp_query = null;
      // Re-populate the global with our custom query
      $wp_query = $query;
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
