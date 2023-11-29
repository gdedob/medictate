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
        <div class="row py-3">
            <div class="col-12 text-center">
            <a href="<?php echo home_url('/'); ?>">
      <img src="<?php echo get_template_directory_uri(); ?>/medictate/assets/img/logo_couleur.svg" alt="Logo Medictate" width="40" height="40">
            </a>       
            </div>
        </div>
    </header>
   
    
    <?php wp_body_open(); ?>