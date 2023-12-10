<?php

add_theme_support( 'post-thumbnails' );
add_theme_support( 'title-tag' );
add_theme_support('menus');

register_nav_menu('header', 'Entête du menu');

// Charge les styles et les scripts
function wp_assets_loader() {

  wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css');
  wp_enqueue_style('style', get_template_directory_uri() .'/assets/css/app.css', ['bootstrap'], true);

  wp_enqueue_script('jquery');
  wp_enqueue_script('bootstrap-bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js', false, '1.0.0', true);

}
add_action('wp_enqueue_scripts','wp_assets_loader');


//header
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
      // Explication paramètres
     register_post_type('setting-expl', [
        'labels' => [
            'name' => __( 'Paramètres' ),
            'singular_name' => __( 'Paramètres' )
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

//short code inscription
function form_inscription_shortcode() {
    ob_start();
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Créer un compte</h2>
                <form id="inscription-form">
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" name="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="motdepasse">Mot de passe</label>
                        <input type="password" class="form-control" id="motdepasse" name="motdepasse" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Créer un compte</button>
                </form>
                <div id="inscription-result"></div>
            </div>
        </div>
    </div>

    <script>
        // Envoi l'inscription à la DB
        jQuery(document).ready(function($) {
            $('#inscription-form').submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '<?php echo admin_url('admin-ajax.php'); ?>',
                    data: formData + '&action=inscription_process',
                    success: function(response) {
                        $('#inscription-result').html(response.message);
                        if (response.success) {
                            // Pop-up de remerciement (tu peux utiliser une librairie comme Bootstrap pour cela).
                            alert('Merci de votre inscription');
                            // Rediriger vers la page d'accueil après 5 secondes (5000 millisecondes).
                            setTimeout(function() {
                                window.location.href = '<?php echo home_url(); ?>';
                            }, 5000);
                        }
                    }
                });
            });
        });
    </script>
    <?php
    return ob_get_clean();
}
add_shortcode('form_inscription', 'form_inscription_shortcode');


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



