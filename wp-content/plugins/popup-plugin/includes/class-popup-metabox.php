<?php
// Menambahkan meta box khusus ke dalam post type 'popup'
function popup_add_custom_meta_box()
{
    add_meta_box(
        'popup_page_meta_box', // ID meta box
        'Popup Page', // Judul meta box
        'popup_page_meta_box_callback', // Callback untuk menampilkan konten meta box
        'popup', // Post type tempat meta box ditambahkan
        'side', // Posisi meta box
        'default' // Prioritas meta box
    );
}
add_action('add_meta_boxes', 'popup_add_custom_meta_box');

// Callback function untuk menampilkan input field di dalam meta box
function popup_page_meta_box_callback($post)
{
    $page = get_post_meta($post->ID, '_popup_page', true); // Mengambil nilai meta field
?>
    <label for="popup_page">Tampilkan di Halaman:</label>
    <input type="text" id="popup_page" name="popup_page" value="<?php echo esc_attr($page); ?>"
        placeholder="Contoh: sample-page">
    <p><small>Masukkan slug halaman, contoh: <code>sample-page</code></small></p>
<?php
}

// Menyimpan nilai meta box saat post disimpan
function popup_save_meta_box($post_id)
{
    if (isset($_POST['popup_page'])) { // Memeriksa apakah input dikirimkan
        update_post_meta($post_id, '_popup_page', sanitize_text_field($_POST['popup_page'])); // Menyimpan data dengan sanitasi
    }
}
add_action('save_post', 'popup_save_meta_box');


?>