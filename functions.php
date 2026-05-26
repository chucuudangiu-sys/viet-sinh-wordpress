<?php
/**
 * Viet Sinh Mechanical - WordPress Theme Functions
 * 
 * This file contains theme setup, asset loading, and customizer settings.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

define( 'VIET_SINH_VERSION', '1.0.0' );
define( 'VIET_SINH_THEME_DIR', get_template_directory() );
define( 'VIET_SINH_THEME_URI', get_template_directory_uri() );

/**
 * Theme Setup
 */
function viet_sinh_theme_setup() {
    // Add theme support
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    add_theme_support( 'custom-logo', array(
        'height'      => 50,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // Register navigation menus
    register_nav_menus( array(
        'primary'   => esc_html__( 'Primary Menu', 'viet-sinh' ),
        'footer'    => esc_html__( 'Footer Menu', 'viet-sinh' ),
        'secondary' => esc_html__( 'Secondary Menu', 'viet-sinh' ),
    ) );

    // Add theme support for custom background
    add_theme_support( 'custom-background', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    ) );

    // Add theme support for editor styles
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor-style.css' );
}
add_action( 'after_setup_theme', 'viet_sinh_theme_setup' );

/**
 * Enqueue Scripts and Styles
 */
function viet_sinh_enqueue_scripts() {
    // Google Fonts
    wp_enqueue_style( 'viet-sinh-fonts', 'https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@400;600;700;800&family=Barlow:wght@300;400;500;600&display=swap', array(), null );

    // Main stylesheet
    wp_enqueue_style( 'viet-sinh-style', VIET_SINH_THEME_URI . '/assets/css/main.css', array(), VIET_SINH_VERSION );
    wp_enqueue_style( 'viet-sinh-responsive', VIET_SINH_THEME_URI . '/assets/css/responsive.css', array(), VIET_SINH_VERSION );

    // Main JavaScript
    wp_enqueue_script( 'viet-sinh-script', VIET_SINH_THEME_URI . '/assets/js/main.js', array(), VIET_SINH_VERSION, true );

    // Localize script for translations
    wp_localize_script( 'viet-sinh-script', 'vietSinhData', array(
        'themeUri' => VIET_SINH_THEME_URI,
        'siteUrl' => site_url(),
        'restUrl' => rest_url(),
        'nonce' => wp_create_nonce( 'viet-sinh-nonce' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'viet_sinh_enqueue_scripts' );

/**
 * Customizer Settings
 */
function viet_sinh_customize_register( $wp_customize ) {
    // Hero Section
    $wp_customize->add_section( 'viet_sinh_hero_section', array(
        'title'       => esc_html__( 'Hero Section', 'viet-sinh' ),
        'priority'    => 30,
        'description' => esc_html__( 'Customize the homepage hero section', 'viet-sinh' ),
    ) );

    // Hero Title
    $wp_customize->add_setting( 'viet_sinh_hero_title', array(
        'default'           => 'THIẾT BỊ NỀN MÓNG CÔNG NGHIỆP',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'viet_sinh_hero_title', array(
        'label'       => esc_html__( 'Hero Title', 'viet-sinh' ),
        'section'     => 'viet_sinh_hero_section',
        'type'        => 'text',
    ) );

    // Hero Description
    $wp_customize->add_setting( 'viet_sinh_hero_description', array(
        'default'           => 'Thiết bị khoan cọc nhồi chất lượng cao, được tin dùng trong các dự án hạ tầng trọng điểm tại Việt Nam và thị trường quốc tế.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'viet_sinh_hero_description', array(
        'label'       => esc_html__( 'Hero Description', 'viet-sinh' ),
        'section'     => 'viet_sinh_hero_section',
        'type'        => 'textarea',
    ) );

    // Hero Image
    $wp_customize->add_setting( 'viet_sinh_hero_image', array(
        'default'           => '',
        'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control( new WP_Customize_Media_Control( $wp_customize, 'viet_sinh_hero_image', array(
        'label'       => esc_html__( 'Hero Image', 'viet-sinh' ),
        'section'     => 'viet_sinh_hero_section',
        'mime_type'   => 'image',
    ) ) );

    // General Settings Section
    $wp_customize->add_section( 'viet_sinh_general_section', array(
        'title'    => esc_html__( 'General Settings', 'viet-sinh' ),
        'priority' => 35,
    ) );

    // Company Phone
    $wp_customize->add_setting( 'viet_sinh_company_phone', array(
        'default'           => '+84 (24) 3765 8888',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'viet_sinh_company_phone', array(
        'label'   => esc_html__( 'Company Phone', 'viet-sinh' ),
        'section' => 'viet_sinh_general_section',
        'type'    => 'text',
    ) );

    // Company Email
    $wp_customize->add_setting( 'viet_sinh_company_email', array(
        'default'           => 'info@vietsinhmechanical.vn',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'viet_sinh_company_email', array(
        'label'   => esc_html__( 'Company Email', 'viet-sinh' ),
        'section' => 'viet_sinh_general_section',
        'type'    => 'email',
    ) );

    // Company Address
    $wp_customize->add_setting( 'viet_sinh_company_address', array(
        'default'           => 'Dong Tho IZ, Tu Son, Bac Ninh, Vietnam',
        'sanitize_callback' => 'sanitize_textarea_field',
    ) );
    $wp_customize->add_control( 'viet_sinh_company_address', array(
        'label'   => esc_html__( 'Company Address', 'viet-sinh' ),
        'section' => 'viet_sinh_general_section',
        'type'    => 'textarea',
    ) );
}
add_action( 'customize_register', 'viet_sinh_customize_register' );

/**
 * Helper Functions
 */
function viet_sinh_get_theme_mod( $setting, $default = '' ) {
    return get_theme_mod( $setting, $default );
}

function viet_sinh_get_logo_url() {
    if ( has_custom_logo() ) {
        $logo_id = get_theme_mod( 'custom_logo' );
        $logo = wp_get_attachment_image_src( $logo_id, 'full' );
        return $logo[0];
    }
    return false;
}

/**
 * Register Widget Areas
 */
function viet_sinh_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Primary Sidebar', 'viet-sinh' ),
        'id'            => 'primary-sidebar',
        'description'   => esc_html__( 'Main sidebar for pages and posts', 'viet-sinh' ),
        'before_widget' => '<div id="%1\$s" class="widget %2\$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
        'name'          => esc_html__( 'Footer Widget Area', 'viet-sinh' ),
        'id'            => 'footer-widget-area',
        'description'   => esc_html__( 'Footer widget area', 'viet-sinh' ),
        'before_widget' => '<div id="%1\$s" class="widget %2\$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ) );
}
add_action( 'widgets_init', 'viet_sinh_widgets_init' );

/**
 * Custom Post Types & Taxonomies
 */
function viet_sinh_register_post_types() {
    // Products Custom Post Type
    register_post_type( 'product', array(
        'labels' => array(
            'name'               => esc_html__( 'Products', 'viet-sinh' ),
            'singular_name'      => esc_html__( 'Product', 'viet-sinh' ),
            'add_new'            => esc_html__( 'Add New Product', 'viet-sinh' ),
            'add_new_item'       => esc_html__( 'Add New Product', 'viet-sinh' ),
            'edit_item'          => esc_html__( 'Edit Product', 'viet-sinh' ),
            'view_item'          => esc_html__( 'View Product', 'viet-sinh' ),
        ),
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'products' ),
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_icon'          => 'dashicons-hammer',
    ) );

    // Services Custom Post Type
    register_post_type( 'service', array(
        'labels' => array(
            'name'               => esc_html__( 'Services', 'viet-sinh' ),
            'singular_name'      => esc_html__( 'Service', 'viet-sinh' ),
        ),
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => array( 'slug' => 'services' ),
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'menu_icon'          => 'dashicons-admin-tools',
    ) );
}
add_action( 'init', 'viet_sinh_register_post_types' );

/**
 * Register Product Category Taxonomy
 */
function viet_sinh_register_taxonomies() {
    register_taxonomy( 'product_category', 'product', array(
        'labels' => array(
            'name'              => esc_html__( 'Product Categories', 'viet-sinh' ),
            'singular_name'     => esc_html__( 'Product Category', 'viet-sinh' ),
        ),
        'hierarchical'      => true,
        'rewrite'           => array( 'slug' => 'product-category' ),
        'public'            => true,
    ) );

    register_taxonomy( 'service_category', 'service', array(
        'labels' => array(
            'name'              => esc_html__( 'Service Categories', 'viet-sinh' ),
            'singular_name'     => esc_html__( 'Service Category', 'viet-sinh' ),
        ),
        'hierarchical'      => true,
        'rewrite'           => array( 'slug' => 'service-category' ),
        'public'            => true,
    ) );
}
add_action( 'init', 'viet_sinh_register_taxonomies' );

/**
 * Disable Admin Bar for Frontend
 */
function viet_sinh_disable_admin_bar() {
    if ( ! is_user_logged_in() ) {
        return;
    }
}
add_action( 'wp_loaded', 'viet_sinh_disable_admin_bar' );

/**
 * Disable WordPress Comments
 */
function viet_sinh_disable_comments_post_types() {
    $post_types = get_post_types( array( 'public' => true ) );
    foreach ( $post_types as $post_type ) {
        if ( post_type_supports( $post_type, 'comments' ) ) {
            remove_post_type_support( $post_type, 'comments' );
            remove_post_type_support( $post_type, 'trackbacks' );
        }
    }
}
add_action( 'admin_init', 'viet_sinh_disable_comments_post_types' );

?>