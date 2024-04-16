<?php
/**
 * Plugin Name: Elementor Navbar Widget
 * Description: A custom Elementor widget to allow beginners to use complex layouts on Elementor like the header container.
 * Version: 1.0
 * Author: Emmanuel Chekumbe
 * Requires at least: 5.9
 * Requires PHP: 7.4
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: elemcon
 * 
 * Requires Plugins: elementor
 * Elementor tested up to: 3.20.3
 * Elementor Pro tested up to: 3.20.2
 */

 if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Register Navbar widge
 */
function register_navbar_widget( $widgets_manager ) {

    require_once( __DIR__ . '/widgets/class-navbar-widget.php' );

    $widgets_manager->register( new \Navbar_Widget() );
    
}

add_action( 'elementor/widgets/register', 'register_navbar_widget' );

/**
 * Enqueue widget styles
 */
function enqueue_widget_styles() {
    wp_enqueue_style( 'navbar-style', plugins_url( 'assets/css/navbar.css', __FILE__ ), array( 'elementor-frontend' ), '1.0.0', 'all' );
}
add_action( 'wp_enqueue_scripts', 'enqueue_widget_styles', 20 );