<?php
// Récupérer l'identifiant de l'article actuel
$current_post_id = get_the_ID();

// Récupérer les méta-informations d'article
$playlist = get_post_meta($current_post_id, 'playlist_key', true); // Remplace 'playlist_key' par la clé de la méta-information de la playlist
$duree = get_post_meta($current_post_id, 'duree_programme', true); // Remplace 'duree_key' par la clé de la méta-information de la durée
$video = get_post_meta($current_post_id, 'video_key', true); // Remplace 'video_key' par la clé de la méta-information du lien vidéo

// Générer la page avec les éléments basés sur les méta-informations de l'article
// Affichage de la vidéo
echo '<iframe width="560" height="315" src="' . $video . '" frameborder="0" allowfullscreen></iframe>';

// Lecture de la playlist
if ($playlist == 'youtube') {
    // Intégrer le lecteur YouTube avec la playlist du programme sélectionné
    echo '<iframe width="560" height="315" src="lien_vers_playlist_youtube" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
} elseif ($playlist == 'spotify') {
    // Intégrer le lecteur Spotify avec la playlist du programme sélectionné
    echo '<iframe src="lien_vers_playlist_spotify" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>';
}

// Tu peux également ajouter d'autres éléments en fonction de tes besoins
?>

<?php get_footer(); ?>