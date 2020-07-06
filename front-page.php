<?php get_header(); ?>

<div class="container">
  <div class="widget-wrapper">
   <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Top Wrap") ) : ?>
   <?php endif;?>
  </div>
</div><!-- content -->

<section id="testimonials">
  <h1>Testimonials</h1>
  <div class="container">
    <div class="slider">
      <?php
        $query = new WP_Query(array(
          'pagename' => 'testimonials'
        ));
        $query->the_post();
        the_content();
      ?>
    </div>
  </div>
  <div class="interface">
    <button id="prev">Prev</button>
    <button id="next">Next</button>
  </div>
</section>

<section class="two-modals">
  <div id="book">
    <h1>The Book</h1>
    <div>
        <div id="book-desc">
          <p><?= get_theme_mod('book_description'); ?></p>
          <div class="quote">
            <p>“I highly recommend this book for anyone seeking life purpose, meaning, and self-transcendence”</p>
            <p>-Samir Abdel, MD</p>
          </div>
        </div>
        <div id="book-desc-bottom">
          <img src=<?php echo get_theme_file_uri( 'assets/images/book.png' ) ?>>
          <div class="buttons">
            <button class="btn"><a href=<?= get_theme_mod('book_link'); ?>>Read More</a></button>
            <button class="btn"><a href="#">Order</a></button>
          </div>
        </div>
    </div>
  </div>
  <span></span>
  <div id="bio">
    <h1>Dr.Rayes</h1>
    <img src=<?php echo get_theme_file_uri( 'assets/images/rayes-rounded.png' ) ?>>
    <p><?= get_theme_mod('rayes_description'); ?></p>
    <button class="btn"><a href=<?= get_theme_mod('rayes_link'); ?>>Read More</a></button>
  </div>
</section>

<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/front.js"></script>

<?php get_footer(); ?>
