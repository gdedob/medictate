<?php get_header(); ?>


<main class="container my-5">
    
    <section class="col-md-6 mb-3 mb-md-0 order-md-last text-center"> <!-- Changement de l'ordre pour mobile -->
         <h1><span class="title-medictate">Méditer</span>
            <span class="title-medictate">pour</span>
            <span class="title-medictate" id=changingWord>décompresser</span>
        </h1>
        <!-- Mettre le paragraphe en dessous du titre pour desktop -->
        <p> Medictate offre des ambiances de méditation entièrement adaptées à vos besoins individuels.</p>
        
        <section><!-- Nouvelle section pour le bouton -->
        <div class="text-center d-md-none"> <!-- bouton mobile -->
            <a href="<?php echo esc_url(home_url('/forumlaire-ambiance')); ?>" class="btn btn-primary">Lancer l'expérience</a>
        </div>
    <div class=" text-center col-md-6 d-none d-md-block">
        <a href="<?php echo esc_url(home_url('/formulaire-ambiance')); ?>" class="btn btn-primary btn-lg">Lancer l'expérience</a>
    </div>
    </section>
</section>

<section class="col-md-6 mb-3 mb-md-0">
    <h2>Les Paramètres</h2>
    <?php
    $SettingList = new WP_Query([
        'post_type' => 'setting-expl',
    ]);
    ?>
    <?php if ($SettingList->have_posts()): ?>
        <ul class="list-unstyled"> <!-- list-unstyled supprime styles de la liste -->
            <?php while ($SettingList->have_posts()): $SettingList->the_post(); ?>
                <li class="d-flex align-items-start justify-content-between"> <!-- flexbox aligne et positionne les éléments -->
                    <div>
                        <h3><?php the_title(); ?></h3>
                        <div class="content">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="d-flex align-items-center">
                        <?php the_post_thumbnail('thumbnail', ['class' => 'img-thumbnail']); ?> <!-- img-thumbnail pour rend la miniature plus petite -->
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else: ?>
        <h3>WIP</h3>
    <?php endif; ?>
</section>

    <section class="row mb-5">
        <div class="col-md-6 mb-3 mb-md-0 order-md-last">
            <h2>Essayez Wedictate</h2>
            <?php
            if (is_user_logged_in()) {
                $ProgsList = new WP_Query([
                    'post_type' => 'progs',
                    'posts_per_page' => 3,
                ]);
                if ($ProgsList->have_posts()): ?>
                    <ul>
                        <?php while ($ProgsList->have_posts()): $ProgsList->the_post(); ?>
                            <li>
                                <?php the_title(); ?>
                                <a href="<?php the_permalink(); ?>">Découvrir le programme</a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <h3>WIP</h3>
                <?php endif;
            } else {
                echo '<p>Créez votre compte et profitez d\'ambiances soigneusement conçues pour vous. Créez votre compte et testez nos ambiances vous permettant entre autres de mieux vous concentrer, déstresser, gérer vos dépendances.</p>';
            }
            ?>
        </div>
        <div>
            <?php if (is_user_logged_in()) : ?>
                <a class="btn btn-primary" href="<?php echo esc_url(home_url('/programmes')); ?>">Voir les programmes</a>
            <?php else : ?>
                <a class="btn btn-primary btn-lrg" href="<?php echo esc_url(home_url('/inscription')); ?>">S'inscrire</a>
            <?php endif; ?>
        </div>
    </section>
</main>

<script>
 // Définit un tableau de mots à afficher
 const words = [ 'se relaxer', 'se recentrer', 'se concentrer', 'harmoniser'];
    let index = 0; // Indice qui suit le mot actuel dans le tableau
    const span = document.getElementById('changingWord'); // Récupère l'élément avec l'ID chaningWord

    // Fonction pour changer le mot affiché
    function changeWord() {
      span.textContent = words[index]; // Met à jour le texte de l'élément span avec le mot actuel du tableau
      index = (index + 1) % words.length; // Passe au mot suivant dans le tableau, en bouclant lorsque la fin est atteinte
    }

    // Change le mot toutes les 5000 millisecondes (5 secondes)
    setInterval(changeWord, 5000);
    </script>

<?php get_footer(); ?>
