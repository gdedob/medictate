<?php /*Template Name: Programmes */ get_header(); ?>

<?php
// Initialisation des tableaux pour les catégories et durées
$categories = array();
$durations = array();

// Requête pour récupérer tous les articles du type 'progs'
$progs_query = new WP_Query(array(
    'post_type' => 'progs', // Spécifie le type de post 'progs'
    'posts_per_page' => -1, // Récupère tous les articles
));

// Vérifie si des articles sont trouvés
if ($progs_query->have_posts()) {
    while ($progs_query->have_posts()) {
        $progs_query->the_post();

        // Récupère l'ID de l'article 'progs' actuel
        $programme_id = get_the_ID();

        // Récupère les valeurs pour 'categorie_programme' et 'duree_programme' pour chaque article
        $programme_categories = get_post_meta($programme_id, 'categorie_programme', true);
        $programme_durations = get_post_meta($programme_id, 'duree_programme', true);

        // Ajoute les valeurs récupérées aux tableaux s'ils existent et ne sont pas déjà présentes
        if (!empty($programme_categories) && !in_array($programme_categories, $categories)) {
            $categories[] = $programme_categories;
        }

        if (!empty($programme_durations) && !in_array($programme_durations, $durations)) {
            $durations[] = $programme_durations;
        }
    }
} ?>

<section class="container mt-5">
    <form method="get" class="row g-3">
        <!-- Sélecteur pour filtrer par catégorie -->
        <div class="col-md-6">
            <select name="category_filter" class="form-select">
                <option value="">Toutes les Catégories</option>
                <?php foreach (array_unique($categories) as $category) : ?>
                    <option value="<?php echo esc_attr($category); ?>"><?php echo esc_html($category); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Sélecteur pour filtrer par durée -->
        <div class="col-md-6">
            <select name="duration_filter" class="form-select">
                <option value="">Toutes les Durées</option>
                <?php foreach (array_unique($durations) as $duration) : ?>
                    <option value="<?php echo esc_attr($duration); ?>"><?php echo esc_html($duration); ?> minutes</option>
                <?php endforeach; ?>
            </select>
        </div>

        <div>
            <input type="submit" value="Filtrer" class="btn btn-primary">
        </div>
    </form>
</section>

<?php
$args = [
    'post_type' => 'progs',
    'posts_per_page' => -1,
    'meta_query' => [], // Initialise le tableau pour les filtres de métadonnées
];

// Ajout des filtres s'ils sont sélectionnés
if (isset($_GET['category_filter']) && $_GET['category_filter'] !== '') {
    $args['meta_query'][] = [
        'key' => 'categorie_programme',
        'value' => $_GET['category_filter'],
    ];
}

if (isset($_GET['duration_filter']) && $_GET['duration_filter'] !== '') {
    $args['meta_query'][] = [
        'key' => 'duree_programme',
        'value' => $_GET['duration_filter'],
    ];
}

$programmesList = new WP_Query($args);
?>

<section class="container mt-5">
    <div class="row">
        <?php while ($programmesList->have_posts()) : $programmesList->the_post(); ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php the_title(); ?></h5>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Découvrir le programme</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>
