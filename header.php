<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
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

<header class="<?php echo esc_attr($inner_cls); ?> ">
  <div class="navigation_bar">
		 <img width="10%" height="100" src=<?= get_stylesheet_directory_uri() . "/assets/images/hr-logo.png" ?>>
		 <div class="sitenav">
		    <?php wp_nav_menu(); ?>
		 </div><!--.sitenav -->
		 <button class="btn"><a href="#">Get Help</a></button>
		 <button class="hamburger">
			 <hr>
			 <hr>
			 <hr>
		 </button>
		 <div class="mobile-sitenav">
			 <button>X</button>
			 <?php wp_nav_menu(array(
				 'menu_class' => 'mobile-menu',
				 'container' => ''
			 )); ?>
		 </div>
   </div><!--.navigation_bar -->
</header><!--.site-header -->

<div class="hero">
	<img width="100%" src=<?= apply_filters('get_page_img', $post->ID) ?>>
	<div class="<?= $post->ID !== 1 ? "single" : '' ?> container">
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
</div><!-- hero -->
