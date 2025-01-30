<?php
function mon_theme_enqueue_assets() {
    wp_enqueue_style('mon-theme-style', get_template_directory_uri() . '/assets/style.css');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/fonts/fontawesome-free-6.7.1-web/css/all.css');

    wp_enqueue_script('menu_mobile', get_stylesheet_directory_uri() . '/js/menu_mobile.js', array(), null, true);
    wp_enqueue_script('toggle_projet', get_stylesheet_directory_uri() . '/js/toggle_projet.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'mon_theme_enqueue_assets');

function mon_theme_register_menus() {
    register_nav_menus(
        array(
            'header_menu' => __('Header Menu'),
            'footer_menu' => __('Footer Menu'),
            'mobile_menu' => __('Menu mobile'),
        )
    );
}
add_action('init', 'mon_theme_register_menus');

function mon_theme_supports() {
    // Ajouter la prise en charge des images mises en avant
    add_theme_support( 'post-thumbnails' );
    // Ajouter la prise en charge du logo personnalisé
    add_theme_support( 'custom-logo');
    // Ajouter automatiquement le titre du site dans l'en-tête du site
    add_theme_support( 'title-tag' );
    add_theme_support( 'templates' );
}
add_action( 'after_setup_theme', 'mon_theme_supports' );

require_once get_template_directory() . '/includes/register_cpt.php';

require_once get_template_directory() . '/includes/acf_fields.php';

require_once get_template_directory() . '/includes/custom_footer_socials.php';
