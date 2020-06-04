<footer>
  <div class="container">
    <div class="top">
      <div class="explore">
        <h4>Explore</h4>
        <?php wp_nav_menu(array(
          'menu_class' => 'footer-menu',
          'container' => ''
        )); ?>
      </div>
      <div class="contact">
        <h4>Contact Us</h4>
        <p><img src="<?= get_stylesheet_directory_uri() ?>/assets/icons/map-marker-alt-solid.svg"><?= get_theme_mod('address'); ?></p>
        <p><img src="<?= get_stylesheet_directory_uri() ?>/assets/icons/phone-solid.svg"><?= get_theme_mod('phone'); ?></p>
        <p>
          <img src="<?= get_stylesheet_directory_uri() ?>/assets/icons/envelope-regular.svg">
          <a href="#">Email</a>
        </p>
      </div>
      <div class="newsletter">
        <h4>Stay Connected</h4>
        <p>Receive updates about the latest blog posts, webinars and events from HR Mental Wellness</p>
        <input type="text" name="email" placeholder="Email Address">
        <button>Subscribe</button>
      </div>
    </div>
    <div class="copyrigh-wrapper">
  	    <?php bloginfo('name'); ?> © 2020
    </div><!--end .copyrigh-wrapper-->
  </div><!--end .container-->
</footer><!--end #site-footer-->
</div><!--#end sitelayout-->
<?php wp_footer(); ?>
</body>
</html>
