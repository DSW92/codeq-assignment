<?php

function child_enqueue_styles() {
    wp_enqueue_style('twenty-twenty-two-child-css', get_stylesheet_directory_uri() . "/dist/app.css", array('twentytwentytwo-style'), null, 'all');
    wp_enqueue_script('twenty-twenty-two-child-js', get_stylesheet_directory_uri() . "/dist/app.js", ["jquery"], true);
}
add_action( 'wp_enqueue_scripts', 'child_enqueue_styles', 15);

?>