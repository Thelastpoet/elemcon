<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class Navbar_Widget extends \Elementor\Widget_Base {
    public function get_name() {
        return 'navbar';
    }

    public function get_title() {
        return __( 'Navbar Widget', 'navbar' );
    }

    public function get_icon() {
        return 'eicon-header';
    }

    public function get_categories() {
        return [ 'general' ];
    }

    protected function _register_controls() {
        include_once( 'controls/content-controls.php' );
        include_once( 'controls/style-controls.php' );
        include_once( 'controls/advance-controls.php' );
    }

    /**
     * Render the widget
     */

     protected function render() {
        $settings = $this->get_settings_for_display();
        
        $logo_url = $settings['site_logo']['url'];
        $logo_alt = !empty( $settings['site_logo']['alt'] ) ? $settings['site_logo']['alt'] : '';
        
        $menu_items = $settings['menu_items'];
        $button_text = $settings['button_text'];
        $button_link = $settings['button_link']['url'];
        $button_icon = $settings['button_icon'];
        
        $navbar_direction = $settings['navbar_direction'];
        $menu_position = $settings['menu_position'];
        $pointer = $settings['pointer'];
        $mobile_dropdown = $settings['mobile_dropdown'];
        
        $logo_width = $settings['logo_width']['size'];
        
        // Render the navbar HTML markup
        ?>
        <div class="navbar-wrapper navbar-direction-<?php echo esc_attr( $navbar_direction ); ?>">
            <div class="navbar-container">
                <div class="navbar-logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( $logo_alt ); ?>" style="width: <?php echo esc_attr( $logo_width ); ?>px;">
                    </a>
                </div>
                <nav class="navbar-menu menu-position-<?php echo esc_attr( $menu_position ); ?>">
                    <ul class="menu-items pointer-<?php echo esc_attr( $pointer ); ?>">
                        <?php foreach ( $menu_items as $index => $item ) : ?>
                            <li class="menu-item">
                                <a href="<?php echo esc_url( $item['menu_link']['url'] ); ?>"><?php echo esc_html( $item['menu_title'] ); ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
                <div class="navbar-button">
                    <a href="<?php echo esc_url( $button_link ); ?>" class="button">
                        <?php if ( 'left' === $button_icon_position ) : ?>
                            <i class="<?php echo esc_attr( $button_icon['value'] ); ?>"></i>
                        <?php endif; ?>
                        <span><?php echo esc_html( $button_text ); ?></span>
                        <?php if ( 'right' === $button_icon_position ) : ?>
                            <i class="<?php echo esc_attr( $button_icon['value'] ); ?>"></i>
                        <?php endif; ?>
                    </a>
                </div>
            </div>
        </div>
        <?php
    }

    
}