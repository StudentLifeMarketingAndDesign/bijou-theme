<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'bijou' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="stylesheet" type="text/css" media="screen and (max-width: 1000px), screen and (max-device-width: 1000px)" href="/bijou/wp-content/themes/bijou/1000.css" />
<link rel="stylesheet" type="text/css" media="screen and (max-width: 950px), screen and (max-device-width: 950px)" href="/bijou/wp-content/themes/bijou/950.css" />
<link rel="stylesheet" type="text/css" media="screen and (max-width: 760px), screen and (max-device-width: 760px)" href="/bijou/wp-content/themes/bijou/760.css" />
<link rel="stylesheet" type="text/css" media="screen and (max-width: 640px), screen and (max-device-width: 640px)" href="/bijou/wp-content/themes/bijou/640.css" />
<link rel="stylesheet" type="text/css" media="screen and (max-width: 480px), screen and (max-device-width: 480px)" href="/bijou/wp-content/themes/bijou/480.css" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
</head>


<div id="wrapper">
	<div id="topnav">
    <a class="uilogo" href="http://www.uiowa.edu">The University of Iowa</a>
         <a class="bijou-logo" href="/">Bijou Cinema</a>
	<h2 class="accessibility">Navigation</h2>
    <?php wp_nav_menu( array( 'container_class' => 'menu', 'theme_location' => 'primary' ) ); ?>
              
       <!-- End nav -->

	</div>
    	
<?
/*
	if ( is_page('about') ) {
		echo '<div id="headerabout"><h1>Bijou Cinema About</h1></div>';
	}
	if ( is_page('location') ) {
		echo '<div id="headerlocation"><h1>Bijou Cinema Location</h1></div>';
	}
	if ( is_page('archive') ) {
		echo '<div id="headerarchive"><h1>Bijou Cinema Archive</h1></div>';
	}
*/
	if ( is_category('coming-soon') ) {
		
		echo '<div id="headercomingsoon"><h1>Bijou Cinema Coming Soon</h1></div>';
	}
	if ( is_home() ) {
		
		echo '<div id="header"><h1>Bijou Cinema Now Showing</h1></div>';
	}
?>	