<?php get_header(); ?>

<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $playlist = $_POST['playlist'];
    $duree = $_POST['duree'];
    $video = $_POST['video']; ?>

    <!-- Validation des données (à adapter selon tes besoins) -->
   <?php if (empty($playlist) || empty($duree) || empty($video)) {
        echo "Tous les champs sont requis";
    } else {
        // Génére la page avec les éléments sélectionnés
        
        //  Balises HTML nécessaires pour afficher la vidéo et la playlist

        // Exemple : Affichage de la vidéo
        echo '<iframe width="560" height="315" src="' . $video . '" frameborder="0" allowfullscreen></iframe>';
        
        // Exemple : Lecture de la playlist
        if ($playlist == 'youtube') {
            // Intégrer le lecteur YouTube avec la playlist
            echo '<iframe width="560" height="315" src="lien_vers_playlist_youtube" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>';
        } elseif ($playlist == 'spotify') {
            // Intégrer le lecteur Spotify avec la playlist
            echo '<iframe src="lien_vers_playlist_spotify" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>';
        }

        // Tu peux également ajouter d'autres éléments en fonction de tes besoins
    }
}
?>
<?php get_footer();?>