<?php
// Mendaftarkan endpoint REST API untuk mendapatkan semua popup
function register_popup_routes() {
    register_rest_route('artistudio/v1', '/popup', [
        'methods'  => 'GET', // Metode HTTP yang digunakan
        'callback' => 'get_all_popups', // Fungsi yang dipanggil saat endpoint diakses
    ]);
}
add_action('rest_api_init', 'register_popup_routes');

// Callback function untuk mengambil semua popup
function get_all_popups() {
    $args = [
        'post_type'      => 'popup', // Mengambil post dengan tipe 'popup'
        'posts_per_page' => -1, // Mengambil semua popup tanpa batasan jumlah
    ];
    
    $popups = get_posts($args); // Mengambil data popup
    $data   = [];

    foreach ($popups as $popup) {
        $page = get_post_meta($popup->ID, '_popup_page', true); // Mengambil meta data halaman popup

        $data[] = [
            'title'       => $popup->post_title, // Judul popup
            'description' => apply_filters('the_content', $popup->post_content), // Konten popup dengan filter
            'page'        => !empty($page) ? $page : 'sample-page', // Jika meta kosong, gunakan default 'sample-page'
        ];
    }

    return rest_ensure_response($data); // Mengembalikan data dalam format REST API
}