<?php /*Template Name: Créateur d'ambiance*/ get_header(); ?>


<form id="formambi" action="<?php echo esc_url(home_url('/medictate')); ?>" method="post">

    <div class="container mt-4">
        <!-- Thème -->
        <div class="row mb-3 justify-content-center">
        <h1>Medictate</h1>
        
            <div class="col-md-12 mb-3 mb-md-0">
            <br><br>
                <div class="card formtheme themecontenu">
                    <div class="card-body">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/pictowhite/whitetheme/icotheme.svg" 
            alt="Valider" witdh= "40" height="40">
                        <label for="theme" class="form-label text-center">Sélectionner un thème :</label>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="theme" id="theme-stress" value="stress" required>
                            <label class="form-check-label" for="theme-stress">
                                Gestion du stress
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/pictowhite/whitetheme/icostress.svg" 
            alt="Valider" witdh= "40" height="40">
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="theme" id="theme-concentration" value="concentration" required>
                            <label class="form-check-label" for="theme-concentration">
                                Amélioration de la concentration
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/pictowhite/whitetheme/icoconcentration.svg" 
            alt="Valider" witdh= "40" height="40">
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="theme" id="theme-addiction" value="addiction" required>
                            <label class="form-check-label" for="theme-addiction">
                                Gestion des addictions
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/pictowhite/whitetheme/icoaddication.svg" 
            alt="Valider" witdh= "40" height="40">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Durée, Audio, Visuel dans des cartes -->
        <div class="row row-cols-1 row-cols-md-2 justify-content-center">
        <br>  <br> 
            <div class="col mb-3 col-md-4">
            
                <div class="card d-inline-block formduree d-flex justify-content-center">
                    <div class="card-body">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/pictowhite/whitetemps/icotemps.svg" 
            alt="Valider" witdh= "40" height="40">
                        <label for="duree" class="form-label ">Selectionner la durée (en minutes) :</label>
                        
                        <br>  <br> 
                        <div class="input-group">
                            <br>
                            <input type="range" class="form-control-range" id="duree" name="duree" min="10" max="30" step="10" list="tickmarks" required>
                            <datalist id="tickmarks">
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                            </datalist>
                            <span class="value-indicator"></span>
                            <span class="error-message" id="duree-error"></span>
                            <br>  <br> 
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-3 col-md-4">
                <div class="card d-inline-block formaudio d-flex justify-content-center">
                    <div class="card-body">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/pictowhite/whiteaudiovisu/icoson.svg" 
            alt="Valider" witdh= "40" height="40">
                        <label class="form-label">Sélectionner un type d'audio :</label>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="audio" id="audio-nature" value="nature" required>
                            
                            
                          
                          
                          

                            <label class="form-check-label" for="audio-nature">
                            
                                Son de la nature 
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/pictowhite/whiteaudiovisu/icoaudionature.svg" 
            alt="Valider" witdh= "40" height="40">
                            </label>
                            
                        </div>
                        <div class="form-check">
                        
                            <input class="form-check-input" type="radio" name="audio" id="audio-classique" value="classique" required>
                            <label class="form-check-label" for="audio-classique">
                                Musique classique
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/pictowhite/whiteaudiovisu/icoaudioclassique.svg" 
            alt="Valider" witdh= "30" height="30">
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="audio" id="audio-blancs" value="blancs" required>
                            <label class="form-check-label" for="audio-blancs">
                                Bruits blancs
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/pictowhite/whiteaudiovisu/icobruitblanc.svg" 
            alt="Valider" witdh= "40" height="40">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col mb-3 col-md-4">
                <div class="card d-inline-block formvisuel d-flex justify-content-center">
                    <div class="card-body">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/pictowhite/whiteaudiovisu/icovisu.svg" 
            alt="Valider" witdh= "40" height="40">
                        <label class="form-label">Sélectionner un visuel :</label>
                        <br><br>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="visuel" id="visuel-formes" value="formes_geometriques" required>
                            <label class="form-check-label" for="visuel-formes">
                                Formes géométriques et couleurs
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/pictowhite/whiteaudiovisu/icoabstrait.svg" 
            alt="Valider" witdh= "40" height="40">
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="visuel" id="visuel-paysages" value="paysages" required>
                            <label class="form-check-label" for="visuel-paysages">
                                Paysages
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/pictowhite/whiteaudiovisu/iconature.svg" 
            alt="Valider" witdh= "40" height="40">
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="visuel" id="visuel-zen" value="zen" required>
                            <label class="form-check-label" for="visuel-zen">
                                Imagerie zen
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/pictowhite/whitetheme/icozen.svg" 
            alt="Valider" witdh= "40" height="40">
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <div class="d-flex justify-content-center ">
        <input type="image" src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/nav/icomedictate.svg" 
            alt="Valider" class="btn btnflower submit-button" witdh= "300" height="300">

            
    </div>
    <br>
    <div class="cliqueici">
    <p> Clique sur la fleur pour méditer<p>
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
       /* function displayButtonOrError() {
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