<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package exam_theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
<div id="page" class="site">

	<header id="masthead" class="site-header" role="banner">
		<div class="header-zone clearfix">
				<div class="site-branding col-md-2">
					<?php
					if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'logo-upload' ) ?>"
						                                                                                           alt="logo"></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'logo-upload' ) ?>"
						                                                                                          alt="logo"></a></p>
						<?php
					endif; ?>
				</div><!-- .site-branding -->
				<div class="site_telephone col-md-2">
					<?php if (!empty(get_theme_mod('phone_number'))){
						?>
						<span><?php  echo get_theme_mod('phone_number')?></span>
						<?php
					}
					?>
				</div>
				<nav id="site-navigation" class="main-navigation col-md-8" role="navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'exam_theme' ); ?></button>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</nav><!-- #site-navigation -->
		</div>
		<div class="container-fluid">
		<?php get_template_part( 'template-parts/slider', get_post_format() );?>
			</div>
	</header><!-- #masthead -->

	<div id="content" class="site-content">
