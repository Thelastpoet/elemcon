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
                'default' => 'right',
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
            'menu_items', // ID for the Repeater
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
                'label' => __( 'Button', 'navbar' ),
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
                'label' => __( 'Button Link', 'navbar' ),
                'type' => \Elementor\Controls_Manager::URL,
                'dynamic' => [
                    'active' => true, 
                ]
            ]
        );
        
        $this->add_control(
            'button_icon',
            [
                'label' => __( 'Icon', 'navbar' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'skin' => 'inline',
                'default' => [
                    'value' => 'fas fa-chevron-right', 
                    'library' => 'solid', 
                ],
                
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
                            'min' => 10, 
                            'max' => 500, 
                            'step' => 1
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ]
                    ],
                    'default' => [ 
                        'unit' => 'px',
                        'size' => 100 
                    ], 
                ]
                );

        $this->end_controls_section();
    
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
            ]
        );

        // Menu Typography
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'menu_typography',
                'label' => __( 'Typography', 'navbar' ),
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
                ]
            );

            $this->add_control(
                'menu_pointer_color_normal',
                [
                    'label' => __( 'Pointer Color', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
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
                ]
            );

            $this->add_control(
                'menu_pointer_color_hover',
                [
                    'label' => __( 'Pointer Color', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                ]
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
                ]
            );

            $this->add_control(
                'menu_pointer_color_active',
                [
                    'label' => __( 'Pointer Color', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                ]
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
                ]
            );
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // Start button section        
        $this->end_controls_section();
           
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
                'label' => __( 'Typography', 'navbar' ),
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
            ]
        );
        
        $this->add_control(
            'button_icon_color_normal',
            [
                'label' => __( 'Icon Color', 'navbar' ),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );
        
        $this->add_control(
            'button_background_color_normal',
            [
                'label' => __( 'Background Color', 'navbar' ),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );
        
        $this->add_control(
            'button_border_normal',
            [
                'label' => __( 'Border', 'navbar' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'navbar' ),
                'label_off' => __( 'No', 'navbar' ),
                'return_value' => 'yes',
                'default' => 'no',
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
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow_normal',
                'label' => __( 'Box Shadow', 'navbar' ),
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
            ]
        );
        
        $this->add_control(
            'button_icon_color_hover',
            [
                'label' => __( 'Icon Color', 'navbar' ),
                'type' => \Elementor\Controls_Manager::COLOR,
            ]
        );
        
        $this->add_control(
            'button_background_color_hover',
            [
                'label' => __( 'Background Color', 'navbar' ),
                'type' => \Elementor\Controls_Manager::COLOR,
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
                'default' => 'no',
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
            ]
        );
        
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow_hover',
                'label' => __( 'Box Shadow', 'navbar' )
            ]
        );
        
        $this->end_controls_tab();
        
        $this->end_controls_tabs();
        
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
                    'default' => 'no',
                ]
            );
            
            $this->add_control(
                'content_width',
                [
                    'label' => __( 'Content Width', 'navbar' ),
                    'type' => \Elementor\Controls_Manager::SLIDER,
                    'size_units' => [ 'px', '%' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 5,
                        ],
                        '%' => [
                            'min' => 0,
                            'max' => 100,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 500,
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
                        'size' => 20,
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
                        'size' => 20,
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
     * 
     * Render the widget output on the frontend.
     */
    protected function render() {
        $settings = $this->get_settings_for_display();
        
    }

}
