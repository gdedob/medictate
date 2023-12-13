<?php /* Template Name: Liste Programmes */ get_header(); ?>

<main class="padding-container">

<!-- Récupérer les tags des programmes de méditation -->
<?php
 $tags = get_terms('progs_tags',);
?>


<!-- Afficher le formulaire de filtrage par tag -->
<section>
<form method="get">
    <select name="tag_filter">
        <option value="">Tous les Tags</option>
        <?php // foreach ($tags as $tag) : ?>
            <option value="<?php // echo esc_attr($tag->slug); ?>" <?php // selected($_GET['tag_filter'], $tag->slug); ?>><?php // echo esc_html($tag->name); ?></option>
        <?php // endforeach; ?>
    </select>
    <input type="submit" value="Filtrer">
</form>
</section>

<?php
$args = isset($_GET['tag_filter']) && !empty($_GET['tag_filter']) ? [
    'tax_query' => [
        [
            'taxonomy' => 'progs_tags',
            'field' => 'slug',
            'terms' => $_GET['tag_filter'],
        ],
    ],
] : [];
?>

<!-- affiche les articles -->
    <section>
        <div class="container">  
            <?php 
            $programmesList = new WP_Query([
            'posts_per_page' => -1,
            'post_type' => 'progs'
            ]);

      while ($programmesList->have_posts()): $programmesList->the_post();
    ?>
                <?php the_title(); ?>
                <a href="<?php the_permalink(); ?>">Découvrir le programme</a>
            <?php endwhile; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
