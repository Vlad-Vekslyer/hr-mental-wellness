<?php
get_header(); ?>
<div class="container">
  <div class="content-holder two-column">
    <?php
      $args = array(
        'post_type' => 'post'
      );
      $query = new WP_Query($args);
      while($query->have_posts()) {
        $query->the_post();
        $categories = get_the_category();
        ?>

        <div class="post-preview">
          <h2><?= the_title(); ?></h2>
          <h5><?= the_date("M d, Y"); ?></h5>
          <p><?= substr(get_the_content(), 0, 300); ?>...</p>
          <div class="bottom">
            <a href=<?= the_permalink(); ?>>Read More</a>
            <ul class="categories">
              <?php
                foreach($categories as $index => $category) {
                  $name = $category->to_array()['name'];
                  $suffix = $index !== sizeof($categories) - 1 ? "&nbsp•&nbsp" : '';
                  echo "<li><h5>$name$suffix</h5></li>";
                }
              ?>
            </ul>
          </div>
        </div>

        <?php
      }
      wp_reset_query();
    ?>
  </div><!-- .content_holder -->
</div><!-- .container -->
<?php get_footer(); ?>
