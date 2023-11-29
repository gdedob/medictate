<?php

add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );

function wp_assets_loader() {
    wp_enqueue_style ('bootstrap', 
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');

    wp_enqueue_style('style_app',
    get_template_directory_uri(). '/medictate/assets/css/app.css', 'bootstrap');
wp_enqueue_script('bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js',
false,
// version,
true);
}
add_action('wp_enqueue_scripts', 'wp_assets_loader');


function create_posttypes() {
    // Programmes
    register_post_type('progs', [
        'labels' => [
            'name' => __( 'Programmes' ),
            'singular_name' => __( 'programmes' )
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'progs'],
        'show_in_rest' => true,
    ]);
    }
add_action('init', 'create_posttypes');