<?php
get_header(); ?>
<div class="container">
  <div class="content_holder two-column">
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
          <ul class="categories">
            <?php
              foreach($categories as $category) {
                $name = $category->to_array()['name'];
                echo "<li>$name</li>";
              }
            ?>
          </ul>
          <hr>
          <p><?= substr(get_the_content(), 0, 300); ?>...</p>
          <a href=<?= the_permalink(); ?>>Read More</a>
        </div>

        <?php
      }
      wp_reset_query();
    ?>
  </div><!-- .content_holder -->
</div><!-- .container -->
<?php get_footer(); ?>
