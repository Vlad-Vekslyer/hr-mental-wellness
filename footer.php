<footer>
  <div class="container">
    <div>
      <h4>Contact Us</h4>
      <p><?= get_theme_mod('address'); ?></p>
      <p><?= get_theme_mod('phone'); ?></p>
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
