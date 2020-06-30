<?php
get_header(); ?>
<div class="container two-column">
  <div class="content-holder two-column">
    <div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
      <?php
        if(function_exists('bcn_display')) { bcn_display(); }
      ?>
    </div>
    <?php
      $args = array(
        'post_type' => 'post'
      );
      $query = new WP_Query($args);
      do_action('post_preview', $query);
    ?>
  </div><!-- .content_holder -->
  <aside class="two-column">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Blog Sidebar") ) : ?>
    <?php endif;?>
  </aside>
</div><!-- .container -->
<?php get_footer(); ?>
