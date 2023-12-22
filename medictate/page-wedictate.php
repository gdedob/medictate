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

        echo '<br><br>';

        echo '<div class="playbtn";>';
        echo'<p> Clique sur le bouton en dessous de la flèche pour commencer la méditation<p>';
        echo '<img src="' . get_template_directory_uri() . '/assets/img/ico/btnplay/btnplayvertbas.svg"   alt="play" witdh= "100" height="100" >';

     
        echo '</div>';
       

        // Afficher la vidéo si la méta-information est disponible
    //centrer la vidéo + opacité

        echo '<div style="text-align: center;">';
        echo '<div class="videoyt";>';
       
        if ($video) {

           

            echo '<iframe width="280" height="280"  src="'  . esc_url($video) .  '" frameborder="0" allowfullscreen></iframe> ';

            
            echo '</div>';
            
            // Récupérer la valeur du champ "visuel" pour cet article
            $selected_visuel = get_post_meta($current_post_id, 'visuel_programme', true);

            // Vérifier chaque cas de la valeur du champ "visuel" et afficher le carrousel correspondant
            if ($selected_visuel === 'formes') {
                ?>
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
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
                </div>
                <?php
            } elseif ($selected_visuel === 'paysages') {
                ?>
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
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
                </div>
                <?php
            } elseif ($selected_visuel === 'zen') {
                ?>
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
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


<br><br><br><br><br><br>

<?php get_footer(); ?>
