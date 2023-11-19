<?php 
// Ajouter la prise en charge des images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter automatiquement le titre du site dans l'en-tête du site
add_theme_support( 'title-tag' );




function create_posttypes() {

//formations
    register_post_type('formations', [
        'labels' => [
            'name' => __( 'Formations' ),
            'singular_name' => __( 'Formation' )
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'formations'],
        'show_in_rest' => true,
    ]);


    // Expériences professionnelles
register_post_type('exppro', [
    'labels' => [
        'name' => __( 'Expériences professionnelles' ),
        'singular_name' => __( 'Expérience professionnelle' )
    ],
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'exppro'],
]);

// Compétences
register_post_type('competences', [
    'labels' => [
        'name' => __( 'Compétences' ),
        'singular_name' => __( 'Compétence' )
    ],
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'competences'],
]);

// Langues
register_post_type('langues', [
    'labels' => [
        'name' => __( 'Langues' ),
        'singular_name' => __( 'Langue' )
    ],
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'langues'],
]);

// Centres d'intérêts
register_post_type('centreinter', [
    'labels' => [
        'name' => __( 'Centres Intérêts' ),
        'singular_name' => __( 'Centre Intérêt' )
    ],
    'public' => true,
    'has_archive' => true,
    'rewrite' => ['slug' => 'centreinter'],
]);

}
add_action('init', 'create_posttypes');


function add_your_fields_meta_box() {
    add_meta_box(
        'your_fields_meta_box', // $id
        'Détails de la Formation', // $title
        'show_your_fields_meta_box', // $callback
        'formations', // $screen
        'normal', // $context
        'high' // $priority
    );

    add_meta_box(
        'your_fields_meta_box', // $id
        'Détails des expériences professionnelles', // $title
        'show_your_fields_meta_box', // $callback
        'exppro', // $screen
        'normal', // $context
        'high' // $priority
    );
}
add_action('add_meta_boxes', 'add_your_fields_meta_box');

function show_your_fields_meta_box($post) {
    // Récupérer les valeurs existantes
    $start_date = get_post_meta($post->ID, 'start_date', true);
    $end_date = get_post_meta($post->ID, 'end_date', true);

    // Afficher les champs pour les dates
    echo '<label for="start_date">Date de début:</label>';
    echo '<input type="date" id="start_date" name="start_date" value="'.esc_attr($start_date).'"><br><br>';
    
    echo '<label for="end_date">Date de fin:</label>';
    echo '<input type="date" id="end_date" name="end_date" value="'.esc_attr($end_date).'"><br><br>';
}

function save_your_fields_meta($post_id) {
    if (array_key_exists('start_date', $_POST)) {
        update_post_meta(
            $post_id,
            'start_date',
            $_POST['start_date']
        );
    }
    if (array_key_exists('end_date', $_POST)) {
        update_post_meta(
            $post_id,
            'end_date',
            $_POST['end_date']
        );
    }
}
add_action('save_post', 'save_your_fields_meta');


?>