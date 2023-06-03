<?php 
add_action( 'admin_menu', 'opl_admin_menu' );
add_action('admin_init', 'custom_product_price_admin_init');
add_action('admin_init', 'vicarious_trauma_product_price_admin_init');
add_action('admin_init', 'trauma_informed_care_course_price_admin_init');

function opl_admin_menu(){
    add_menu_page( 
            __( 'Onpoint Learning', 'opl-helper' ), 
            __( 'Onpoint Learing', 'opl-helper' ),
            'manage_options', 
            'onpoint-learning',
            'opl_menu_callback',
            'dashicons-book' 
        );

    add_submenu_page( 
            'onpoint-learning',
            __( '2 Course Deal', 'opl-helper' ),
            __( '2 Course Deal', 'opl-helper' ),
            'manage_options', 
            'onpoint-learning',
            'opl_menu_callback' 
        );

    add_submenu_page( 
            'onpoint-learning',
            __( 'Vicarious Trauma', 'opl-helper'),
            __( 'Vicarious Trauma', 'opl-helper'),
            'manage_options', 
            'onpoint-learning-vicarious', 
            'opl_vicarious_trauma_menu_callback'
    );

    add_submenu_page( 
            'onpoint-learning',
            __( 'Trauma Informed CC', 'opl-helper'),
            __( 'Trauma Informed CC', 'opl-helper'),
            'manage_options', 
            'onpoint-learning-trauma-informed-cc', 
            'opl_trauma_informed_menu_callback'
    );
}

function opl_menu_callback(){
    include __DIR__ . '/template-parts/two-crourse-menu-cb.php';
}

function opl_vicarious_trauma_menu_callback(){
    include __DIR__ . '/template-parts/vicarious_trauma.php';
}

function opl_trauma_informed_menu_callback(){
    include __DIR__ . '/template-parts/trauma-informed-care-course-cb.php';
}


require_once __DIR__ . '/menu-functions/two-course-deal.php';
require_once __DIR__ . '/menu-functions/vicarious-trauma.php';
require_once __DIR__ . '/menu-functions/trauma-informed-care-course.php';

