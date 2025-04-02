<?php
/**
 * My Theme functions and definitions
 * 
 * @package My_Theme
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Theme Setup
 */
function my_theme_setup() {
    // Automatischer Titel-Tag
    add_theme_support('title-tag');
    
    // Beitragsbilder
    add_theme_support('post-thumbnails');
    
    // RSS Feed Links
    add_theme_support('automatic-feed-links');
    
    // HTML5 Support
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));
    
    // Custom Logo
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    
    // Menüs registrieren
    register_nav_menus(array(
        'primary-menu' => __('Hauptmenü', 'my_theme'),
        'footer-menu'  => __('Footermenü', 'my_theme')
    ));
    
    // Übersetzungen laden
    load_theme_textdomain('my_theme', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'my_theme_setup');

/**
 * Styles und Scripts
 */
function my_theme_scripts() {
    // Bootstrap CSS
    wp_enqueue_style(
        'bootstrap', 
        get_template_directory_uri() . '/css/bootstrap.min.css', 
        array(), 
        '5.3.0'
    );
    
    // Haupt-Stylesheet
    wp_enqueue_style(
        'main-style', 
        get_stylesheet_uri(),
        array('bootstrap'),
        filemtime(get_template_directory() . '/style.css')
    );
    
    // Bootstrap JS
    wp_enqueue_script(
        'bootstrap', 
        get_template_directory_uri() . '/js/bootstrap.bundle.min.js', 
        array('jquery'), 
        '5.3.0', 
        true
    );
    
    // Medienbibliothek für Frontend
    if(is_page('kontakt')) {
        wp_enqueue_media();
    }
}
add_action('wp_enqueue_scripts', 'my_theme_scripts');

/**
 * Admin-Styles
 */
function my_theme_admin_styles() {
    wp_enqueue_style(
        'admin-styles', 
        get_template_directory_uri() . '/css/admin-style.css'
    );
    wp_enqueue_media();
}
add_action('admin_enqueue_scripts', 'my_theme_admin_styles');

/**
 * Widget-Bereiche
 */
function my_theme_widgets_init() {
    register_sidebar(array(
        'name'          => __('Seitenleiste', 'my_theme'),
        'id'            => 'sidebar-1',
        'description'   => __('Widget-Bereich für die Hauptseitenleiste', 'my_theme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s mb-4">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title h4">',
        'after_title'   => '</h3>'
    ));
}
add_action('widgets_init', 'my_theme_widgets_init');

/**
 * Custom Excerpt
 */
function my_theme_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'my_theme_excerpt_length');

function my_theme_excerpt_more($more) {
    return '... <a class="read-more" href="'. get_permalink() . '">' . __('Weiterlesen', 'my_theme') . '</a>';
}
add_filter('excerpt_more', 'my_theme_excerpt_more');

/**
 * Medienunterstützung
 */
function my_theme_media_support() {
    // Custom Image Sizes
    add_image_size('card-thumbnail', 400, 300, true);
    add_image_size('featured-large', 1200, 800, true);
    
    // Medienzugriff für Benutzerrollen
    $roles = ['author', 'contributor', 'editor'];
    foreach ($roles as $role) {
        $role_obj = get_role($role);
        if ($role_obj) {
            $role_obj->add_cap('upload_files');
        }
    }
}
add_action('init', 'my_theme_media_support');