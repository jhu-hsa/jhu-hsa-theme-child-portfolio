<?php

// Parent theme css
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-bower', get_template_directory_uri() . '/css/style-bower.css' );
/* add this */
wp_enqueue_style( 'parent-theme-style', get_template_directory_uri() . '/css/style.css' );
wp_enqueue_style( 'custom-theme-style', get_template_directory_uri() . '/css/portfolio-styles.css' );


}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

/* child theme styles */
function child_scripts_styles() {
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri(). '/style.css');
}
add_action( 'wp_enqueue_scripts', 'child_scripts_styles' );

add_filter('acf/settings/save_json', function() {
	return get_stylesheet_directory() . '/acf-json';
});

add_filter('acf/settings/load_json', function($paths) {
	$paths = array(get_template_directory() . '/acf-json');

	if(is_child_theme())
	{
		$paths[] = get_stylesheet_directory() . '/acf-json';
	}

	return $paths;
});

// custom image sizes

add_image_size( 'resource-cat-large', 740, 370, false );

?>