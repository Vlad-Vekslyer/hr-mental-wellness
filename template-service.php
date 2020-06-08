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
</div>
<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/service.js"></script>

<?php get_footer(); ?>
