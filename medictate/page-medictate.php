<?php /* Template Name: Medictate */ get_header(); ?>
 
<?php if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $theme = $_POST['theme'];
    $audio = $_POST['audio'];
    $duree = $_POST['duree'];
    $visuel = $_POST['visuel'];

// Validation des données
    if (empty($duree) || empty($theme) || empty($audio) || empty($visuel)) {
        echo "Tous les champs sont requis";
    } else {
        // Création des playlists en fonction des choix. Pas de base de données, donc créé manuellement
            $playlists = array(
                'stress' => array(
                    'nature' => array(
                        '10' => array('7Vc4-FDGBxo', 'UOAwvnXf8cE', 'tIZpNrr0uX8'),
                        '20' => array('dEmVeTsQEqQ', 'KqivhqCjPNA', 'hxIlvfTDNuE'),
                        '30' => array('J8i7v0MozjY', '1_1X9l-Igmw', 'DuBjnlGCr3c')
                    ),
                    'blancs' => array(
                        '10' => array('DqewBvd-bAA', 'tjo40K3Lscg', '1lg4eHJIi-U'),
                        '20' => array('tLtc25KKXlQ', 'UTrLuAKFJr0', 'N7MhSN5UyLY'),
                        '30' => array('gRx8EWPBRdE', 'aJYya2PjJPo', 'mwF-N6QV320')
                    ),
                    'classique' => array(
                        '10' => array('DmMNqiMNUec', 'chbCyQ3Cj5Q', 'wT5wB8KgiJE'),
                        '20' => array('jACIurNDuWA', 'dr5kIR4zhCs', 'SG9HdGZynWU'),
                        '30' => array('xWpkKQH0xco', 'ZvZ95vAHfxM', 'mdSHRjp1mJY')
                    )
                ),
                'addiction' => array(
                    'nature' => array(
                        '10' => array('4hXYRXaJdtk', 'pI2iqkW6Fw8', '4DaZ0cBIxpg'),
                        '20' => array('V-P3QhBIRHM', 'gRl0trDBrwg', 'j3fJjY0YZ4Y'),
                        '30' => array('I63sF8pZfEM', 'm6xBRts6J_E', '3WXFZzFuty0')
                    ),
                    'blancs' => array(
                        '10' => array('NZs-WK3DYpQ', 'LZYK-HqFTV4', 'LNuGsjAr9aU'),
                        '20' => array('2r02Qkwl46g', 'OEZzZz7qHaI', 'KXpHt1FvxZE'),
                        '30' => array('CpS5Ex1Wx-4', 'mwF-N6QV320', 'SniyjT0N5-0')
                    ),
                    'classique' => array(
                        '10' => array('Un3ZMgVBI7s', 'ObKJkYFMpGc', 'IiToAcBoUks'),
                        '20' => array('ohGHvRp3WtM', 'yUgJb-xDWoU', 'NMo5iCsphxI'),
                        '30' => array('FKi5AHvUeOQ', 'NiGItPUe-EI', 'ewBY6T9XqNU')
                    )
                ),
                'concentration' => array(
                    'nature' => array(
                        '10' => array('p7oVVBW_BHw', 'P1Mox-Hny7Y', 'wZH9QLcrtM8'),
                        '20' => array('_wxQGO_Pw-w', 'AfbZM584OJM', 'O6bYEpgKARE'),
                        '30' => array('qWoVaVXpiO4', 'GhqMwdP1fc8', 'YKxXs_FzgQo')
                    ),
                    'blancs' => array(
                        '10' => array('gRRbHz6WvTE', 'YIg1TwCoPVk', 'i-aJA1eTlFk'),
                        '20' => array('VfqQrVbNjXc', 'mIGUatZsjsU', '1XEoMTiK7PA'),
                        '30' => array('RfkohDtz76Q', '1o65g173sh0', 'j98SzqfU3J4')
                    ),
                    'classique' => array(
                        '10' => array('LXEeONm6hy8', 'VyidxkkniOU', '9j8JNX_pcYc'),
                        '20' => array('0L-O4hc88xA', 'Kj6QFnWWbNE', 'eMmvZJ6NmDQ'),
                        '30' => array('7IoF8Aomfrg', 'yfU6a-buJJQ', 'Cp6ElfcLB4Y'),
                    )
                )
             ); ?>
        <?php
        // Sélection de la playlist correspondant aux choix de l'utilisateur (cahcune entre crochet, car chacune correspond à un array différent)
      $selectedPlaylist = $playlists[$theme][$audio][$duree];


      
    // Mélanger aléatoirement la playlist
    shuffle($selectedPlaylist);

    // Récupérer la première vidéo (après le mélange aléatoire)
    $randomVideoID = $selectedPlaylist[0];    

  
    echo '<br><br>';

    echo '<div class="playbtn2";>';
    echo'<p> Clique sur le bouton en dessous de la flèche pour commencer la méditation<p>';
    echo '<img src="' . get_template_directory_uri() . '/assets/img/ico/btnplay/btnplayrosebas.svg"   alt="play" witdh= "100" height="100" >';

 
    echo '</div>';

    echo '<div style="text-align: center;">';
    echo '<div class="videoyt2";>';


    
    
            echo '<iframe width="280" height="280" src="https://www.youtube.com/embed/' . $randomVideoID . ' "?autoplay=1" frameborder="0" allow="autoplay; fullscreen">
                </iframe>';
                echo '</div>';
        }
    
    }


// Partie à travailler
// Ajout des carrousels d'images pour chaque choix de 'visuel'

// Récupérer le choix de 'visuel' depuis le formulaire
$selectedVisuel = $_POST['visuel'];

// Vérifier si le choix de 'visuel' existe dans les carrousels
$template_directory_uri = get_template_directory_uri();

// Définir le tableau avec les URL complètes des images
$carousels = array(
    'formes_geometriques' => array(
        $template_directory_uri . '/assets/img/forme1.jpg', 
        $template_directory_uri . '/assets/img/forme2.jpg', 
        $template_directory_uri . '/assets/img/forme3.jpg'
    ),
    'paysages' => array(
        $template_directory_uri . '/assets/img/paysage1.jpg', 
        $template_directory_uri . '/assets/img/paysage2.jpg', 
        $template_directory_uri . '/assets/img/paysage3.jpg'
    ),
    'zen' => array(
        $template_directory_uri . '/assets/img/zen1.jpg', 
        $template_directory_uri . '/assets/img/zen2.jpg', 
        $template_directory_uri . '/assets/img/zen3.jpg'
    )
);

// Récupérer le choix de 'visuel' depuis le formulaire
$selectedVisuel = $_POST['visuel'];

// Vérifier si le choix de 'visuel' existe dans les carrousels
if (array_key_exists($selectedVisuel, $carousels)) {

    $selectedCarousel = $carousels[$selectedVisuel];
    
    // Affichage du carrousel Bootstrap avec contrôles automatique carrouselresponsive
    echo '<div id="carouselExampleInterval" class="carousel slide img-fluid carrouselresponsive" data-bs-ride="carousel">'; 
    echo '<div class="carousel-inner">';
    
    // Logique pour activer les images du carrousel une à une
    $totalImages = count($selectedCarousel);
    foreach ($selectedCarousel as $key => $image) {
        $active = $key === 0 ? 'active' : ''; // Active seulement la première image au départ
        echo '<div class="carrouselresponsive";>';
        echo '<div class="carousel-item ' . $active . '">';
        echo '<img src="' . $image . '" class="d-block w-100" alt="Image">';
        echo '</div>';
        echo '</div>';
        echo '</div>';
    }
    
    echo '</div>';
    echo '</div>'; 
} ?>

    <?php get_footer(); ?>

    