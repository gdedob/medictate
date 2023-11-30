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

                        <!-- bouton pour commencer le programme -->
                        <a href="<?php // rediriger vers la page associée au programme" ?>" class="btn btn-primary">
                            <img src="chemin_vers_votre_image" alt="Nom de l'image">  Commencer le programme </a>
                        

                    </div>
                </article><?php the_ID(); ?>

<?php get_footer();?>
