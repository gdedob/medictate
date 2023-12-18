<?php /*Template Name: Créateur d'ambiance*/ get_header(); ?>


<form id="formambi" action="<?php echo esc_url(home_url('/medictate')); ?>" method="post">
    <div class="container mt-4">
        <!-- Thème -->
        <div class="row mb-3 justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <label for="theme" class="form-label">Sélectionner un thème :</label>
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
                    </div>
                </div>
            </div>
        </div>

        <!-- Durée, Audio, Visuel dans des cartes -->
        <div class="row row-cols-1 row-cols-md-2 justify-content-center">
            <div class="col mb-3 col-md-4">
                <div class="card d-inline-block">
                    <div class="card-body">
                        <label for="duree" class="form-label">Durée (en minutes) :</label>
                        <div class="input-group">
                            <input type="range" class="form-control-range" id="duree" name="duree" min="10" max="30" step="10" list="tickmarks" required>
                            <datalist id="tickmarks">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                            </datalist>
                            <span class="value-indicator"></span>
                            <span class="error-message" id="duree-error"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-3 col-md-4">
                <div class="card d-inline-block">
                    <div class="card-body">
                        <label class="form-label">Sélectionner un type d'audio :</label>
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
                            <input class="form-check-input" type="radio" name="audio" id="audio-blancs" value="animaux" required>
                            <label class="form-check-label" for="audio-blancs">
                                Bruits blancs
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-3 col-md-4">
                <div class="card d-inline-block">
                    <div class="card-body">
                        <label class="form-label">Sélectionner un visuel :</label>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="alert alert-warning" id="error-message"></div>
    <div class="d-flex justify-content-center">
        <input type="image" src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/nav/icomedictate.svg" 
            alt="Valider" class="btn btn-primary submit-button" id="bouton-envoi" style="max-width: 25%; height: auto;">
    </div>
</form>





<script>
    $(document).ready(function() {
        // Fonction pour afficher le bouton avec animation ou le message d'erreur
        function displayButtonOrError() {
            const errorElement = $('#error-message');
            const isValid = $('input[name="theme"]:checked').length > 0 &&
                            $('#duree').val() !== '' &&
                            $('input[name="audio"]:checked').length > 0 &&
                            $('input[name="visuel"]:checked').length > 0;

            if (isValid) {
                // Afficher le bouton avec une animation
                $('.bouton-envoi').fadeIn().css('transform', 'rotate(360deg)');
                errorElement.text(''); // Effacer le message d'erreur s'il y en avait un
            } else {
                // Afficher le message d'erreur
                errorElement.text('Veuillez remplir tous les champs.');
            }
        }

        // Cacher le bouton au chargement de la page
        $('.bouton-envoi').hide();

        // Vérifier lorsque les champs changent et appeler la fonction appropriée
        $('input, #duree').on('input', displayButtonOrError);

        // Attendre la soumission du formulaire pour exécuter la vérification finale
        $('#formambi').submit(function(event) {
            const errorElement = $('#error-message');
            const isValid = $('input[name="theme"]:checked').length > 0 &&
                            $('#duree').val() !== '' &&
                            $('input[name="audio"]:checked').length > 0 &&
                            $('input[name="visuel"]:checked').length > 0;

            if (!isValid) {
                errorElement.text('Veuillez remplir tous les champs.');
                event.preventDefault(); // Empêcher l'envoi du formulaire si des champs sont vides
            }
        });
    });
</script>

<script> //affichage de la durée à côté du curseur
    // Récupération de l'élément range et de l'élément pour afficher la valeur
    const range = document.getElementById('duree');
    const valueIndicator = document.querySelector('.value-indicator');

    // Écouteur d'événements pour détecter les changements sur le range
    range.addEventListener('input', function() {
        // Récupération de la valeur sélectionnée sur le range
        const value = this.value;
        // Calcul de la position pour placer l'indicateur de valeur
        const position = (value / parseInt(this.max)) * 100;
        // Affichage de la valeur sélectionnée dans l'élément span
        valueIndicator.textContent = value;
        // Placement de l'indicateur de valeur à côté du curseur
        valueIndicator.style.left = `calc(${position}% + (${8 - position * 0.15}px))`;
    });
</script>


<?php get_footer(); ?>
