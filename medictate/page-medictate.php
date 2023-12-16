<?php /* Template Name: Medictate */ get_header(); ?>
 
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $theme = $_POST['theme'];
    $audio = $_POST['audio'];
    $duree = $_POST['duree'];
    $visuel = $_POST['visuel'];

    // Validation des données
    if (empty($duree) || empty($theme) || empty($audio) || empty($visuel)) {
        echo "Tous les champs sont requis";
    } else {
        // Création des playlists en fonction des choix. Pas de base de données, donc créé manuellement
            $playlists = array(
                'stress' => array(
                    'nature' => array(
                        '10' => array('7Vc4-FDGBxo', 'UOAwvnXf8cE', 'tIZpNrr0uX8'),
                        '20' => array('videoID1', 'videoID2', 'videoID3'),
                        '30' => array('videoID1', 'videoID2', 'videoID3')
                    ),
                    'animaux' => array(
                        '10' => array('videoID1', 'videoID2', 'videoID3'),
                        '20' => array('videoID1', 'videoID2', 'videoID3'),
                        '30' => array('videoID1', 'videoID2', 'videoID3')
                    ),
                    'classique' => array(
                        '10' => array('videoID1', 'videoID2', 'videoID3'),
                        '20' => array('videoID1', 'videoID2', 'videoID3'),
                        '30' => array('videoID1', 'videoID2', 'videoID3')
                    )
                ),
                'addiction' => array(
                    'nature' => array(
                        '10' => array('videoID1', 'videoID2', 'videoID3'),
                        '20' => array('videoID1', 'videoID2', 'videoID3'),
                        '30' => array('videoID1', 'videoID2', 'videoID3')
                    ),
                    'animaux' => array(
                        '10' => array('videoID1', 'videoID2', 'videoID3'),
                        '20' => array('videoID1', 'videoID2', 'videoID3'),
                        '30' => array('videoID1', 'videoID2', 'videoID3')
                    ),
                    'classique' => array(
                        '10' => array('videoID1', 'videoID2', 'videoID3'),
                        '20' => array('videoID1', 'videoID2', 'videoID3'),
                        '30' => array('videoID1', 'videoID2', 'videoID3')
                    )
                ),
                'concentration' => array(
                    'nature' => array(
                        '10' => array('videoID1', 'videoID2', 'videoID3'),
                        '20' => array('videoID1', 'videoID2', 'videoID3'),
                        '30' => array('videoID1', 'videoID2', 'videoID3')
                    ),
                    'animaux' => array(
                        '10' => array('videoID1', 'videoID2', 'videoID3'),
                        '20' => array('videoID1', 'videoID2', 'videoID3'),
                        '30' => array('videoID1', 'videoID2', 'videoID3')
                    ),
                    'classique' => array(
                        '10' => array('videoID1', 'videoID2', 'videoID3'),
                        '20' => array('videoID1', 'videoID2', 'videoID3'),
                        '30' => array('videoID1', 'videoID2', 'videoID3'),
                    )
                )
             );

       // Sélection de la playlist correspondant aux choix de l'utilisateur (cahcune entre crochet, car chacune correspond à un array différent)
      $selectedPlaylist = $playlists[$theme][$audio][$duree];

    // Mélanger aléatoirement la playlist
    shuffle($selectedPlaylist);

    // Récupérer la première vidéo (après le mélange aléatoire)
    $randomVideoID = $selectedPlaylist[0];  

                // Affichage de la vidéo aléatoire
    echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $randomVideoID . '" frameborder="0" allowfullscreen></iframe>';
    }
} ?>

<?php // Ajout des carrousels d'images pour chaque choix de 'visuel'

// Récupérer le choix de 'visuel' depuis le formulaire
$selectedVisuel = $_POST['visuel'];

// Vérifier si le choix de 'visuel' existe dans les carrousels
$template_directory_uri = get_template_directory_uri();

// Définir le tableau avec les URL complètes des images
$carousels = array(
    'formes_geometriques' => array(
        $template_directory_uri . '/assets/img/forme1.jpg', 
        $template_directory_uri . '/assets/img/forme2.jpg', 
        $template_directory_uri . '/assets/img/forme3.jpg'
    ),
    'paysages' => array(
        $template_directory_uri . '/assets/img/paysage1.jpg', 
        $template_directory_uri . '/assets/img/paysage2.jpg', 
        $template_directory_uri . '/assets/img/paysage3.jpg'
    ),
    'zen' => array(
        $template_directory_uri . '/assets/img/zen1.jpg', 
        $template_directory_uri . '/assets/img/zen2.jpg', 
        $template_directory_uri . '/assets/img/zen3.jpg'
    )
);

// Récupérer le choix de 'visuel' depuis le formulaire
$selectedVisuel = $_POST['visuel'];

// Vérifier si le choix de 'visuel' existe dans les carrousels
if (array_key_exists($selectedVisuel, $carousels)) {

    $selectedCarousel = $carousels[$selectedVisuel];

    // Affichage du carrousel Bootstrap avec contrôles automatiques
    echo '<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel" data-bs-interval="10000">'; // Image change toutes les 5 secondes
    echo '<div class="carousel-inner">';
    $active = 'active'; // Définir la classe active pour la première image
    
    foreach ($selectedCarousel as $image) {
        echo '<div class="carousel-item ' . $active . '" data-bs-interval="10000">';
        echo '<img src="' . $image . '" class="d-block w-100" alt="Image">';
        echo '</div>';
    }
    
    echo '</div>';
    echo '<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">';
    echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
    echo '<span class="visually-hidden">Previous</span>';
    echo '</button>';
    
    echo '<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">';
    echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
    echo '<span class="visually-hidden">Next</span>';
    echo '</button>';
    echo '</div>'; 
        }
    ?>
<?php get_footer(); ?>
