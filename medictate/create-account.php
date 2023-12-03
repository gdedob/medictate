<?php get_header(); ?>

<h1>S'inscrire</h1>

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Créer un compte</h2>
                <form>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="motdepasse">Mot de passe</label>
                        <input type="password" class="form-control" id="motdepasse" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Créer un compte</button>
                </form>
              <div id="inscription-result"></div>
        </div>
    </div>
</div>

<script>
    // Envoi l'inscription à la DB
    jQuery(document).ready(function($) {
        $('#inscription-form').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: formData + '&action=inscription_process',
                success: function(response) {
                    $('#inscription-result').html(response.message);
                }
            });
        });
    });

//pop up remerciement
    jQuery(document).ready(function($) {
        $('#inscription-form').submit(function(e) {
            e.preventDefault();
            var formData = $(this).serialize();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                data: formData + '&action=inscription_process',
                success: function(response) {
                    $('#inscription-result').html(response.message);
                    if (response.success) {
                        // pop-up de remerciement (tu peux utiliser une librairie comme Bootstrap pour cela).
                        alert('Merci de votre inscription');
                        // Rediriger vers la page d'accueil après 5 secondes (5000 millisecondes).
                        setTimeout(function() {
                            window.location.href = '<?php echo home_url(); ?>';
                        }, 5000);
                    }
                }
            });
        });
    });
</script>

<?php get_footer(); ?>
