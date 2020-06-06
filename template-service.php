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
  <div id="content_holder" class="full-width">
    <?php while( have_posts() ) : the_post(); ?>
      <div class="entry-content">
    	  <?php the_content(); ?>
        <h4>Interested?</h4>
        <p>Call <?= get_theme_mod('phone'); ?> or <a href="#">Subscribe</a> via our registration form.</p>
      </div><!-- entry-content -->
    <?php endwhile; ?>
  </div><!-- .content_holder -->
</div>

<?php get_footer(); ?>
