<?php get_header(); ?>

<!-- Récupérer les tags des programmes de méditation -->
 <?php 
 $tags = get_terms(array(
    'taxonomy' => 'progs_tags', 
    'hide_empty' => false, // Afficher les tags même s'ils n'ont pas été utilisés encore
));
?>

<!-- Afficher le formulaire de filtrage par tag -->
<form action="<?php echo esc_url(home_url('/')); ?>" method="get">
    <select name="tag_filter">
        <option value="">Tous les Tags</option>
        <?php foreach ($tags as $tag) : ?>
            <option value="<?php echo esc_attr($tag->slug); ?>" <?php selected($_GET['tag_filter'], $tag->slug); ?>><?php echo esc_html($tag->name); ?></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Filtrer">
</form>

<?php
// Récupére programmes en fonction du tag sélectionné ou affiche tous les programmes s'il n'y a pas de filtre
$args = array(
    'post_type' => 'progs',
    'posts_per_page' => -1,
); ?>

<?php if (isset($_GET['tag_filter']) && !empty($_GET['tag_filter'])) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'progs_tags',
            'field' => 'slug',
            'terms' => $_GET['tag_filter'],
        ),
    );
} ?>


<!-- Affiche programmes -->
<?php $programmes = new WP_Query($args); ?>

<?php if ($programmes->have_posts()) : ?>
 <?php   while ($programmes->have_posts()) : $programmes->the_post(); ?>

        <div class="programmes">
            <a href="<?php the_permalink(); ?>">
                <h2><?php the_title(); ?></h2>
            </a>
            <div class="tags-programmes">
                <?php the_tags('Tags: ', ', ', '<br />'); ?>
            </div>
        </div>

    <?php endwhile; ?>
<?php endif; ?>

<?php wp_reset_postdata(); ?> <!-- Réinitialise les données de la requête -->

<?php get_footer(); ?>
