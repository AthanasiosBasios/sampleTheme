<?php

/**
* Front page template
*
* @package 		ouc19sample
* @author 		Athanasios Basios
* @link 		http://ioanninachessclub.com/
* @copyright 	Copyright (c) 2019, Ioannina Chess Club
* @license 		GPL-3.0+ 
*/

/* Dills, C. (2015, November 23). WordPress and Genesis: Building Child Themes from Scratch [Video file]. Retrieved from https://www.linkedin.com/learning/wordpress-and-genesis-building-child-themes-from-scratch*/

add_action( 'genesis_meta', 'ouc19sample_home_page_setup' );
/**
 * Set up the homepage layout by conditionally loading sections when widgets
 * are active.
 *
 * @since 1.0.0
 */

function ouc19sample_home_page_setup() {

	$home_sidebars = array(
		'home_welcome' 		=> is_active_sidebar('home-welcome'),
		'call_to_action' 	=> is_active_sidebar('call-to-action'),
	);

	//Return if no sidebars are active.
	if ( ! in_array( true, $home_sidebars ) ) {
		return;
	}

	//Add home welcome area if 'Welcome Message' widget area is active.
	if ( $home_sidebars['home_welcome'] ) {
		add_action( 'genesis_after_header', 'ouc19sample_add_home_welcome');
	}

	//Add call to action area if 'call to action' widget area is active.
 	if ( $home_sidebars['call_to_action'] ) {
		add_action( 'genesis_before_sidebar_widget_area', 'ouc19sample_add_call_to_action' );
	}

// Force full-width-content layout setting.
	// add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

	// Remove posts.
	// remove_action( 'genesis_loop', 'genesis_do_loop' );

}

/**
* Display content for the 'Welcome Message' section.
*
* @since 1.0.0
*/
function ouc19sample_add_home_welcome() {

	genesis_widget_area( 'home-welcome',
		array(
			'before' 	=> '<div class="home-welcome"><div class="wrap">', 
			'after' 	=> '</div></div>',
		)
	);
}

/**
* Display content for the 'Events Notification' section.
*
* @since 1.0.0
*/
function ouc19sample_add_call_to_action() {

	genesis_widget_area( 'call-to-action',
		array(
			'before' 	=> '<div class= "call-to-action"><div class="wrap">', 
			'after' 	=> '</div></div>',

		)
	);
}


genesis();