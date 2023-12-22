<?php get_header(); ?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="container mt-4">
    <header class="entry-header">
    <div class="row mb-6 justify-content-center">
        <h1 class="entry-title"><?php the_title(); ?></h1>
</div>
    </header>


    <div class="entry-content">
        <?php
        the_content();

        $dureeProg = get_post_meta(get_the_ID(), 'duree_programme', true);
        if ($dureeProg) {
            echo '<p> Durée du programme : ' . esc_html($dureeProg) . '</p>';
        
        }

        $CatProg = get_post_meta(get_the_ID(), 'categorie_programme', true);
        if ($CatProg) {
            echo '<p> Catégorie du programme : ' . esc_html($CatProg) . '</p>';
        }
            ?>
    </div>

    <div>
        <!-- bouton pour commencer le programme -->
        <?php
        // Construire le lien vers la page associée au programme avec l'ID de l'article en cours
        $link_ambipreset = esc_url(home_url('/wedictate')) . '?article_id=' . get_the_ID();
        ?>
        <a href="<?php echo $link_ambipreset; ?>" class="btn">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/ico/nav/icowedictate.svg" alt="Nom de l'image"> Commencer le programme
        </a>
    </div>
    </div>
</article>





<?php get_footer();?>
