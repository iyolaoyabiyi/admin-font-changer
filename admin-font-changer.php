<?php
/*
Plugin Name: Admin Font Changer
Plugin URI: https://www.iyo.iyoandyeni.com/
Description: A WordPress plugin to change the font used in the admin interface.
Version: 1.0
Author: Iyo
Author URI: https://www.iyo.iyoandyeni.com/
License: GPL2
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
    add_options_page( 'Admin Font Changer', 'Admin Font Changer', 'manage_options', 'admin-font-changer', 'admin_font_changer_page' );
}

// Render admin menu page
function admin_font_changer_page() {
    if ( isset( $_POST['admin_font_submit'] ) ) {
        $selected_font = sanitize_text_field( $_POST['admin_font'] );
        update_option( 'admin_font', $selected_font );
    }

    $current_font = get_option( 'admin_font', 'Arial, sans-serif' );

    ?>
    <div class="wrap">
        <h1>Admin Font Changer</h1>
        <form method="post" action="">
            <label for="admin_font">Select font:</label>
            <select id="admin_font" name="admin_font">
                <option value="Arial, sans-serif"<?php selected( $current_font, 'Arial, sans-serif' ); ?>>Arial, sans-serif</option>
                <option value="Georgia, serif"<?php selected( $current_font, 'Georgia, serif' ); ?>>Georgia, serif</option>
                <option value="Verdana, sans-serif"<?php selected( $current_font, 'Verdana, sans-serif' ); ?>>Verdana, sans-serif</option>
                <option value="Times New Roman, serif"<?php selected( $current_font, 'Times New Roman, serif' ); ?>>Times New Roman, serif</option>
                <option value="Courier New, monospace"<?php selected( $current_font, 'Courier New, monospace' ); ?>>Courier New, monospace</option>
                <option value="Muli, sans-serif"<?php selected( $current_font, 'Muli, sans-serif' ); ?>>Muli, sans-serif</option>
                <!-- Add more font options here -->
            </select>
            <br><br>
            <input type="submit" name="admin_font_submit" class="button button-primary" value="Save Font">
            <?php wp_nonce_field( 'admin_font_changer_nonce', 'admin_font_changer_nonce' ); ?>
        </form>
    </div>
    <?php
}

// Add inline styles for font change
add_action( 'admin_print_styles', 'admin_font_changer_add_inline_styles' );
function admin_font_changer_add_inline_styles() {
    if ( isset( $_POST['admin_font_submit'] ) && check_admin_referer( 'admin_font_changer_nonce', 'admin_font_changer_nonce' ) ) {
        $selected_font = sanitize_text_field( $_POST['admin_font'] );
        update_option( 'admin_font', $selected_font );
    }

    $current_font = get_option( 'admin_font', 'Arial, sans-serif' );
    $custom_css = "
        body,
        button,
        input,
        select,
        textarea {
            font-family: {$current_font}, Arial, sans-serif !important;
        }
    ";
    wp_add_inline_style( 'wp-admin', $custom_css );
}