<?php get_header(); ?>

<div class="container">
    <?php
    while (have_posts()) : the_post();
        // Vérifier s'il existe un modèle de page personnalisé pour cette page
        $custom_template = 'content-' . get_post_field('post_name');

        // Utiliser un modèle personnalisé s'il existe, sinon utiliser le modèle par défaut
        if (locate_template($custom_template . '.php') != '') {
            get_template_part($custom_template);
        } else {
            ?>
            <h1><?php the_title(); ?></h1>
            <div class="content">
                <?php the_content(); ?>
            </div>
            <?php
            // Si les commentaires sont ouverts ou s'il y a au moins un commentaire, charger le modèle de commentaires
            if (comments_open() || get_comments_number()) {
                comments_template();
            }
        }
    endwhile;
    ?>
</div>

<?php get_footer(); ?>
