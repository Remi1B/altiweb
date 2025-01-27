<?php 

function cptui_register_my_cpts() {

	/**
	 * Post Type: projets.
	 */

	$labels = [
		"name" => esc_html__( "projets", "custom-post-type-ui" ),
		"singular_name" => esc_html__( "projet", "custom-post-type-ui" ),
	];

	$args = [
		"label" => esc_html__( "projets", "custom-post-type-ui" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"rest_namespace" => "wp/v2",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"can_export" => false,
		"rewrite" => [ "slug" => "projet", "with_front" => true ],
		"query_var" => true,
		"supports" => [ "title", "editor", "thumbnail" ],
		"show_in_graphql" => false,
	];

	register_post_type( "projet", $args );
}

add_action( 'init', 'cptui_register_my_cpts' );
add_filter('single_template', function($single_template) {
    global $post;

    // Vérifie si le type de contenu est 'projet'
    if ($post->post_type === 'projet') {
        // Cherche le fichier 'single-projet.php' dans le dossier 'templates'
        $custom_template = locate_template('templates/single-projet.php');
        if ($custom_template) {
            return $custom_template;
        }
    }

    return $single_template;
});