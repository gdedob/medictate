<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title><?php
        if (is_front_page()) { // Si c'est la page d'accueil
            bloginfo('name');
        } elseif (is_404()) {
            echo 'Page non trouvée';
        } else {
            wp_title(''); // Affiche le titre de la page actuelle
        }
    ?></title>
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/ico/nav/icomedictate.svg" type="image/x-icon"> <!-- pour faire apparaître l'icône du site -->

    <?php wp_head(); ?>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/header.css">
</head>
<body <?php body_class(); ?>>
    <header class="container-fluid bg-light">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid">
                <a class="navbar-brand mx-auto" href="<?php echo home_url('/'); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/logo_transp.svg" alt="Logo Medictate" width=200 height=200>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php wp_nav_menu([
                        'theme_location' => 'header', // localise menu
                        'container' => false, // retire container
                        'menu_class' => 'navbar-nav ms-auto' // classe dans ul
                    ]); ?>

                    <?php if (is_user_logged_in()): ?>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo esc_url(home_url('/profil)')); ?>">Mon profil</a> <!-- affiche bouton profil si connecté -->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo wp_logout_url(); ?>">Déconnexion</a> <!-- affiche bouton déconnexion si connecté -->
                            </li>
                        </ul>
                    <?php else: ?>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo esc_url(home_url('/connexion')); ?>">Connexion</a> <!-- affiche bouton connexion si pas connecté -->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo esc_url(home_url('/inscription')); ?>">Inscription</a>
                            </li>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>

<?php wp_body_open(); ?>
