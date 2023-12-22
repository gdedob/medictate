<?php /* Template Name: Programmes */ 
get_header();

// Initialisation des tableaux pour les catégories, durées et visuels
$categories = $durations = $visuels = [];

// Récupération des métadonnées pour chaque article 'progs'
$progs_query = new WP_Query([
    'post_type' => 'progs',
    'posts_per_page' => -1,
]);

if ($progs_query->have_posts()) {
    while ($progs_query->have_posts()) {
        $progs_query->the_post();

        // Récupération des valeurs pour chaque métadonnée
        $programme_id = get_the_ID();
        $programme_categories = get_post_meta($programme_id, 'categorie_programme', true);
        $programme_durations = get_post_meta($programme_id, 'duree_programme', true);
        $programme_visuels = get_post_meta($programme_id, 'visuel_programme', true);

        // Ajout des valeurs uniques aux tableaux correspondants
        $categories[] = $programme_categories;
        $durations[] = $programme_durations;
        $visuels[] = $programme_visuels;
    }

    // Retirer les doublons et les valeurs vides
    $categories = array_unique(array_filter($categories));
    $durations = array_unique(array_filter($durations));
    $visuels = array_unique(array_filter($visuels));
}

?>
<div class="container mt-4 zerohate">
 
        <p>Wedictate</p>
 
</div>

<section class="container mt-5">
    <form method="get" class="row g-3">
        <?php
        // Tableau associatif pour les filtres avec leurs options
        $filters = [
            'category_filter' => [
                'label' => 'Catégorie',
                'options' => array_unique($categories),
                'placeholder' => 'Toutes les Catégories',
            ],
            'duration_filter' => [
                'label' => 'Durée',
                'options' => array_unique($durations),
                'placeholder' => 'Toutes les Durées',
                'suffix' => ' minutes',
            ],
            'visuel_filter' => [
                'label' => 'Visuel',
                'options' => array_unique($visuels),
                'placeholder' => 'Tous les Visuels',
            ],
        ];
        ?>

        <?php  // Génère les sélecteurs de filtre
        foreach ($filters as $filter_name => $filter_data) : ?>
            <div class="col-md-6">
                <select name="<?php echo esc_attr($filter_name); ?>" class="form-select">
                    <option value=""><?php echo esc_html($filter_data['placeholder']); ?></option>
                    <?php foreach ($filter_data['options'] as $option) : ?>
                        <?php $value = esc_attr($option); ?>
                        <?php $label = esc_html($option . ($filter_data['suffix'] ?? '')); ?>
                        <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        <?php endforeach; ?>

        <div class="col-md-12">
            <input type="submit" value="Filtrer" class="btn btnprogram">
        </div>
    </form>
</section>

<?php
$args = [
    'post_type' => 'progs',
    'posts_per_page' => -1,
    'meta_query' => [], // Initialise le tableau pour les filtres de métadonnées
];

// Liste des filtres disponibles et leurs clés de métadonnées correspondantes
$filters = [
    'category_filter' => 'categorie_programme',
    'duration_filter' => 'duree_programme',
    'visuel_filter' => 'visuel_programme',
];

// Ajout des filtres s'ils sont sélectionnés
foreach ($filters as $filter => $meta_key) {
    if (isset($_GET[$filter]) && $_GET[$filter] !== '') {
        $args['meta_query'][] = [
            'key' => $meta_key,
            'value' => $_GET[$filter],
        ];
    }
}

$programmesList = new WP_Query($args);
?>

<section class="container mt-5">
    <div class="row">
        <?php while ($programmesList->have_posts()) : $programmesList->the_post(); ?>
            <div class="col-md-4 mb-4">
                <div class="card btnprogramma">
                    <div class="card-body">
                        <br>
                        <h5 class="card-title programatitre"><?php the_title(); ?></h5>

                        <br><br>
                        <a href="<?php the_permalink(); ?>" class="btn btnprogramma2">Découvrir le programme</a>
                    </div>

                    <br>

</div>
            </div>
            
        <?php endwhile; ?>
    </div>

    <br><br>

    <p class= "herorecomethesun"> L’équipe de Medictate a méticuleusement conçu ces ambiances avec une attention particulière, afin de vous offrir une expérience de méditation soigneusement élaborée</p>
</section>

<?php get_footer(); ?>
