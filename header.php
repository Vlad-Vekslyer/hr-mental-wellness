<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Flourish Lite
 */
?><!DOCTYPE html>
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

<?php
if ( is_front_page() && !is_home() ) {
if($flourish_lite_show_home_slider_section != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('flourish_lite_frontslider_selectpagebx'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('flourish_lite_frontslider_selectpagebx'.$i,true));
	  }
	}
?>
<div class="slider_wrapper">
<?php if(!empty($slider_Arr)){ ?>
<div id="slider" class="nivoSlider">
<?php
$i=1;
$slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
?>
<?php if(!empty($image)){ ?>
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php } ?>
<?php $i++; endwhile; ?>
</div>

<?php
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>
    <div id="slidecaption<?php echo esc_attr( $j ); ?>" class="nivo-html-caption">
    	<h2><?php the_title(); ?></h2>
    	<?php the_excerpt(); ?>
		<?php
        $flourish_lite_frontslider_morebtntext = get_theme_mod('flourish_lite_frontslider_morebtntext');
        if( !empty($flourish_lite_frontslider_morebtntext) ){ ?>
            <a class="slide_morebtn" href="<?php the_permalink(); ?>"><?php echo esc_html($flourish_lite_frontslider_morebtntext); ?></a>
        <?php } ?>
    </div>
<?php $j++;
endwhile;
wp_reset_postdata(); ?>
<?php } ?>
<?php } } ?>

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
