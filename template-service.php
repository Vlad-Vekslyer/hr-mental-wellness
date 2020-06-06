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
    <div class="drop-box hidden">
      <h4>Lorem ipsum <span></span></h4>
      <div class="body">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div>
    </div>
    <h4>Interested?</h4>
    <p>Call <?= get_theme_mod('phone'); ?> or <a href="#">Subscribe</a> via our registration form.</p>
  </div><!-- .content_holder -->
</div>
<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/service.js"></script>

<?php get_footer(); ?>
