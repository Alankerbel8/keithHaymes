<?php

function my_theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => 'Custom Sidebar',
		'id' => 'custom-sidebar',
		'description' => 'Sidebar below Header image',
		'before_widget' => '<li id="%1$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
}

function wpdocs_custom_excerpt_length( $length ) {
    return 55;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );



function defer_parsing_of_js ( $url ) {
if ( FALSE === strpos( $url, '.js' ) ) return $url;
if ( strpos( $url, 'jquery.js' ) ) return $url;
return "$url' defer ";
}
add_filter( 'clean_url', 'defer_parsing_of_js', 11, 1 );





?>