<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title> <?php bloginfo ('title'); ?> </title>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

 <header class="container-fluid bg-light">
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand mx-auto" href="<?php echo home_url('/'); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/medictate/assets/img/logo_couleur.svg" alt="Logo Medictate" width="40" height="40">
    </a>
    <a href="<?php echo esc_url( home_url( '/votre-page-dinscription' ) ); ?>"> <!-- Insérer lien réel page inscription-connexion -->
      <!-- Insérer icône pour l'inscription -->
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
        <path d="M5.5 8A2.5 2.5 0 1 1 8 5.5 2.5 2.5 0 0 1 5.5 8zm9-3h-3V4a1 1 0 0 0-2 0v1h-3a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3v3a1 1 0 0 0 2 0v-3h3a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1z"/>
      </svg> <!-- exemple icone -->
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <?php wp_nav_menu([
        'theme_location' => 'header', // localise menu
        'container' => false, // retire container
        'menu_class' => 'navbar-nav ms-auto' // classe dans <ul></ul>
      ]); ?>
      <ul class="navbar-nav ms-auto">
                    <?php if (is_user_logged_in()): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo wp_logout_url(); ?>">Déconnexion</a>
                        </li>
                    <?php endif; ?>
                </ul>
      </form>
    </div>
  </div>
</nav>
</header>
   
    
    <?php wp_body_open(); ?>
