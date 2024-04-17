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
        // Content Tab
        $this->start_controls_section(
            'Layout_section',
            [
                'label' => __( 'Layout', 'navbar' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // layout controls
        $this->add_control(
            'navbar_direction',
            [
                'label' => __( 'Navbar Direction', 'navbar' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'navbar' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'navbar' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
            ]
        );

        $this->add_control(
            'menu_position',
            [
                'label' => __( 'Menu Position', 'navbar' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'navbar' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'navbar' ),
                        'icon' => 'eicon-h-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'navbar' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'center',
                'toggle' => true,
            ]
        );

        $this->add_control(
            'pointer',
            [
                'label' => __( 'Pointer', 'navbar' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'none',
                'options' => [
                    'none'  => __( 'None', 'navbar' ),
                    'underline' => __( 'Underline', 'navbar' ),
                    'background' => __( 'Background', 'navbar' ),
                ],
            ]
        );

        $this->add_control(
            'mobile_dropdown',
            [
                'label' => __( 'Mobile Dropdown', 'navbar' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'tablet',
                'options' => [
                    'tablet'  => __( 'Tablet', 'navbar' ),
                    'mobile' => __( 'Mobile', 'navbar' ),
                    'none' => __( 'None', 'navbar' ),
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'site_identity_section',
            [
                'label' => __( 'Site Identity', 'navbar' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Site identity controls
        $this->add_control(
            'logo_type',
            [
                'label' => __( 'Logo Type', 'edit-navbar' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 'site_logo',
                'options' => [
                    'site_logo'  => __( 'Site Logo', 'edit-navbar' ),
                    'site_title' => __( 'Site Title', 'edit-navbar' ),
                ],
            ]
        );

        $this->add_control(
            'site_logo',
            [
                'label' => __( 'Site Logo', 'edit-navbar' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'logo_type' => 'site_logo',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'menu_section',
            [
                'label' => __( 'Menu', 'navbar' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Menu controls
        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'menu_title', // Control ID
            [
                'label' => __('Title', 'navbar'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Menu Item', 'navbar'),
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $repeater->add_control(
            'menu_link', 
            [
                'label' => __('Link', 'navbar'),
                'type' => \Elementor\Controls_Manager::URL,
                'dynamic' => [
                    'active' => true,
                ]
            ]
        );

        $this->add_control(
            'menu_items', 
            [
                'label' => __( 'Menu Items', 'navbar' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [ 'menu_title' => __( 'Pro Access', 'navbar' ) ],
                ],
                'title_field' => '{{{ menu_title }}}',
            ]
        );

        $this->end_controls_section();

        // Button Section
        $this->start_controls_section(
            'button_section',
            [
                'label' => __( 'CTA Button', 'navbar' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        // Buton controls
        $this->add_control(
            'button_text',
            [
                'label' => __( 'Button Text', 'navbar' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Get Started', 'navbar' ),
                'dynamic' => [
                    'active' => true, 
                ]
            ]
        );

        $this->add_control(
            'button_link',
            [
                'label' => __( 'Link', 'navbar' ),
                'type' => \Elementor\Controls_Manager::URL,
                'dynamic' => [
                    'active' => true, 
                ],
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $this->add_control(
            'button_icon',
            [
                'label' => __( 'Icon', 'navbar' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'skin' => 'inline',
            ]
        );

        $this->end_controls_section();

        // Style Tab
        $this->start_controls_section(
            'style_section',
            [
                'label' => __( 'Logo', 'navbar' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
            );

            // Logo Control
            $this->add_responsive_control( 
                'logo_width',
                [
                    'label' => __( 'Width', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ], 
                    'range' => [
                        'px' => [
                            'min' => 1, 
                            'max' => 50, 
                            'step' => 1
                        ],
                        '%' => [
                            'min' => 1,
                            'max' => 100,
                            'step' => 1,
                        ]
                    ],
                    'default' => [ 
                        'unit' => 'px',
                        'size' => 20 
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .navbar-logo' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                    'condition' => [
                        'logo_type' => 'site_logo',
                    ],
                ],
                
            );

            // Logo Site title 
            $this->add_control(
                'site_title_color',
                [
                    'label' => __( 'Text Color', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#000000',
                    'selectors' => [
                        '{{WRAPPER}} .navbar-logo a' => 'color: {{VALUE}};',
                    ],
                    'condition' => [
                        'logo_type' => 'site_title',
                    ],
                ]
            );
            
            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'site_title_typography',
                    'label' => __( 'Typography', 'navbar' ),
                    'selector' => '{{WRAPPER}} .navbar-logo a',
                    'condition' => [
                        'logo_type' => 'site_title',
                    ],
                ]
            );

        $this->end_controls_section();
        // End Logo control

        // Menu tab on Styles Tab        
        $this->start_controls_section(
            'spacing_section',
            [
                'label' => __( 'Menu', 'navbar' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Menu Spacing
        $this->add_responsive_control(
            'menu_item_spacing',
            [
                'label' => __( 'Spacing', 'navbar' ),
                'type' => \Elementor\Controls_Manager::SLIDER, 
                'size_units' => [ 'px' ], 
                'range' => [
                    'px' => [
                        'min' => 0, 
                        'max' => 100, 
                        'step' => 1
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 65,
                ],
                'selectors' => [
                    '{{WRAPPER}} .navbar-menu > ul > li:not(:last-child)' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ],
        );

        // Menu Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'menu_typography',
                'label' => __( 'Typography', 'navbar' ),
                'selector' => '{{WRAPPER}} .navbar-menu > ul > li > a',
                'fields_options' => [
                    'font_family' => [
                        'default' => 'Poppins',
                    ],
                    'font_weight' => [
                        'default' => '500',
                    ],
                    'font_size' => [
                        'default' => [
                            'unit' => 'px',
                            'size' => 18,
                        ],
                    ],
                    'line_height' => [
                        'default' => [
                            'unit' => 'px',
                            'size' => 20,
                        ],
                    ],
                    'text_align' => [
                        'default' => 'center',
                    ],
                    'color' => [
                        'default' => '#171515',
                    ],
                ],
            ]
        );

        // Menu Text Colors (Normal, Hover, Active)               
        $this->start_controls_tabs( 'menu_colors_tabs' );

        // Normal Tab
        $this->start_controls_tab( 'menu_normal_tab', [ 'label' => __( 'Normal', 'navbar' ) ] );
            $this->add_control(
                'menu_text_color',
                [
                    'label' => __( 'Text Color', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#171515',
                    'selectors' => [
                        '{{WRAPPER}} .navbar-menu > ul > li > a' => 'color: {{VALUE}};',
                    ],
                ],
            );

            $this->add_control(
                'menu_pointer_initial_state',
                [
                    'label' => __( 'Pointer Initial State', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::HIDDEN,
                    'default' => '',
                    'selectors' => [
                        '{{WRAPPER}} .navbar-menu > ul > li > a::before' => 'content: ""; position: absolute; bottom: 0; left: 0; width: 100%; height: 2px; background-color: transparent; transform: scaleX(0); transition: transform 0.3s;',
                    ],
                ]
            );

            $this->add_control(
                'menu_pointer_color_normal',
                [
                    'label' => __( 'Pointer Color', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .navbar-menu > ul > li > a::before' => 'background-color: {{VALUE}};',
                    ],
                    'condition' => [
                        'pointer' => [ 'underline', 'background' ],
                    ],
                ]        
            );

            $this->add_control(
                'menu_pointer_animation_normal',
                [
                    'label' => __( 'Pointer Animation', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'none',
                    'options' => [
                        'none'  => __( 'None', 'navbar' ),
                        'fade'  => __( 'Fade', 'navbar' ),
                        'slide' => __( 'Slide', 'navbar' ),
                        'grow'  => __( 'Grow', 'navbar' ),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .navbar-menu > ul > li > a::before' => 'transition: all 0.3s;',
                    ],
                ]
            );
        $this->end_controls_tab();

        // Hover Tab
        $this->start_controls_tab( 'menu_hover_tab', [ 'label' => __( 'Hover', 'navbar' ) ] );
            $this->add_control(
                'menu_text_color_hover',
                [
                    'label' => __( 'Text Color', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#0148FF',
                    'selectors' => [
                        '{{WRAPPER}} .navbar-menu > ul > li > a:hover' => 'color: {{VALUE}};',
                    ],
                ],
                
            );

            $this->add_control(
                'menu_pointer_color_hover',
                [
                    'label' => __( 'Pointer Color', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#0148FF',
                    'selectors' => [
                        '{{WRAPPER}} .navbar-menu > ul > li > a:hover::before' => 'background-color: {{VALUE}};',
                    ],
                    'condition' => [
                        'pointer' => [ 'underline', 'background' ],
                    ],
                ],
                
            );

            $this->add_control(
                'menu_pointer_animation_hover',
                [
                    'label' => __( 'Pointer Animation', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'none',
                    'options' => [
                        'none'  => __( 'None', 'navbar' ),
                        'fade'  => __( 'Fade', 'navbar' ),
                        'slide' => __( 'Slide', 'navbar' ),
                        'grow'  => __( 'Grow', 'navbar' ),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .navbar-menu > ul > li > a:hover::before' => 'transition: all 0.3s;',
                    ],
                    'condition' => [
                        'pointer' => [ 'underline', 'background' ],
                    ],
                ]
            );
        $this->end_controls_tab();

        // Active Tab
        $this->start_controls_tab( 'menu_active_tab', [ 'label' => __( 'Active', 'navbar' ) ] );
            $this->add_control(
                'menu_text_color_active',
                [
                    'label' => __( 'Text Color', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#FF00F5',
                    'selectors' => [
                        '{{WRAPPER}} .navbar-menu > ul > li.current-menu-item > a' => 'color: {{VALUE}};',
                    ],
                    'condition' => [
                        'pointer' => [ 'underline', 'background' ],
                    ],
                ],        
            );

            $this->add_control(
                'menu_pointer_color_active',
                [
                    'label' => __( 'Pointer Color', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'default' => '#FF00F5',
                    'selectors' => [
                        '{{WRAPPER}} .navbar-menu > ul > li.current-menu-item > a::before' => 'background-color: {{VALUE}};',
                    ],
                ],
            );

            $this->add_control(
                'menu_pointer_animation_active',
                [
                    'label' => __( 'Pointer Animation', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => 'none',
                    'options' => [
                        'none'  => __( 'None', 'navbar' ),
                        'fade'  => __( 'Fade', 'navbar' ),
                        'slide' => __( 'Slide', 'navbar' ),
                        'grow'  => __( 'Grow', 'navbar' ),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .navbar-menu > ul > li.current-menu-item > a::before' => 'transition: all 0.3s;',
                    ],
                ]
            );

            $this->end_controls_tab();

            $this->end_controls_tabs();
            
        $this->end_controls_section();

        // Start button section          
        $this->start_controls_section(
            'button_style_section',
            [
                'label' => __( 'Button', 'navbar' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Button Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'button_typography',
                'label' => __('Typography', 'navbar'),
                'selector' => '{{WRAPPER}} .navbar-button',
                'fields_options' => [
                    'font_family' => [
                        'default' => 'Poppins',
                    ],
                    'font_weight' => [
                        'default' => '500',
                    ],
                    'font_size' => [
                        'default' => [
                            'unit' => 'px',
                            'size' => 16,
                        ],
                    ],
                    'line_height' => [
                        'default' => [
                            'unit' => 'px',
                            'size' => 16,
                        ],
                    ],
                ],
            ]
        );

        // Icon Position
        $this->add_control(
            'button_icon_position',
            [
                'label' => __( 'Icon Position', 'navbar' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'navbar' ),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'navbar' ),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => 'right',
                'toggle' => true,
            ]
        );

        // Icon Spacing
        $this->add_control(
            'button_icon_spacing',
            [
                'label' => __( 'Icon Spacing', 'navbar' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 50,
                        'step' => 1,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .navbar-button a .icon-left' => 'margin-right: {{SIZE}}{{UNIT}};',
                    '{{WRAPPER}} .navbar-button a .icon-right' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->start_controls_tabs( 'button_style_tabs' );

        // Normal Tab
        $this->start_controls_tab( 'button_normal_tab', [ 'label' => __( 'Normal', 'navbar' ) ] );

        $this->add_control(
            'button_text_color_normal',
            [
                'label' => __( 'Text Color', 'navbar' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#ffffff',
                'selectors' => [
                    '{{WRAPPER}} .navbar-button a' => 'color: {{VALUE}};',
                ],
            ],
            
        );

        $this->add_control(
            'button_icon_color_normal',
            [
                'label' => __( 'Icon Color', 'navbar' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navbar-button i' => 'color: {{VALUE}};',
                ],
            ],
            
        );

        $this->add_control(
            'button_background_color_normal',
            [
                'label' => __( 'Background Color', 'navbar' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '#000000',
                'selectors' => [
                    '{{WRAPPER}} .navbar-button' => 'background-color: {{VALUE}};',
                ],
            ],
            
        );

        $this->add_control(
            'button_border_normal',
            [
                'label' => __( 'Border', 'navbar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'navbar' ),
                'label_off' => __( 'No', 'navbar' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'button_border_radius_normal',
            [
                'label' => __( 'Border Radius', 'navbar' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'condition' => [
                    'button_border_normal' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .navbar-button' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '30',
                    'right' => '30',
                    'bottom' => '30',
                    'left' => '30',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
            ]
        );

        // Button Padding
        $this->add_responsive_control(
            'button_padding',
            [
                'label' => __('Padding', 'navbar'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .navbar-button' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '12',
                    'right' => '32',
                    'bottom' => '12',
                    'left' => '32',
                    'unit' => 'px',
                    'isLinked' => false,
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow_normal',
                'label' => __( 'Box Shadow', 'navbar' ),
                'selector' => '{{WRAPPER}} .navbar-button a',
            ]
        );

        $this->end_controls_tab();

        // Hover Tab
        $this->start_controls_tab( 'button_hover_tab', [ 'label' => __( 'Hover', 'navbar' ) ] );

        $this->add_control(
            'button_text_color_hover',
            [
                'label' => __( 'Text Color', 'navbar' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navbar-button:hover' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_icon_color_hover',
            [
                'label' => __( 'Icon Color', 'navbar' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navbar-button:hover i' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_background_color_hover',
            [
                'label' => __( 'Background Color', 'navbar' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .navbar-button:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'button_border_hover',
            [
                'label' => __( 'Border', 'navbar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'navbar' ),
                'label_off' => __( 'No', 'navbar' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'button_border_radius_hover',
            [
                'label' => __( 'Border Radius', 'navbar' ),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%' ],
                'condition' => [
                    'button_border_hover' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .navbar-button:hover' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'default' => [
                    'top' => '30',
                    'right' => '30',
                    'bottom' => '30',
                    'left' => '30',
                    'unit' => 'px',
                    'isLinked' => true,
                ],
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow_hover',
                'label' => __( 'Box Shadow', 'navbar' ),
                'selector' => '{{WRAPPER}} .navbar-button a:hover',
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_section(); 
        // End button style section

        // Start Background section
        $this->start_controls_section(
            'background_section',
            [
                'label' => __( 'Background', 'navbar' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Background Type control
        $this->add_control(
            'background_type',
            [
                'label' => __( 'Type', 'navbar' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'classic' => [
                        'title' => __( 'Classic', 'navbar' ),
                        'icon' => 'eicon-paint-brush',
                    ],
                    'gradient' => [
                        'title' => __( 'Gradient', 'navbar' ),
                        'icon' => 'eicon-barcode',
                    ],
                ],
                'default' => 'classic',
                'toggle' => false,
            ]
        );


        $this->end_controls_section();

        // Start Border section
        $this->start_controls_section(
            'border_section',
            [
                'label' => __( 'Border', 'navbar' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        // Bottom Border control
        $this->add_control(
            'bottom_border',
            [
                'label' => __( 'Bottom Border', 'navbar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'navbar' ),
                'label_off' => __( 'No', 'navbar' ),
                'return_value' => 'yes',
                'default' => 'no',
                'selectors' => [
                    '{{WRAPPER}} .navbar' => 'border-bottom-style: {{VALUE}}; border-bottom-width: {{bottom_border_width.SIZE}}{{bottom_border_width.UNIT}}; border-bottom-color: {{bottom_border_color}};',
                ],
            ]
        );

        // Bottom Border Style control
        $this->add_control(
            'bottom_border_style',
            [
                'label' => __( 'Border Style', 'navbar' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    'solid' => __( 'Solid', 'navbar' ),
                    'dashed' => __( 'Dashed', 'navbar' ),
                    'dotted' => __( 'Dotted', 'navbar' ),
                    'double' => __( 'Double', 'navbar' ),
                    'none' => __( 'None', 'navbar' ),
                ],
                'default' => 'solid',

                'condition' => [
                    'bottom_border' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .navbar' => 'border-bottom-style: {{VALUE}};',
                ],
            ]
        );

        // Bottom Border Color control
        $this->add_control(
            'bottom_border_color',
            [
                'label' => __( 'Border Color', 'navbar' ),
                'type' => \Elementor\Controls_Manager::COLOR,

                'condition' => [
                    'bottom_border' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .navbar' => 'border-bottom-color: {{VALUE}};',
                ],
            ]
        );

        // Bottom Border Width control
        $this->add_control(
            'bottom_border_width',
            [
                'label' => __( 'Border Width', 'navbar' ),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => [ 'px' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 1,
                ],
                'condition' => [
                    'bottom_border' => 'yes',
                ],
                'selectors' => [
                    '{{WRAPPER}} .navbar' => 'border-bottom-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        // Box Shadow control
        $this->add_control(
            'box_shadow',
            [
                'label' => __( 'Box Shadow', 'navbar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'navbar' ),
                'label_off' => __( 'No', 'navbar' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        // Box Shadow controls
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'header_box_shadow',
                'label' => __( 'Box Shadow', 'navbar' ),
                'condition' => [
                    'box_shadow' => 'yes',
                ],
                'selector' => '{{WRAPPER}} .navbar',
            ]
        );

        $this->end_controls_section();

        // Advanced Tab 
        $this->start_controls_section(
            'advanced_section',
            [
                'label' => __( 'Advanced', 'navbar' ),
                'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
            ]
            );

            // Layout controls
            $this->add_control(
                'full_width',
                [
                    'label' => __( 'Full Width', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Yes', 'navbar' ),
                    'label_off' => __( 'No', 'navbar' ),
                    'return_value' => 'yes',
                    'default' => 'yes',
                ]
            );
            
            $this->add_responsive_control(
                'content_width',
                [
                    'label' => __( 'Content Width', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 2000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 1250,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .navbar-container' => 'max-width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->add_responsive_control(
                'top_padding',
                [
                    'label' => __( 'Top Padding', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 30,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .navbar' => 'padding-top: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->add_responsive_control(
                'bottom_padding',
                [
                    'label' => __( 'Bottom Padding', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 30,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .navbar' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );
            
            $this->add_control(
                'element_spacing',
                [
                    'label' => __( 'Element Spacing', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'default' => __( 'Default', 'navbar' ),
                        'none' => __( 'None', 'navbar' ),
                    ],
                    'default' => 'default',
                ]
            );

            $this->end_controls_section();

            $this->start_controls_section(
                'advanced_scroll_section',
                [
                    'label' => __( 'Scroll Settings', 'navbar' ),
                    'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
                ]
            );

            // Apply Effects On control
            $this->add_control(
                'apply_effects_on',
                [
                    'label' => __( 'Apply Effects On', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => [
                        'desktop' => __( 'Desktop', 'navbar' ),
                        'tablet' => __( 'Tablet', 'navbar' ),
                        'mobile' => __( 'Mobile', 'navbar' ),
                    ],
                    'default' => [ 'desktop', 'tablet', 'mobile' ],
                ]
            );

            // Scroll Distance control
            $this->add_control(
                'scroll_distance',
                [
                    'label' => __( 'Scroll Distance', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 100,
                    ],
                ]
            );

            // Navbar subsection
            $this->add_control(
                'navbar_settings',
                [
                    'label' => __( 'Navbar', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'sticky',
                [
                    'label' => __( 'Sticky', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Yes', 'navbar' ),
                    'label_off' => __( 'No', 'navbar' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'adjust_on_scroll',
                [
                    'label' => __( 'Adjust on Scroll', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Yes', 'navbar' ),
                    'label_off' => __( 'No', 'navbar' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            $this->add_control(
                'hide_on_scroll',
                [
                    'label' => __( 'Hide on Scroll', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Yes', 'navbar' ),
                    'label_off' => __( 'No', 'navbar' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            // Logo subsection
            $this->add_control(
                'logo_settings',
                [
                    'label' => __( 'Logo', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::HEADING,
                    'separator' => 'before',
                ]
            );

            $this->add_control(
                'logo_on_scroll',
                [
                    'label' => __( 'On Scroll', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'none' => __( 'None', 'navbar' ),
                        'shrink' => __( 'Shrink Logo', 'navbar' ),
                        'alternative' => __( 'Display Alternative Logo', 'navbar' ),
                    ],
                    'default' => 'none',
                ]
            );


            $this->end_controls_section();

            $this->start_controls_section(
                'advanced_responsive_section',
                [
                    'label' => __( 'Responsive', 'navbar' ),
                    'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
                ]
            );

            // Responsive controls
            $this->add_control(
                'responsive_description',
                [
                    'raw' => __( 'Responsive visibility will take effect only on preview mode or live page, and not while editing in Elementor.', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::RAW_HTML,
                    'content_classes' => 'elementor-descriptor',
                ]
            );

            // Hide On Desktop control
            $this->add_control(
                'hide_on_desktop',
                [
                    'label' => __( 'Hide On Desktop', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Yes', 'navbar' ),
                    'label_off' => __( 'No', 'navbar' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            // Hide On Tablet control
            $this->add_control(
                'hide_on_tablet',
                [
                    'label' => __( 'Hide On Tablet', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Yes', 'navbar' ),
                    'label_off' => __( 'No', 'navbar' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );

            // Hide On Mobile control
            $this->add_control(
                'hide_on_mobile',
                [
                    'label' => __( 'Hide On Mobile', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'label_on' => __( 'Yes', 'navbar' ),
                    'label_off' => __( 'No', 'navbar' ),
                    'return_value' => 'yes',
                    'default' => 'no',
                ]
            );


            $this->end_controls_section();

            $this->start_controls_section(
                'advanced_custom_section',
                [
                    'label' => __( 'Custom', 'navbar' ),
                    'tab' => \Elementor\Controls_Manager::TAB_ADVANCED,
                ]
            );

            // Custom controls
            // CSS ID control
            $this->add_control(
                'css_id',
                [
                    'label' => __( 'CSS ID', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'default' => '',
                    'title' => __( 'Add your custom ID without the "#" prefix.', 'navbar' ),
                    'separator' => 'before',
                ]
            );

            // CSS Classes control
            $this->add_control(
                'css_classes',
                [
                    'label' => __( 'CSS Classes', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'prefix_class' => '',
                    'title' => __( 'Add your custom class without the dot. e.g: my-class', 'navbar' ),
                ]
            );

            // Custom CSS control
            $this->add_control(
                'custom_css',
                [
                    'label' => __( 'Custom CSS', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::CODE,
                    'language' => 'css',
                    'rows' => 20,
                    'separator' => 'before',
                ]
            );

            // Custom Attributes control
            $this->add_control(
                'custom_attributes',
                [
                    'label' => __( 'Custom Attributes', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'dynamic' => [
                        'active' => true,
                    ],
                    'placeholder' => __( 'key|value', 'navbar' ),
                    'description' => __( 'Set custom attributes for the wrapper element. Each attribute in a separate line. Separate attribute key from the value using | character.', 'navbar' ),
                    'separator' => 'before',
                ]
            );
            $this->end_controls_section();          

    }

    /**
     * Render the widget
     */

     protected function render() {
        $settings = $this->get_settings_for_display();
    
        $navbar_direction = $settings['navbar_direction'];
        $menu_position = $settings['menu_position'];
        $menu_items = $settings['menu_items'];
        $pointer = $settings['pointer'];
        $logo_type = $settings['logo_type'];
        $site_logo = $settings['site_logo']['url'];
        $site_title = get_bloginfo('name');
        $button_text = $settings['button_text'];
        $button_link = $settings['button_link']['url'];
        $button_icon = $settings['button_icon'];
    
        $full_width = $settings['full_width'];
        $content_width = $settings['content_width'];
        $top_padding = $settings['top_padding'];
        $bottom_padding = $settings['bottom_padding'];
        $element_spacing = $settings['element_spacing'];
    
        $navbar_classes = 'navbar navbar-' . $navbar_direction;
        $container_classes = 'navbar-container';
    
        if ($full_width === 'yes') {
            $navbar_classes .= ' navbar-full-width';
            
        }
    
        if ($element_spacing === 'none') {
            $navbar_classes .= ' navbar-no-spacing';
        }
    
        $this->add_render_attribute('navbar', 'class', $navbar_classes);
        $this->add_render_attribute('navbar-container', 'class', $container_classes);
        $this->add_render_attribute('navbar', 'style', 'padding-top: ' . $top_padding['size'] . $top_padding['unit'] . '; padding-bottom: ' . $bottom_padding['size'] . $bottom_padding['unit'] . ';');
        $this->add_render_attribute('navbar-menu', 'class', 'navbar-menu navbar-menu-' . $menu_position . ' navbar-pointer-' . $pointer);
    
        ?>
        <div <?php echo $this->get_render_attribute_string('navbar'); ?>>
            <div <?php echo $this->get_render_attribute_string('navbar-container'); ?>>
                <div class="navbar-logo">
                    <?php if ($logo_type === 'site_logo' && !empty($site_logo)) : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="<?php echo esc_url($site_logo); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        </a>
                    <?php elseif ($logo_type === 'site_title') : ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($site_title); ?></a>
                    <?php endif; ?>
                </div>
    
                <nav <?php echo $this->get_render_attribute_string('navbar-menu'); ?>>
                    <ul>
                        <?php foreach ($menu_items as $index => $item) :
                            $item_link = $item['menu_link']['url'];
                            $item_text = $item['menu_title'];
                            $active_class = ($item_link === get_permalink()) ? 'current-menu-item' : '';
                            ?>
                            <li class="<?php echo esc_attr($active_class); ?>">
                                <a href="<?php echo esc_url($item_link); ?>"><?php echo esc_html($item_text); ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
    
                <?php if (!empty($button_text)) : ?>
                    <div class="navbar-button">
                        <a href="<?php echo !empty($button_link) ? esc_url($button_link) : 'javascript:void(0);'; ?>">
                            <?php if ($settings['button_icon_position'] === 'left') : ?>
                                <i class="<?php echo esc_attr($button_icon['value']); ?> icon-left"></i>
                            <?php endif; ?>
                            <?php echo esc_html($button_text); ?>
                            <?php if ($settings['button_icon_position'] === 'right') : ?>
                                <i class="<?php echo esc_attr($button_icon['value']); ?> icon-right"></i>
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
        var navbarDirection = settings.navbar_direction;
        var menuPosition = settings.menu_position;
        var menuItems = settings.menu_items;
        var pointer = settings.pointer;
        var logoType = settings.logo_type;
        var siteLogo = settings.site_logo.url;
        var buttonText = settings.button_text;
        var buttonLink = settings.button_link.url;
        var buttonIcon = settings.button_icon;
    
        var fullWidth = settings.full_width;
        var elementSpacing = settings.element_spacing;
    
        var navbarClasses = 'navbar navbar-' + navbarDirection;
        var containerClasses = 'navbar-container';
    
        if (fullWidth === 'yes') {
            navbarClasses += ' navbar-full-width';
            containerClasses += ' container-fluid';
        } else {
            containerClasses += ' container';
        }
    
        if (elementSpacing === 'none') {
            navbarClasses += ' navbar-no-spacing';
        }
        #>
        <div class="{{{ navbarClasses }}}">
            <div class="{{{ containerClasses }}}">
                <div class="navbar-logo">
                    <# if (logoType === 'site_logo' && siteLogo) { #>
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <img src="{{ siteLogo }}" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                        </a>
                    <# } else if (logoType === 'site_title') { #>
                        <a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html(get_bloginfo('name')); ?></a>
                    <# } #>
                </div>
    
                <nav class="navbar-menu navbar-menu-{{ menuPosition }} navbar-pointer-{{ pointer }}">
                    <ul>
                        <# _.each(menuItems, function(item, index) {
                            var itemLink = item.menu_link.url;
                            var itemText = item.menu_title;
                            var activeClass = (itemLink === '<?php echo esc_url(get_permalink()); ?>') ? 'current-menu-item' : '';
                            #>
                            <li class="menu-item {{ activeClass }}">
                                <a href="{{ itemLink }}">{{ itemText }}</a>
                            </li>
                        <# }); #>
                    </ul>
                </nav>
    
                <# if (buttonText && buttonLink) { #>
                    <div class="navbar-button">
                        <a href="{{ buttonLink }}">
                            <# if (settings.button_icon_position === 'left') { #>
                                <i class="{{ buttonIcon.value }}"></i>
                            <# } #>
                            {{ buttonText }}
                            <# if (settings.button_icon_position === 'right') { #>
                                <i class="{{ buttonIcon.value }}"></i>
                            <# } #>
                        </a>
                    </div>
                <# } #>
            </div>
        </div>
        <?php
        
    }

    
}