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
<?php get_footer(); ?>
