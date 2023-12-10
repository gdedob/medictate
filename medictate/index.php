<?php get_header(); ?>


<main class="container my-5">
    <section class="col-md-6 mb-3 mb-md-0 order-md-first">
        <h1 id="changingTitle"> Méditer pour décompresser</h1>
        <p> Medictate offre des ambiances de méditation entièrement adaptées à vos besoins individuels.</p>
        <div><a href="#" class="btn btn-primary">Lancer l'expérience</a></div> <!-- remplacer le lien par l'outil de personnalisation -->
    </section>
    
    <section class="col-md-6 mb-3 mb-md-0">
        <h2>Les Paramètres</h2>
        <?php
        $SettingList = new WP_Query([
            'post_type' => 'setting-expl',
        ]);
        ?>
        <?php if ($SettingList->have_posts()): ?>
            <ul>
                <?php while ($SettingList->have_posts()): $SettingList->the_post(); ?>
                    <li>
                        <h3><?php the_title(); ?></h3>
                        <?php the_post_thumbnail(); ?> <!-- Affiche la miniature de l'article -->
                        <div class="content">
                            <?php the_content(); ?> <!-- Affiche le contenu de l'article -->
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
                echo '<p>Créez votre compte et profitez d\'ambiances soigneusement conçues pour vous. Créez votre compte et testez nos ambiances vous permettant entre autres de mieux vous concentrer, gérer vos dépendances, ou encore même améliorer la qualité de votre sommeil.</p>';
            }
            ?>
        </div>
        <div>
            <?php if (is_user_logged_in()) : ?>
                <a class="btn btn-primary" href="#lien_de_la_page_progslist">Voir les programmes</a>
            <?php else : ?>
                <a class="btn btn-primary" href="#lien_de_la_page_d'inscription">S'inscrire</a>
            <?php endif; ?>
        </div>
    </section>
</main>

    <script>
    const titleElement = document.getElementById('changingTitle');
    let words = titleElement.textContent.split(' '); // Divise la phrase en mots

    let meditationWords = ['se calmer', 'mieux dormir', 'se recentrer', 'se concentrer', 'harmoniser']; // Mots en lien avec la méditation
    let wordToChangeIndex = words.indexOf('décompresser'); // mot à changer

    let index = 0;

    function changeWord() {
      if (wordToChangeIndex !== -1) { // Vérifie si le mot à changer a été trouvé
        words[wordToChangeIndex] = meditationWords[index]; // Remplace le mot par un mot un autre
        titleElement.textContent = words.join(' '); // Reconstruire la phrase avec le mot changé
        index = (index + 1) % meditationWords.length; // Passer au mot suivant
      }
    }

    setInterval(changeWord, 5000); // Appel changeWord toutes les 5 secondes (5000 millisecondes)
  </script>     

<?php get_footer(); ?>
