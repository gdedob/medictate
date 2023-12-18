<?php

add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support('menus');

register_nav_menu('header', 'Entête du menu');


// Charge les styles et les scripts
function wp_assets_loader() {
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/app.css', ['bootstrap'], '1.0.0', 'all');

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', ['jquery'], '5.3.2', true);
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/script/js.js', ['bootstrap-bundle'], '1.0.0');
}
add_action('wp_enqueue_scripts', 'wp_assets_loader');


//header custom
function medictate_menu_class($classes) {
    // customizer classe des items (`li`)
    $classes[] = 'nav-item';
    return $classes;
  }

function medictate_menu_link_class($attrs) {
    // customizer classe des liens (`a`)
    $attrs['class'] = 'nav-link';
    return $attrs;
  }

  add_filter('nav_menu_css_class', 'medictate_menu_class');
  add_filter('nav_menu_link_attributes', 'medictate_menu_link_class');



//Custom post type
function create_posttypes() {
    // Programmes
    register_post_type('progs', [
        'labels' => [
            'name' => __( 'Programmes' ),
            'singular_name' => __( 'Programme' )
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'progs'],
        'show_in_rest' => true,
    ]);


    // Explication paramètres
     register_post_type('setting-expl', [
        'labels' => [
            'name' => __( 'Paramètres' ),
            'singular_name' => __( 'Paramètre' )
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'setting-expl'],
        'show_in_rest' => true,
    ]);
    }
add_action('init', 'create_posttypes');

//Tag programmes
function progs_tags_taxonomy() {
    $labels = array(
        'name' => 'Tags', // Le nom affiché de la taxonomie
        'singular_name' => 'Tag', // Le nom singulier
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'hierarchical' => false,
    );

    register_taxonomy('progs_tags', 'progs', $args);
}
add_action('init', 'progs_tags_taxonomy');



// champs custom

// méta champ pour la durée du programme
function ajouter_duree() {
    add_meta_box(
        'duree_programme',
        'Durée du programme',
        'afficher_duree',
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
    <select id="duree_programme" name="duree_programme">
        <option value="10" <?php selected($duree_programme_value, '10'); ?>>10 minutes</option>
        <option value="20" <?php selected($duree_programme_value, '20'); ?>>20 minutes</option>
        <option value="30" <?php selected($duree_programme_value, '30'); ?>>30 minutes</option>
    </select>
    <?php
}
function sauvegarder_duree($post_id) {
    if (isset($_POST['duree_programme'])) {
        update_post_meta(
            $post_id,
            'duree_programme',
            sanitize_text_field($_POST['duree_programme'])
        );
    }
}
add_action('save_post', 'sauvegarder_duree');

//méta champs catégorie
function ajouter_categorie() {
    add_meta_box(
        'categorie_programme',
        'Catégorie',
        'afficher_categorie',
        'progs',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'ajouter_categorie');

function afficher_categorie($post) {
    $categorie_programme_value = get_post_meta($post->ID, 'categorie_programme', true);
    ?>
    <label for="categorie_programme">Catégorie :</label>
    <input type="text" id="categorie_programme" name="categorie_programme" value="<?php echo esc_attr($categorie_programme_value); ?>">
    <?php
}

function sauvegarder_categorie($post_id) {
    if (isset($_POST['categorie_programme'])) {
        update_post_meta(
            $post_id,
            'categorie_programme',
            sanitize_text_field($_POST['categorie_programme'])
        );
    }
}
add_action('save_post', 'sauvegarder_categorie');

// metabox vidéo
function ajouter_video() {
    add_meta_box(
        'video_programme',
        'Ajouter une vidéo (embed)',
        'afficher_video',
        'progs',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'ajouter_video');

function afficher_video($post) {
    $video_url = get_post_meta($post->ID, 'video_programme', true);
    ?>
    <label for="video_url">URL de la vidéo :</label>
    <input type="text" id="video_url" name="video_url" value="<?php echo esc_attr($video_url); ?>">
    <?php
}

function sauvegarder_video($post_id) {
    if (isset($_POST['video_url'])) {
        update_post_meta(
            $post_id,
            'video_programme',
            esc_url($_POST['video_url'])
        );
    }
}
add_action('save_post', 'sauvegarder_video');

//méta champs visuel
function ajouter_visuel() {
    add_meta_box(
        'visuel_programme',
        'Type de visuel',
        'afficher_visuel',
        'progs',
        'normal',
        'default'
    );
}
add_action('add_meta_boxes', 'ajouter_visuel');

function afficher_visuel($post) {
    $visuel_programme = get_post_meta($post->ID, 'visuel_programme', true);
    ?>
    <label for="visuel_programme">Visuel :</label>
    <input type="text" id="visuel_programme" name="visuel_programme" value="<?php echo esc_attr($visuel_programme); ?>">
    <?php
}

function sauvegarder_visuel($post_id) {
    if (isset($_POST['visuel_programme'])) {
        update_post_meta(
            $post_id,
            'visuel_programme',
            sanitize_text_field($_POST['visuel_programme'])
        );
    }
}
add_action('save_post', 'sauvegarder_visuel');
