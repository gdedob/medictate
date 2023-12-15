<?php /* Template Name: Wedictate */ get_header(); ?>

<div class="wedictate-content">
    <?php
    // Récupérer l'ID de l'article depuis les paramètres GET de l'URL
    $current_post_id = isset($_GET['article_id']) ? intval($_GET['article_id']) : 0;

    // Vérifier si un ID d'article valide a été transmis
    if ($current_post_id) {
        // Récupérer les méta-informations de l'article
        $video = get_post_meta($current_post_id, 'video_programme', true); var_dump($video);


        // Afficher la vidéo si la méta-information est disponible
        if ($video) {
            echo '<iframe width="560" height="315" src="' . esc_url($video) . '" frameborder="0" allowfullscreen</if>rame>';
        } else {
            echo '<p>Aucune vidéo disponible pour ce programme.</p>';
        }
    } else {
        echo '<p>Aucun programme spécifié.</p>';
    }
    ?>
</div>

<?php get_footer(); ?>
