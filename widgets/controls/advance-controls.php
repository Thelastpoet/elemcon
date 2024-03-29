<?php

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