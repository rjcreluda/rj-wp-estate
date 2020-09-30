<?php

function jind_save_options(){
    if(!current_user_can( 'edit_theme_options')){
        wp_die('You are not allowed to be on this page');
    }
    check_admin_referer( 'jind_options_verify' );
    $opts = get_option( THEME_OPTION_NAME );

    $opts['general']['logo_type']           = absint( $_POST['jind_logo_type'] );
    $opts['general']['logo_img']            = esc_url_raw($_POST['jind_logo_file']);
    $opts['general']['header']              = sanitize_text_field($_POST['jind_header_text']);
    $opts['general']['subheader']           = sanitize_text_field($_POST['jind_subheader_text']);
    $opts['general']['footer']              = $_POST['jind_footer_text'];

    $opts['social_network']['facebook']     = sanitize_text_field( $_POST['jind_facebook'] );
    $opts['social_network']['twitter']      = sanitize_text_field( $_POST['jind_twitter'] );
    $opts['social_network']['instagram']    = sanitize_text_field( $_POST['jind_instagram'] );
    $opts['social_network']['whatsapp']     = sanitize_text_field( $_POST['jind_whatsapp'] );

    $opts['contact_info']['address']        = sanitize_text_field( $_POST['jind_address'] );
    $opts['contact_info']['email']          = sanitize_text_field( $_POST['jind_email'] );
    $opts['contact_info']['phone1']         = sanitize_text_field( $_POST['jind_phone1'] );
    $opts['contact_info']['phone2']         = sanitize_text_field( $_POST['jind_phone2'] );
    $opts['contact_info']['website']        = sanitize_text_field( $_POST['jind_website'] );

    $opts['appearance']['home_header_img']  = esc_url_raw($_POST['home_header_image_file']);
    $opts['appearance']['page_header_img']  = esc_url_raw($_POST['page_header_image_file']);
    $opts['appearance']['primary_color']    = sanitize_text_field($_POST['primary_color']);
    $opts['appearance']['secondary_color']  = sanitize_text_field($_POST['secondary_color']);

    $opts['ads']['currency']  = sanitize_text_field($_POST['currency']);
    $opts['ads']['per_page']  = absint($_POST['ads_per_page']);
    $opts['ads']['title']  = sanitize_text_field($_POST['ads_title']);
    $opts['ads']['subtitle']  = sanitize_text_field($_POST['ads_subtitle']);

    update_option( THEME_OPTION_NAME , $opts);
    wp_redirect( 'admin.php?page='. THEME_OPTION_NAME .'&status=1' );

}