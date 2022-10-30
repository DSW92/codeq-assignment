<?php

function child_enqueue_styles() {
    wp_enqueue_style('twenty-twenty-two-child-css', get_stylesheet_directory_uri() . "/dist/main.css", null, 'all');
    wp_enqueue_script('twenty-twenty-two-child-js', get_stylesheet_directory_uri() . "/dist/main.js", ["jquery"], true);

    // Fonts
    wp_enqueue_style( 'roboto', 'https://fonts.googleapis.com/css2?family=Roboto&display=swap' );
}
add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15);

add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
    register_block_type( __DIR__ . '/blocks/header' );
    register_block_type( __DIR__ . '/blocks/steps' );
}

?>