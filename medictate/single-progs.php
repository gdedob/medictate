<?php get_header(); ?>

        
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
                        <h1 class="entry-title"><?php the_title(); ?></h1>
                    </header>

                    <div class="entry-content">
                        <?php
                        the_content();

                        $duree_programme = get_post_meta(get_the_ID(), 'duree_programme', true);
                        if ($duree_programme) {
                            echo '<p> Durée du programme : ' . esc_html($duree_programme) . '</p>';
                        }
                        ?>
                                
                <div>
                        <!-- bouton pour commencer le programme -->
        <?php
        // Récupérer l'ID de la page associée au programme (à remplacer par l'ID réel)
        $id_page_ambipreset= 123; // Remplace 123 par l'ID de la page d'ambiance preset'

        // Construire le lien vers la page associée au programme avec l'ID de l'article en cours
        $link_ambipreset = esc_url(get_permalink($id_page_programme) . '?article_id=' . get_the_ID());
        ?> <!--- Ca redirige vers l'ambiance preset -->

        <a href="<?php echo $link_ambipreset; ?>" class="btn btn-primary">
            <img src="chemin_vers_votre_image" alt="Nom de l'image"> Commencer le programme
        </a>
                        

                    </div>
                </article><?php the_ID(); ?>

<?php get_footer();?>
