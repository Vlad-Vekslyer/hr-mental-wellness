<?php
/**
 * The Template Name: Full Width
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package HR
 */

get_header(); ?>
<div class="container">
  <div id="content_holder" class="full-width">
    <?php while( have_posts() ) : the_post(); ?>
      <div class="entry-content">
    	  <?php the_content(); ?>
      </div><!-- entry-content -->
    <?php endwhile; ?>
  </div><!-- .content_holder -->
  <div id="bottom-bar">
    <?php
      $tags = wp_get_post_tags($post->ID);
      if($tags) {
        $query = apply_filters('tag_query', $tags, $post->ID);
        if($query->have_posts())
          do_action('related_pages', $query);
      }
    ?>
  </div><!-- bottom-bar -->
</div><!-- .container -->
<?php get_footer(); ?>
