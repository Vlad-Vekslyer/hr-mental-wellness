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
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4378.970264066406!2d-123.13276504710896!3d49.26215966016453!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x548673c14816ef5b%3A0x8b923fd27772596e!2s1190%20W%2010th%20Ave%2C%20Vancouver%2C%20BC%20V6H%201J1!5e0!3m2!1sen!2sca!4v1593820736032!5m2!1sen!2sca" width="100%" height="250" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      <div class="contact-info">
        <p><?= get_theme_mod('address'); ?></p>
        <p>Vancouver, BC</p>
        <p>V6H 1J1</p>
      </div>
      <div class="contact-info">
        <p><?= get_theme_mod('phone'); ?></p>
      </div>
    </div>
  </aside>
</div><!-- .container -->
<?php get_footer(); ?>
