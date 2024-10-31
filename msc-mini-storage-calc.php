<?php

// ******************************************************************
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
// *****************************************************************

    /**
    Plugin Name: Mini Storage Calculator
    Plugin URI: http://www.newdestinymedia.com
    Description: This plugin will provide a calculated estimate of storage unit size for mini-storage or self-storage rental centers. Shortcode: [msc-mini-calc]
    Author: New Destiny Media, LLC
    Version: 1.04
    Author URI: http://www.newdestinymedia.com
    **/



/* Enqueue CSS file */
        function msc_prefix_add_stylesheet() {
        wp_enqueue_style( 'prefix-style', plugins_url('msc-style.css', __FILE__) );
    }
	
	add_action( 'wp_enqueue_scripts', 'msc_prefix_add_stylesheet' );



/* Register and enqueue the script*/
function msc_load_mini_calc(){
    wp_register_script( 'msc-mini-storage-calculator', plugins_url('msc-mini-storage-calculator.js', __FILE__ ) );
    wp_enqueue_script( 'msc-mini-storage-calculator' );
}

add_action('init', 'msc_load_mini_calc');



/* Add function to load the form and add shortcode */
function msc_show_calc_form(){
    return $options = wp_remote_retrieve_body( wp_remote_get( plugins_url() . '/responsive-mini-storage-calculator/mini-storage-calc_form.html' ) );
}
add_shortcode('msc-mini-calc', 'msc_show_calc_form');






?>