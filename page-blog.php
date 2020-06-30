<?php
get_header(); ?>
<div class="container two-column">
  <div class="content-holder two-column">
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
