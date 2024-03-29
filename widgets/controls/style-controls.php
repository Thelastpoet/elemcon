<?php

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
