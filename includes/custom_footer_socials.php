<?php 

function custom_footer_socials($wp_customize) {
    // Section Footer
    $wp_customize->add_section('footer_socials_section', array(
        'title'    => __('Liens Réseaux Sociaux', 'your-theme'),
        'priority' => 30,
    ));

    // Champ GitHub
    $wp_customize->add_setting('footer_github_link', array(
        'default'   => '',
        'sanitize_callback' => 'esc_url',
    ));

    $wp_customize->add_control('footer_github_link', array(
        'label'    => __('Lien GitHub', 'your-theme'),
        'section'  => 'footer_socials_section',
        'type'     => 'url',
    ));

    // Champ LinkedIn
    $wp_customize->add_setting('footer_linkedin_link', array(
        'default'   => '',
        'sanitize_callback' => 'esc_url',
    ));

    $wp_customize->add_control('footer_linkedin_link', array(
        'label'    => __('Lien LinkedIn', 'your-theme'),
        'section'  => 'footer_socials_section',
        'type'     => 'url',
    ));
}

add_action('customize_register', 'custom_footer_socials');
function add_social_icons_to_footer_menu($items, $args) {
    if ($args->theme_location == 'footer_menu') { 
        $github_link = get_theme_mod('footer_github_link', '#');
        $linkedin_link = get_theme_mod('footer_linkedin_link', '#');

        $social_icons = '<li class="menu-item social-item">
            <a href="'. esc_url($github_link) .'" target="_blank">
                <i class="fa-brands fa-github fa-2x"></i>
            </a>
        </li>';
        
        $social_icons .= '<li class="menu-item social-item">
            <a href="'. esc_url($linkedin_link) .'" target="_blank">
                <i class="fa-brands fa-linkedin fa-2x"></i>
            </a>
        </li>';

        $items .= $social_icons;
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'add_social_icons_to_footer_menu', 10, 2);