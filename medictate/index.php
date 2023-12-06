<?php get_header(); ?>


<main class="container my-5">
    
        <div class="col-md-6 mb-3 mb-md-0">
    <h2>Description</h2>

    <?php
    $article_id = 123; ?> <!-- Remplacer 123 par l'ID de l'article -->

   <?php // Récupère les données de l'article
    $article = get_post($article_id); ?>

    <h3><?php if ($article) {
       echo  esc_html($article->post_title); ?></h3>
        
   <article> <?php    // Affiche le contenu de l'article
        echo '<div>' . apply_filters('the_content', $article->post_content); ?> </article>
 <p> <?php  } else {
        echo 'Aucun article trouvé';
    } ?> </p>
</div>

            <div class="col-md-6">
                <h2>Personnalisation</h2>
                <div class="ratio ratio-16x9 mb-3">
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ?rel=0" title="Vidéo explicative"></iframe>
                </div>
                <a href="#" class="btn btn-primary">Ça m'intéresse</a>
            </div>
        </section>

        <section class="row mb-5">
            <div class="col-md-6 mb-3 mb-md-0 order-md-last">
                <h2>Nos programmes</h2>
                <img src="programmes.jpg" alt="Programmes préconçus" class="img-fluid">
                
                <?php
                $ProgsList = new WP_Query([
                    'post_type' => 'progs',
                ]);
                ?>

                <?php if ($ProgsList->have_posts()): ?>
                    <ul>
                        <?php while($ProgsList->have_posts()): $ProgsList->the_post(); ?>
                        <li>
                            <?php the_title() ?> - <?php the_author(); ?>
                            <a href="<?php the_permalink(); ?>">Découvrir le programme</a>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else: ?>
                    <h3>WIP</h3>
                <?php endif; ?>
                
            </div>
            
            <div class="col-md-6 order-md-first">
                <a href="#" class="btn btn-primary">Voir les programmes</a>
            </div>
        </section>

        <section class="row mb-5">
            <div class="col-md-6 mb-3 mb-md-0">
                <h2>S'inscrire</h2>
                <a href="#" class="btn btn-primary btn-lg btn-block">S'inscrire</a>
            </div>
        </section>
   
    </main>

<?php get_footer(); ?>
