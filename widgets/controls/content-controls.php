<?php

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