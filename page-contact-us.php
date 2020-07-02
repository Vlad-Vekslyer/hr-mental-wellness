<?php
get_header(); ?>
<div class="container two-column">
  <div class="content-holder two-column">
  </div><!-- .content_holder -->
  <aside class="two-column">
    <div id="contact-sidebar">
      <div class="contact-info">
        <h4>Phone Number:</h4>
        <p><?= get_theme_mod('address'); ?></p>
      </div>
      <div class="contact-info">
        <h4>Address:</h4>
        <p><?= get_theme_mod('phone'); ?></p>
      </div>
    </div>
  </aside>
</div><!-- .container -->
<?php get_footer(); ?>
