<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="page" class="hfeed site">
		<header id="masthead" class="site-header" role="banner">
			<a class="home-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</a>

			<div id="navbar" class="navbar">
				<nav id="site-navigation" class="navigation main-navigation" role="navigation">
					<button class="menu-toggle"><?php _e( 'Menu', 'twentythirteen' ); ?></button>
					<a class="screen-reader-text skip-link" href="#content" title="<?php esc_attr_e( 'Skip to content', 'twentythirteen' ); ?>"><?php _e( 'Skip to content', 'twentythirteen' ); ?></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
					<?php get_search_form(); ?>
				</nav><!-- #site-navigation -->
<img class="alignnone size-medium wp-image-85" src="http://localhost/wordpress/wp-content/uploads/2015/02/WP-shadow-300x10.png" alt="WP-shadow" width="100%" height="10" />
			</div><!-- #navbar -->
		</header><!-- #masthead -->

		<div id="main" class="site-main">

<h3 style="left: 0; margin-top: 0; position: absolute; top: 0;"><span style="color: #ff0000;">Sylvie Bontemps</span></h3>
&nbsp;
<ul class="infos-infos">
	<li><i class="fa fa-envelope"></i><br/><a style="color: #ffffff;">bontempsylvie@gmail.com</a></li>
	<li><i class="fa fa-phone"></i><br/><a style="color: #ffffff;">+33 (0)6 70 77 18 19</a></li>
	<li><i class="fa fa-facebook"></i><br/><a style="color: #ffffff;">Facebook</a></li>
</ul>
<span style="color: #ffffff; left: 0; position: absolute; top: 28px;"> Artiste Peintre</span>

<?php
if(is_front_page())
{
    echo do_shortcode("[metaslider id=100]"); 
}
?>