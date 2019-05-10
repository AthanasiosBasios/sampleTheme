<?php

/**
* Theme customizations
*
* @package    ouc19sample
* @author     Athanasios Basios
* @link       http://ioanninachessclub.com/
* @copyright  Copyright (c) 2019, Ioannina Chess Club
* @license    GPL-3.0+ 
*/

/**Dills, C. (2015, November 23). WordPress and Genesis: Building Child Themes from Scratch [Video file]. Retrieved from https://www.linkedin.com/learning/wordpress-and-genesis-building-child-themes-from-scratch*/

//Load child theme text domain
load_child_theme_textdomain ( 'ouc19sample' );

/**
*Hooking up the parent and child theme with priority 15;

* According to the WordPress Codex, A priority is an optional integer argument used to specify the order in which the * functions associated with a particular action are executed (default: 10). Lower numbers correspond with earlier 
* execution, and functions with the same priority are executed in the order added to the action. Here we set it to 
* 15, so it will be executed later on. 
*/
add_action ('genesis_setup', 'ouc19sample_setup', 15 );
/**
* Theme setup.
*
* Attach all of the site wide-functions to the correct hooks and filters. All the 
* functions themselves are defined below this setup function.
* @since 1.0.0
*/
function ouc19sample_setup () {
//Define theme constants.
	define( 'CHILD_THEME_NAME', 'ouc19sample');
	define( 'CHILD_THEME_URL', 'https://github.com/AthanasiosBasios/sampleTheme.git' );
	define( 'CHILD_THEME_VERSION', '1.0.0');

	//Add HTML5 markup structure
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	
	//Add viewport meta tag for mobile browsers
	add_theme_support( 'genesis-responsive-viewport' );
	
	//Add theme support for accessibility
	add_theme_support(
			'genesis-accessibility',
			array(
				'404-page',
				'drop-down-menu',
				'headings',
				'rems',
				'search-form',
				'skip-links',
			)
		);

	//Add theme support for footer widgets
	add_theme_support('genesis-footer-widgets', 3 );

	//Unregister layouts that use secondary sidebar
	genesis_unregister_layout( 'content-sidebar-sidebar' );
	genesis_unregister_layout( 'sidebar-content-sidebar' );
	genesis_unregister_layout( 'sidebar-sidebar-content' );

	//Unregister secondary sidebar
	unregister_sidebar( 'sidebar-alt' );

	//Add theme widget areas
	include_once(get_stylesheet_directory() .'/includes/widget-areas.php');

	
}

//Add Google Font stylesheet. 

add_action( 'wp_enqueue_scripts', 'ouc19sample_enqueue_styles' );

function ouc19sample_enqueue_styles () {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Roboto:400,400italic,700,700italic|Lobster' );

}

/** Add localy a stylesheet. 

* add_action( 'wp_enqueue_scripts', 'ouc19sample_enqueue_stylesheet' );

* function ouc19sample_enqueue_stylesheet () {

	* wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css',false,'1.1','all');

* }

*/

// Customizing footer credits

add_filter( 'genesis_footer_creds_text', 'my_credits' ); 

function my_credits() {
	return 'Ioannina Chess Club [footer_copyright] All rights reserved';
}