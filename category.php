<?php
get_header(); ?>
<div class="container two-column">
  <div class="content-holder two-column">
    <?php
      $cat_slug = preg_replace('/[_\s]/i' , '-', single_cat_title('', false));
      $cat_slug = strtolower($cat_slug);
      $args = array(
        'post_type' => 'post',
        'category_name' => $cat_slug
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
  <aside class="two-column">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar("Blog Sidebar") ) : ?>
    <?php endif;?>
  </aside>
</div><!-- .container -->
<?php get_footer(); ?>
