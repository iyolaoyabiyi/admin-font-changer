<?php
/*
Plugin Name: Admin Font Changer
Plugin URI: https://www.iyo.iyoandyeni.com/
Description: A WordPress plugin to change the font used in the admin interface.
* Version: 1.0
* Author: Iyo
* Author URI: https://www.iyo.iyoandyeni.com/
* License: GPL2
*/

// Enqueue admin styles and scripts
add_action( 'admin_enqueue_scripts', 'admin_font_changer_enqueue_styles_scripts' );
function admin_font_changer_enqueue_styles_scripts() {
    wp_enqueue_style( 'admin-font', plugin_dir_url( __FILE__ ) . 'css/admin-style.css' );
    wp_enqueue_script( 'admin-custom-modifications', plugin_dir_url( __FILE__ ) . 'js/admin-custom-modifications.js', array(), '1.0.0', true );
}

// Add admin menu page
add_action( 'admin_menu', 'admin_font_changer_menu' );
function admin_font_changer_menu() {
    add_options_page( 'Font Changer', 'Font Changer', 'manage_options', 'admin-font-changer', 'admin_font_changer_page' );
}

// Render admin menu page
function admin_font_changer_page() {
    if ( isset( $_POST['admin_font_submit'] ) ) {
        $selected_font = sanitize_text_field( $_POST['admin_font'] );
        update_option( 'admin_font', $selected_font );
    }

    $current_font = get_option( 'admin_font', 'Arial, sans-serif' );

    echo '<div class="wrap">';
    echo '<h1>Font Changer</h1>';
    echo '<form method="post" action="">';
    echo '<label for="admin_font">Select font:</label>';
    echo '<select id="admin_font" name="admin_font">';
    echo '<option value="Arial, sans-serif"' . ( $current_font === 'Arial, sans-serif' ? ' selected' : '' ) . '>Arial, sans-serif</option>';
    echo '<option value="Georgia, serif"' . ( $current_font === 'Georgia, serif' ? ' selected' : '' ) . '>Georgia, serif</option>';
    echo '<option value="Verdana, sans-serif"' . ( $current_font === 'Verdana, sans-serif' ? ' selected' : '' ) . '>Verdana, sans-serif</option>';
    echo '<option value="Times New Roman, serif"' . ( $current_font === 'Times New Roman, serif' ? ' selected' : '' ) . '>Times New Roman, serif</option>';
    echo '<option value="Courier New, monospace"' . ( $current_font === 'Courier New, monospace' ? ' selected' : '' ) . '>Courier New, monospace</option>';
    echo '<option value="Muli, sans-serif"' . ( $current_font === 'Muli, sans-serif' ? ' selected' : '' ) . '>Muli, sans-serif</option>';
    // Add more font options here
    echo '</select>';
    echo '<br><br>';
    echo '<input type="submit" name="admin_font_submit" class="button button-primary" value="Save Font">';
    echo '</form>';
    echo '</div>';
}