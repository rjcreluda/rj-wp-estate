<?php
function jind_admin_enqueue()
{
    // we stopped the script if the page is not our page of theme option
    if( !isset($_GET['page']) || $_GET['page'] != THEME_OPTION_NAME ){
        return;
    }
    wp_register_style('jind_bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    wp_register_style('jind_fontawesome', get_template_directory_uri() . '/assets/css/font-awesome.min.css');

    wp_enqueue_style('jind_bootstrap');
    wp_enqueue_style('jind_fontawesome');

    wp_register_script('jind_popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), false, true);
    wp_register_script('jind_bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), false, true);
    wp_register_script('jind_option', get_template_directory_uri() . '/includes/admin/options.js', array(), false, true);

    wp_enqueue_media(); // wordpress media library

    wp_enqueue_script('jind_popper');
    wp_enqueue_script('jind_bootstrap');
    wp_enqueue_script('jind_option');
}

/* Add external css to wp_admin page */
add_action( 'admin_enqueue_scripts', 'rv_custom_wp_admin_style_enqueue' );
function rv_custom_wp_admin_style_enqueue() {
    wp_enqueue_style( 'custom_wp_admin_css', get_template_directory_uri() . '/assets/css/all.min.css', false, '1.0.0' );
}