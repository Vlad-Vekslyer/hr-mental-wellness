<?php
get_header(); ?>
<div class="container two-column">
  <div class="content-holder two-column">
    <?php
      the_post();
      the_content();
    ?>
  </div><!-- .content_holder -->
  <aside class="two-column">
    <div id="contact-sidebar">
      <div class="contact-info">
        <?= get_theme_mod('google_maps_embed'); ?>
        <p><?= get_theme_mod('street'); ?></p>
        <p>Vancouver, BC</p>
        <p><?= get_theme_mod('postal_code'); ?></p>
      </div>
      <div class="contact-info">
        <p><?= get_theme_mod('phone'); ?></p>
      </div>
    </div>
  </aside>
</div><!-- .container -->
<?php get_footer(); ?>
