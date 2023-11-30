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

// champs custom durée

// Ajouter un méta champ pour la durée du programme
function ajouter_duree() {
    add_meta_box(
        'duree_programme',
        'Durée du programme',
        'afficher_champ_duree_programme',
        'progs',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'ajouter_duree');

function afficher_duree($post) {
    $duree_programme_value = get_post_meta($post->ID, 'duree_programme', true);
    ?>
    <label for="duree_programme">Durée du programme :</label>
    <input type="text" id="duree_programme" name="duree_programme" value="<?php echo esc_attr($duree_programme_value); ?>">
    <?php
}

function sauvegarder_duree($post_id) {
    if (array_key_exists('duree_programme', $_POST)) {
        update_post_meta(
            $post_id,
            'duree_programme',
            sanitize_text_field($_POST['duree_programme'])
        );
    }
}
add_action('save_post', 'sauvegarder_duree');
