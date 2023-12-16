<?php 
/* Template Name: Wedictate */ 
get_header(); 
?>

<div class="wedictate-content">
    <?php
    // Récupérer l'ID de l'article depuis les paramètres GET de l'URL
    $current_post_id = isset($_GET['article_id']) ? intval($_GET['article_id']) : 0;

    // Vérifier si un ID d'article valide a été transmis
    if ($current_post_id) {
        // Récupérer méta-informations de l'article
        $video = get_post_meta($current_post_id, 'video_programme', true);

        // Afficher la vidéo si la méta-information est disponible
        if ($video) {
            echo '<iframe width="560" height="315" src="' . esc_url($video) . '" frameborder="0" allowfullscreen></iframe>';

            // Récupérer la valeur du champ "visuel" pour cet article
            $selected_visuel = get_post_meta($current_post_id, 'visuel_programme', true);

            // Vérifier chaque cas de la valeur du champ "visuel" et afficher le carrousel correspondant
            if ($selected_visuel === 'formes') {
                ?>
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/forme3.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <?php
            } elseif ($selected_visuel === 'paysages') {
                ?>
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/paysage1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/paysage2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/paysage3.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <?php
            } elseif ($selected_visuel === 'zen') {
                ?>
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-bs-interval="1000">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/zen1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/zen2.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/zen3.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <?php
            } else {
                // Cas par défaut si aucune valeur spécifique n'est trouvée
                echo '<p>Aucun carrousel associé à ce visuel.</p>';
            }
        } else {
            echo '<p>Aucune vidéo disponible pour ce programme.</p>';
        }
    } else {
        echo '<p>Aucun programme spécifié.</p>';
    }
    ?>
</div>

<?php get_footer(); ?>
