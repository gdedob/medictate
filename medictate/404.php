<?php get_header(); ?>

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 text-center">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo/erreur.svg" alt="Erreur 404" class="img-fluid mb-4">


            <p>Cette page semble méditer quelque part ailleurs... Retournez à la sérénité de l'accueil</p>

            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">
            Retour à l'accueil
            </a>
        </div>
    </div>
</div>

<?php get_footer(); ?>
