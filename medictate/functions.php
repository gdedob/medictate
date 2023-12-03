<?php

add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support('menus');

register_nav_menu('header', 'Entête du menu');

// Charge les styles
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


//
function montheme_menu_class($classes) {
    // customizer classe des items (`li`)
    $classes[] = 'nav-item';
    return $classes;
  }
  function montheme_menu_link_class($attrs) {
    // customizer classe des liens (`a`)
    $attrs['class'] = 'nav-link';
    return $attrs;
  }
  
  add_filter('nav_menu_css_class', 'montheme_menu_class');
  add_filter('nav_menu_link_attributes', 'montheme_menu_link_class');

  
//Custom post type
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

//Création d'utilisateur
function inscription_process() {
    $nom = sanitize_text_field($_POST['nom']);
    $email = sanitize_email($_POST['email']);
    $motdepasse = sanitize_text_field($_POST['motdepasse']);

    // Vérifier si l'utilisateur existe déjà avec cet e-mail
    if (email_exists($email)) {
        $response = array(
            'success' => false,
            'message' => 'Cet adresse mail est déjà utilisée.'
        );
        wp_send_json($response);
    }

    // Créer un nouvel utilisateur
    $userdata = array(
        'user_login' => $nom,
        'user_email' => $email,
        'user_pass'  => $motdepasse,
    );
    
    $user_id = wp_insert_user($userdata);

    if (is_wp_error($user_id)) {
        $response = array(
            'success' => false,
            'message' => 'Erreur lors de la création de l\'utilisateur. Veuillez réessayer.'
        );
        wp_send_json($response);
    } else {
        $response = array(
            'success' => true,
            'message' => 'Utilisateur créé avec succès !'
        );
        wp_send_json($response);
    }
}

add_action('wp_ajax_inscription_process', 'inscription_process');
add_action('wp_ajax_nopriv_inscription_process', 'inscription_process');

