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
            alt="Valider" class="btn btn-primary submit-button" style="max-width: 25%; height: auto;">
    </div>
</form>

<script>
    $(document).ready(function() {
        // Attend que le document soit chargé pour exécuter le code jQuery
        $('#formambi').submit(function(event) {
            // Lors de la soumission du formulaire, exécute la fonction
            const theme = $('input[name="theme"]:checked').val();
            const duree = $('#duree').val();
            const audio = $('input[name="audio"]:checked').val();
            const visuel = $('input[name="visuel"]:checked').val();

            const errorElement = $('#error-message');

            // Vérifie si tous les champs requis sont remplis
            if (!theme || !audio || !visuel) {

                errorElement.text('Veuillez remplir tous les champs.');
                event.preventDefault(); // Empêche l'envoi du formulaire
            }
        });
    })
</script>

<script>
    $(document).ready(function() {
        // Fonction pour vérifier si tous les champs requis sont remplis
        function checkFormValidity() {
            let isValid = true;

            // Vérification pour chaque groupe de champs
            const formGroups = [
                'input[name="theme"]',
                '#duree',
                'input[name="audio"]',
                'input[name="visuel"]'
            ];

            formGroups.forEach(function(selector) {
                if ($(selector).filter(':checked').length === 0) {
                    isValid = false;
                    return false; // Sortir de la boucle si un champ est vide
                }
            });

            return isValid;
        }

        // Fonction pour afficher le bouton avec animation ou le message d'erreur
        function displayButtonOrError() {
            if (checkFormValidity()) {
                // Afficher le bouton avec une animation
                $('.btn-primary').fadeIn().css('transform', 'rotate(360deg)');
            } else {
                // Afficher le message d'erreur
                alert('Tous les champs sont requis');
            }
        }

        // Cacher le bouton au chargement de la page
        $('.btn-primary').hide();

        // Vérifier lorsque les champs changent et appeler la fonction appropriée
        $('input, #duree').on('change', displayButtonOrError);
    });
</script>



<?php get_footer(); ?>
