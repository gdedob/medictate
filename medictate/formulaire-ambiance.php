<?php /*Template Name: Créateur d'ambiance*/ get_header(); ?>


<form action="<?php echo esc_url(home_url('/medictate')); ?>" method="post">
    <div class="form-group">
        <label>Sélectionner un thème :</label><br>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="theme" id="theme-stress" value="stress" required>
            <label class="form-check-label" for="theme-stress">
                Gestion du stress
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="theme" id="theme-concentration" value="concentration" required>
            <label class="form-check-label" for="theme-concentration">
                Amélioration de la concentration
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="theme" id="theme-addiction" value="addiction" required>
            <label class="form-check-label" for="theme-addiction">
                Gestion des addictions
            </label>
        </div>
        <span class="error-message" id="theme-error"></span>
    </div>

    <div class="form-group">
        <label for="duree">Durée (en minutes) :</label>
        <input type="range" class="form-control-range" id="duree" name="duree" min="10" max="30" step="10" list="tickmarks" required>
        <datalist id="tickmarks">
            <option value="10">10</option>
            <option value="20">20</option>
            <option value="30">30</option>
        </datalist>
        <span class="error-message" id="duree-error"></span>
    </div>

    <div class="form-group">
        <label>Sélectionner un type d'audio :</label><br>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="audio" id="audio-nature" value="nature" required>
            <label class="form-check-label" for="audio-nature">
                Sons de la nature
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="audio" id="audio-classique" value="classique" required>
            <label class="form-check-label" for="audio-classique">
                Musique classique
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="audio" id="audio-animaux" value="animaux" required>
            <label class="form-check-label" for="audio-animaux">
                Bruits d'animaux
            </label>
        </div>
    </div>

    <div class="form-group">
        <label>Sélectionner un visuel :</label><br>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="visuel" id="visuel-formes" value="formes_geometriques" required>
            <label class="form-check-label" for="visuel-formes">
                Formes géométriques et couleurs
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="visuel" id="visuel-paysages" value="paysages" required>
            <label class="form-check-label" for="visuel-paysages">
                Paysages
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="visuel" id="visuel-zen" value="zen" required>
            <label class="form-check-label" for="visuel-zen">
                Imagerie zen
            </label>
        </div>
        <span class="error-message" id="visuel-error"></span>
    </div>

    <button type="submit" class="btn btn-primary">Valider</button>
</form>





<!-- traite les données envoyées via le formulaire -->

    <!-- Validation des données (à adapter) -->
    <?php if (empty($duree) || empty($theme) || empty($audio) || empty($visuel)) {
        echo '<div class="alert alert-danger" role="alert">Tous les champs sont requis</div>';
    } else { 
        // Traite les données
        echo "Thème sélectionné : " . $theme;
        echo "Durée sélectionnée : " . $duree . " minutes";
        echo "Audio : " . $audio;
        echo "Visuel : " . $visuel;

        // données pour créer l'ambiance de méditation demandée
        // Par exemple, intégrer la vidéo et jouer la playlist
        echo '<a href="lien_vers_ambiance_de_meditation"><img src="chemin_vers_image" alt="Bouton ambiance de méditation"></a>';

        // Afficher les vidéos de la playlist sélectionnée (maintenant dans un ordre aléatoire)
        foreach ($selectedPlaylist as $videoID) {
            echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/' . $videoID . '" frameborder="0" allowfullscreen></iframe>';
        }
    }
    
?>
<script>
    $(document).ready(function() {
        // Attend que le document soit chargé pour exécuter le code jQuery
        $('#myForm').submit(function(event) {
            // Lors de la soumission du formulaire, exécute la fonction
            const theme = $('input[name="theme"]:checked').val();
            const duree = $('#duree').val();
            const audio = $('input[name="audio"]:checked').val();
            const visuel = $('input[name="visuel"]:checked').val();

            const errorElement = $('#form-error');
            let isValid = true;

            // Vérifie si tous les champs requis sont remplis
            if (!theme || !duree || !audio || !visuel) {
                isValid = false;
            }

            // Si des champs requis ne sont pas remplis, arrête la soumission du formulaire et affiche un message d'erreur
            if (!isValid) {
                errorElement.text('Veuillez remplir tous les champs.');
                event.preventDefault(); // Empêche l'envoi du formulaire
            }
        });
    })
</script>



<?php get_footer(); ?>
