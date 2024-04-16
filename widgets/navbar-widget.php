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
        
        $navbar_direction = $settings['navbar_direction'];
        $menu_position = $settings['menu_position'];
        $menu_items = $settings['menu_items'];
        $logo_type = $settings['logo_type'];
        $site_logo = $settings['site_logo']['url'];
        $site_title = get_bloginfo('name');
        $button_text = $settings['button_text'];
        $button_link = $settings['button_link']['url'];
        $button_icon = $settings['button_icon'];

        $this->add_render_attribute( 'navbar', 'class', 'navbar' );
        $this->add_render_attribute( 'navbar', 'class', 'navbar-' . $navbar_direction );
        $this->add_render_attribute( 'navbar-menu', 'class', 'navbar-menu' );
        $this->add_render_attribute( 'navbar-menu', 'class', 'navbar-menu-' . $menu_position );

        // Advanced settings
        $full_width = $settings['full_width'];
        $content_width = $settings['content_width'];
        $top_padding = $settings['top_padding'];
        $bottom_padding = $settings['bottom_padding'];
        $element_spacing = $settings['element_spacing'];
        $apply_effects_on = $settings['apply_effects_on'];
        $scroll_distance = $settings['scroll_distance'];
        $sticky = $settings['sticky'];
        $adjust_on_scroll = $settings['adjust_on_scroll'];
        $hide_on_scroll = $settings['hide_on_scroll'];
        $logo_on_scroll = $settings['logo_on_scroll'];
        $hide_on_desktop = $settings['hide_on_desktop'];
        $hide_on_tablet = $settings['hide_on_tablet'];
        $hide_on_mobile = $settings['hide_on_mobile'];
        $css_id = $settings['css_id'];
        $css_classes = $settings['css_classes'];
        $custom_css = $settings['custom_css'];
        $custom_attributes = $settings['custom_attributes'];

        if ( $full_width === 'yes' ) {
            $this->add_render_attribute( 'navbar', 'class', 'navbar-full-width' );
        }
    
        if ( $sticky === 'yes' ) {
            $this->add_render_attribute( 'navbar', 'class', 'navbar-sticky' );
        }
    
        if ( $hide_on_desktop === 'yes' ) {
            $this->add_render_attribute( 'navbar', 'class', 'elementor-hidden-desktop' );
        }
    
        if ( $hide_on_tablet === 'yes' ) {
            $this->add_render_attribute( 'navbar', 'class', 'elementor-hidden-tablet' );
        }
    
        if ( $hide_on_mobile === 'yes' ) {
            $this->add_render_attribute( 'navbar', 'class', 'elementor-hidden-mobile' );
        }
    
        if ( ! empty( $css_id ) ) {
            $this->add_render_attribute( 'navbar', 'id', $css_id );
        }
    
        if ( ! empty( $css_classes ) ) {
            $this->add_render_attribute( 'navbar', 'class', $css_classes );
        }
    
        if ( ! empty( $custom_attributes ) ) {
            $attributes = explode( "\n", $custom_attributes );
            foreach ( $attributes as $attribute ) {
                if ( ! empty( $attribute ) ) {
                    $attr = explode( '|', $attribute, 2 );
                    $attr_key = $attr[0];
                    $attr_value = isset( $attr[1] ) ? $attr[1] : '';
                    $this->add_render_attribute( 'navbar', $attr_key, $attr_value );
                }
            }
        }

        $this->add_render_attribute(
            'navbar',
            [
                'data-settings' => json_encode([
                    'home_url' => esc_url($settings['home_url']),
                    'blog_name' => esc_attr($settings['blog_name']),
                ]),
            ]
        );
        
        ?>
    
        <div class="navbar" <?php echo $this->get_render_attribute_string('navbar'); ?>>
                <div class="navbar-container">
                    <div class="navbar-logo">
                        <?php if ( $logo_type === 'site_logo' && !empty( $site_logo ) ) : ?>
                            <a href="<?php echo esc_url( $settings['home_url'] ); ?>">
                                <img src="<?php echo esc_url( $site_logo ); ?>" alt="<?php echo esc_attr( $settings['blog_name'] ); ?>">
                            </a>
                        <?php elseif ( $logo_type === 'site_title' ) : ?>
                            <a href="<?php echo esc_url( $settings['home_url'] ); ?>"><?php echo esc_html( $site_title ); ?></a>
                        <?php endif; ?>
                    </div>
            
                    <nav <?php echo $this->get_render_attribute_string( 'navbar-menu' ); ?>>
                        <ul>
                            <?php foreach ( $menu_items as $index => $item ) :
                                $item_link = $item['menu_link']['url'];
                                $item_text = $item['menu_title'];
                                $active_class = ($item_link === $_SERVER['REQUEST_URI']) ? 'current-menu-item' : '';
                                ?>
                                <li class="<?php echo esc_attr( $active_class ); ?>">
                                    <a href="<?php echo esc_url( $item_link ); ?>"><?php echo esc_html( $item_text ); ?></a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </nav>
            
                    <?php if ( !empty( $button_text ) && !empty( $button_link ) ) : ?>
                        <div class="navbar-button">
                            <a href="<?php echo esc_url( $button_link ); ?>">
                                <?php if ( $settings['button_icon_position'] === 'left' ) : ?>
                                    <i class="<?php echo esc_attr( $button_icon['value'] ); ?>"></i>
                                <?php endif; ?>
                                <?php echo esc_html( $button_text ); ?>
                                <?php if ( $settings['button_icon_position'] === 'right' ) : ?>
                                    <i class="<?php echo esc_attr( $button_icon['value'] ); ?>"></i>
                                <?php endif; ?>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php
    }

    protected function content_template() {
        ?>
        <#
        var menuItems = settings.menu_items;
        var logoType = settings.logo_type;
        var siteLogo = settings.site_logo.url;
        var navbarDirection = settings.navbar_direction;
        var menuPosition = settings.menu_position;
        var buttonText = settings.button_text;
        var buttonLink = settings.button_link.url;
        var buttonIcon = settings.button_icon;

        var fullWidth = settings.full_width;
        var contentWidth = settings.content_width;
        var topPadding = settings.top_padding;
        var bottomPadding = settings.bottom_padding;
        var elementSpacing = settings.element_spacing;
        var applyEffectsOn = settings.apply_effects_on;
        var scrollDistance = settings.scroll_distance;
        var sticky = settings.sticky;
        var adjustOnScroll = settings.adjust_on_scroll;
        var hideOnScroll = settings.hide_on_scroll;
        var logoOnScroll = settings.logo_on_scroll;
        var hideOnDesktop = settings.hide_on_desktop;
        var hideOnTablet = settings.hide_on_tablet;
        var hideOnMobile = settings.hide_on_mobile;
        var cssID = settings.css_id;
        var cssClasses = settings.css_classes;
        var customAttributes = settings.custom_attributes;

        var navbarClasses = 'navbar navbar-' + navbarDirection;

        if ( fullWidth === 'yes' ) {
            navbarClasses += ' navbar-full-width';
        }

        if ( sticky === 'yes' ) {
            navbarClasses += ' navbar-sticky';
        }

        if ( hideOnDesktop === 'yes' ) {
            navbarClasses += ' elementor-hidden-desktop';
        }

        if ( hideOnTablet === 'yes' ) {
            navbarClasses += ' elementor-hidden-tablet';
        }

        if ( hideOnMobile === 'yes' ) {
            navbarClasses += ' elementor-hidden-mobile';
        }

        if ( cssClasses ) {
            navbarClasses += ' ' + cssClasses;
        }

        var navbarAttributes = {};
        if ( cssID ) {
            navbarAttributes.id = cssID;
        }

        if ( customAttributes ) {
            var attributes = customAttributes.split("\n");
            _.each( attributes, function( attribute ) {
                if ( attribute ) {
                    var attr = attribute.split("|");
                    var attrKey = attr[0];
                    var attrValue = attr[1] || '';
                    navbarAttributes[ attrKey ] = attrValue;
                }
            });
        }
        #>
    
        <div class="{{{ navbarClasses }}}" {{{ _.map( navbarAttributes, function( value, key ) { return key + '="' + value + '"'; } ).join( ' ' ) }}}>
            <div class="navbar-container">
                <div class="navbar-logo">
                    <# if ( logoType === 'site_logo' && siteLogo ) { #>
                        <a href="{{ settings.home_url }}">
                            <img src="{{ siteLogo }}" alt="{{ settings.blog_name }}">
                        </a>
                    <# } else if ( logoType === 'site_title' ) { #>
                        <a href="{{ settings.home_url }}">{{ settings.blog_name }}</a>
                    <# } #>
                </div>

                <nav class="navbar-menu navbar-menu-{{ menuPosition }}">
                    <ul>
                        <# _.each( menuItems, function( item, index ) {
                            var itemLink = item.menu_link.url;
                            var itemText = item.menu_title;
                            var activeClass = ( itemLink === '#' ) ? 'current-menu-item' : '';
                            #>
                            <li class="menu-item {{ activeClass }}">
                                <a href="{{ itemLink }}">{{ itemText }}</a>
                            </li>
                        <# }); #>
                    </ul>
                </nav>
    
            <# if ( buttonText && buttonLink ) { #>
                <div class="navbar-button">
                    <a href="{{ buttonLink }}">
                        <# if ( settings.button_icon_position === 'left' ) { #>
                            <i class="{{ buttonIcon.value }}"></i>
                        <# } #>
                        {{ buttonText }}
                        <# if ( settings.button_icon_position === 'right' ) { #>
                            <i class="{{ buttonIcon.value }}"></i>
                        <# } #>
                    </a>
                </div>
            <# } #>
        </div>
        <?php
    }
    
}