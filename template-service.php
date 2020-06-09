<?php
/**
 * The Template Name: Service
 *
 * This is the template that is used for displaying services offered by HR
 * different template.
 *
 * @package HR
 */

get_header(); ?>

<div class="container">
  <div class="content_holder full-width">
    <?php the_post(); ?>
    <div id="content">
  	  <?php the_content(); ?>
    </div><!-- entry-content -->
    <h4>Interested?</h4>
    <p>Call <?= get_theme_mod('phone'); ?> or <a href="#">Subscribe</a> via our registration form.</p>
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
</div><!-- container -->
<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/service.js"></script>

<?php get_footer(); ?>
