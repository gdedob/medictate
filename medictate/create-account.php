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
            </div>
        </div>
    </div>

<?php get_footer(); ?>