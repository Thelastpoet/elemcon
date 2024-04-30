<?php
/**
 * Plugin Name: Elementor Navbar Jumbo Widget
 * Description: A custom Elementor Navbar widget.
 * Version: 1.0
 * Author: Emmanuel Chekumbe
 * Requires at least: 5.9
 * Requires PHP: 7.4
 * Text Domain: navbar
 * 
 * Requires Plugins: elementor
 * Elementor tested up to: 3.20.3
 * Elementor Pro tested up to: 3.20.2
 */

 if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Register Navbar widget
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


function enqueue_widget_scripts() {
    wp_enqueue_script('navbar-widget-script', plugins_url('assets/js/navbar-widget.js', __FILE__), ['elementor-editor'], '1.0.0', true);
    
}
add_action('elementor/editor/before_enqueue_scripts', 'enqueue_widget_scripts');