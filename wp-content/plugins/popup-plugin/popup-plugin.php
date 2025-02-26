<?php
if (!defined('ABSPATH')) {
    exit; // Mencegah akses langsung ke file
}

// Enqueue assets (JS dan CSS) untuk popup
function enqueue_popup_assets()
{
    wp_enqueue_script(
        'popup-js',
        plugins_url('/assets/js/popup.js', __FILE__),
        ['jquery'],
        false,
        true
    );
    wp_enqueue_style('popup-css', plugins_url('/assets/css/popup.css', __FILE__));
}
add_action('wp_enqueue_scripts', 'enqueue_popup_assets');

// Registrasi Custom Post Type (CPT) untuk popup
function register_popup_cpt()
{
    register_post_type('popup', [
        'label' => 'Popups',
        'public' => false, // Tidak ditampilkan di frontend
        'show_ui' => true, // Tampilkan di admin panel
        'supports' => ['title', 'editor'], // Field yang didukung
        'show_in_rest' => true, // Aktifkan editor blok (Gutenberg)
    ]);
}
add_action('init', 'register_popup_cpt');

// Registrasi REST API endpoint untuk mengambil data popup
function register_popup_rest_route()
{
    register_rest_route('artistudio/v1', '/popup', [
        'methods' => 'GET',
        'callback' => 'get_popup_data',
        'permission_callback' => '__return_true' // Akses tanpa autentikasi
    ]);
}
add_action('rest_api_init', 'register_popup_rest_route');

// Callback fungsi untuk mengembalikan data popup dalam format JSON
function get_popup_data()
{
    $args = [
        'post_type' => 'popup',
        'posts_per_page' => -1
    ];
    $popups = get_posts($args);

    $data = [];
    foreach ($popups as $popup) {
        $data[] = [
            'title' => get_the_title($popup->ID),
            'description' => apply_filters('the_content', $popup->post_content),
            'page' => get_post_meta($popup->ID, 'page', true) // Ambil custom field 'page'
        ];
    }

    return rest_ensure_response($data);
}

// function disable_gutenberg_for_popup($use_block_editor, $post_type)
// {
//     if ($post_type === 'popup') {
//         return false; // Gunakan Classic Editor untuk post type "popup"
//     }
//     return $use_block_editor;
// }
// add_filter('use_block_editor_for_post_type', 'disable_gutenberg_for_popup', 10, 2);