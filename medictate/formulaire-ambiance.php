<?php get_header(); ?>

<form action="traitement.php" method="post">
    <div class="form-group">
        <label for="playlist">Sélectionner une playlist :</label>
        <select class="form-control" id="playlist" name="playlist">
            <option value="youtube">Playlist YouTube</option>
            <option value="spotify">Playlist Spotify</option>
        </select>
    </div>
    <div class="form-group">
        <label for="duree">Durée (en minutes) :</label>
        <input type="number" class="form-control" id="duree" name="duree" min="5" max="30">
    </div>
    <div class="form-group">
        <label for="video">Insérer le lien de la vidéo :</label>
        <input type="text" class="form-control" id="video" name="video">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>





<!-- traite les données envoyées via le formulaire -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $playlist = $_POST['playlist'];
    $duree = $_POST['duree'];
    $video = $_POST['video']; ?>

    <!-- Validation des données (à adapter) -->
    <?php if (empty($playlist) || empty($duree) || empty($video)) {
        echo "Tous les champs sont requis";
    } else { 
        // Traite les données
        echo "Playlist sélectionnée : " . $playlist;
        echo "Durée sélectionnée : " . $duree . "minutes";
        echo "Vidéo : " . $video;

        // données pour créer l'ambiance de méditation demandée
        // Par exemple, intégrer la vidéo et jouer la playlist
        echo '<a href="lien_vers_ambiance_de_meditation"><img src="chemin_vers_image" alt="Bouton ambiance de méditation"></a>';
    }
}
?>


<?php get_footer(); ?>