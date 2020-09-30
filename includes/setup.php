<?php

/**
* Menu setup
 */
function jind_setup_theme()
{
	register_nav_menu('primary', __('Primary Menu', THEME_TEXT_DOMAIN));
	//register_nav_menu('footer', __('Footer Menu', THEME_TEXT_DOMAIN));
}
add_action('after_setup_theme', 'jind_setup_theme');


/**
* Add class to nav item anchor
 */
add_filter( 'nav_menu_link_attributes', 'jind_menu_add_class', 10, 3 );

function jind_menu_add_class( $atts, $item, $args ) {
    $class = 'nav-link';
    $atts['class'] = $class;
    return $atts;
}

if ( ! class_exists( 'wp_bootstrap_navwalker' ) ) {
    require_once( THEME_DIR . '/includes/wp_bootstrap_navwalker.php');
}