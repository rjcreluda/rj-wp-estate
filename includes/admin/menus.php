<?php

function jind_admin_menus()
{
    add_menu_page(
        'Theme Options', // page title
        'Theme Options', // Menu on admin dashboard
        'edit_theme_options', // capabilities(only super admin and admin)
        THEME_OPTION_NAME, // url
        'jind_theme_opts_page' // function will be called
    );
}
add_action('admin_menu', 'jind_admin_menus');