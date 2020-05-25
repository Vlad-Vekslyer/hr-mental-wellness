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
        $tag_ids = array();
        foreach($tags as $tag)
          array_push($tag_ids, $tag->term_id);
        $args = array(
          'post_type' => 'page',
          'tag__in' => $tag_ids,
          'post__not_in' => array($post->ID),
          'posts_per_page'=> 3
        );
        $query = new WP_Query($args);
        if($query->have_posts()){
          echo "<h2>Related Pages</h2>";
          echo "<div class='pages'>";
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
        }
        wp_reset_query();
      }
    ?>
  </div><!-- bottom-bar -->
</div><!-- .container -->
<?php get_footer(); ?>
