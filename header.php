<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	}
?>

<div id="sitelayout" <?php if( get_theme_mod( 'flourish_lite_boxlayout' ) ) { echo 'class="boxlayout"'; } ?>>

<div class="site-header <?php echo esc_attr($inner_cls); ?> ">
  <div class="navigation_bar">
    <div class="container">
         <div class="toggle">
           <a class="toggleMenu" href="#"><?php esc_html_e('Menu','flourish-lite'); ?></a>
         </div><!-- toggle -->
         <div class="sitenav">
            <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
         </div><!--.sitenav -->
         <div class="clear"></div>
      </div><!-- .container -->
   </div><!--.navigation_bar -->
  <div class="clear"></div>

</div><!--.site-header -->

<div class="hero">
	<img width="100%" src=<?= apply_filters('get_page_img', $post->ID) ?>>
	<div class=<?= $post->ID !== 1 ? "reg-page" : "" ?>>
		<?php
			// Get the text that should go into the page's hero section
			$desc = apply_filters('get_hero_desc', $_SERVER['REQUEST_URI']);
			if(is_array($desc)){
				$top = $desc['top'];
				$bottom = $desc['bottom'];
				echo "<h1>$top</h1>";
				echo "<h3>$bottom</h3>";
			} else
				echo "<h1>$desc</h1>";
		?>
	</div>
</div>
