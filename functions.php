<?php

function interstallertheme_theme_support() {
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'interstallertheme_theme_support');

function interstallertheme_menu() {
    $locations = array(
        'primary' => "Desktop Primary Right Sidebar",
        'footer' => "Footer Menu Items"
    );

    register_nav_menus($locations);
}

add_action('init', 'interstallertheme_menu');


function interstallertheme_register_style() {
    // Get version from the style.css file header
    $theme = wp_get_theme();
    $version = $theme->get( 'Version' );

    // Enqueue styles
    // Bootstrap styles
    wp_enqueue_style( 'interstallertheme-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all' );
    // Font Awesome fonts
    wp_enqueue_style( 'interstallertheme-font-awesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all' );
    // Custom Style
    wp_enqueue_style( 'interstallertheme-style', get_stylesheet_uri(), array('interstallertheme-bootstrap', 'interstallertheme-font-awesome'), $version, 'all' );
}

add_action( 'wp_enqueue_scripts', 'interstallertheme_register_style' );


function interstallertheme_register_scripts() {

    // Enqueue jQuery
    wp_enqueue_script( 'interstallertheme-jquery', "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), '3.4.1', true);

    // Enqueue Popper.js
    wp_enqueue_script( 'interstallertheme-popper', "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array('interstallertheme-jquery'), '1.16.0', true);

    // Enqueue Bootstrap JS
    wp_enqueue_script( 'interstallertheme-bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array('interstallertheme-popper'), '4.4.1', true);

    // Enqueue Custom JS
    wp_enqueue_script( 'interstallertheme-main', get_template_directory_uri() . '/assets/js/main.js', array('interstallertheme-bootstrap'), null, true);

}

add_action( 'wp_enqueue_scripts', 'interstallertheme_register_scripts' );

?>
