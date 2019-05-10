<?php
/**
* Register widget areas
*
* @package ouc19sample
* @author Athanasios Basios
* @link http://ioanninachessclub.com/
* @copyright Copyright (c) 2019, Ioannina Chess Club
* @license GPL-3.0+ 
*/

/*
Dills, C. (2015, November 23). WordPress and Genesis: Building Child Themes from Scratch [Video file]. Retrieved from https://www.linkedin.com/learning/wordpress-and-genesis-building-child-themes-from-scratch*/

//* Register front page widget area
genesis_register_sidebar( array(
'id'            => 'home-welcome',
'name'          => __( 'Home_Welcome', 'ouc19sample' ),
'description'   => __( 'This is a home widget area that will show on the front page', 'ouc19sample' ),
) );

//* Register call-to-action post widget area
genesis_register_sidebar( array(
'id'            => 'call-to-action',
'name'          => __( 'call_to_action', 'ouc19sample' ),
'description'   => __( 'This is a call_to_action widget area that will show on the front page', 'ouc19sample' ),
) );