<?php
/**
 * The Template Name: Full Width
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Flourish Lite
 */

get_header(); ?>
<div class="container">
  <div id="content_holder" class="full-width">
    <?php while( have_posts() ) : the_post(); ?>
    <div class="entry-content">
  	  <?php the_content(); ?>
      <?php
        wp_link_pages( array(
        'before' => '<div class="page-links">' . __( 'Pages:', 'flourish-lite' ),
        'after'  => '</div>',
        ) );
      ?>
     <?php
        //If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
            comments_template();
     ?>
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
