<?php get_header(); ?>

<div class="container">
  <div class="content_holder">
   <div class="widget-wrapper">
     <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Top Wrap") ) : ?>
     <?php endif;?>
   </div>
    <div class="clear"></div>
  </div><!-- site-aligner -->
</div><!-- content -->

<section id="testimonials">
  <h1>Testimonials</h1>
  <div class="container">
    <div class="quote">
      <p>“I really appreciated the freedom we had to share our stories. It was very useful and helpful – I was inspired by the stories of strength and challenges – There were so many different situations, but we have a common thread. You always ensure everyone gets a full chance to tell their stories.”</p>
      <p>-Maurine K</p>
    </div>
    <div class="quote">
      <p>"I felt so wonderful to help and get help from other members of the group through sharing my experiences and what has helped me. Attending the group meeting made me committed to do that"</p>
      <p>-Rebecca J</p>
    </div>
    <div class="quote">
      <p>"From the first session, I knew that I will be able to heal from depression and anxiety. Along the way, I knew that my depression and anxiety will be gone."</p>
      <p>-Eric L</p>
    </div>
    <div class="quote">
      <p>"I appreciated the way you run the coaching session. It is so effective and always gives me much more than I expect."</p>
      <p>-Chris Y</p>
    </div>
  </div>
</section>

<section class="two-modals">
  <div id="book">
    <h1>The Book</h1>
    <div>
        <div id="book-desc">
          <p>
            This book presents a program to help you build a foundation for your healing.
            With a focus on how to achieve optimal mental wellness—to heal from depression, anxiety and addictions.
            Learn how to discover your talents and gifts, and put yourself on the path to self-actualization to become the very best you.
          </p>
          <div class="quote">
            <p>“I highly recommend this book for anyone seeking life purpose, meaning, and self-transcendence”</p>
            <p>-Samir Abdel, MD</p>
          </div>
        </div>
        <div id="book-desc-bottom">
          <img src=<?php echo get_theme_file_uri( 'assets/images/book.png' ) ?>>
          <div class="buttons">
            <button class="btn"><a href=<?= get_theme_mod('book_link'); ?>>Read More</a></button>
            <button class="btn"><a href="#">Order Now</a></button>
          </div>
        </div>
    </div>
  </div>
  <span></span>
  <div id="bio">
    <h1>Dr.Rayes</h1>
    <img src=<?php echo get_theme_file_uri( 'assets/images/rayes-rounded.png' ) ?>>
    <p>
      After suffering from depression and finding his own way to healing,
      Dr. El-Rayes was inspired to establish the H.R. Mental Wellness Center in order to share his personal and professional experience,
      as well as his training as a coach and group facilitator.
    </p>
    <button class="btn"><a href=<?= get_theme_mod('rayes_link'); ?>>Read More</a></button>
  </div>
</section>

<?php get_footer(); ?>
