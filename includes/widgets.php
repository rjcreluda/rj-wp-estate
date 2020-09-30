<?php

function jind_register_sidebar()
{
    register_sidebar(array(
        'name'          =>  __('First Sidebar', THEME_TEXT_DOMAIN),
        'id'            => 'jind_sidebar',
        'description'   => __('Sidebar of the theme', THEME_TEXT_DOMAIN),
        'class'         => '',
        'before_widget' => '<div class="card sidebar-card blog-single-page">
       <div class="card-body">',
        'after_widget'  => '</div></div>',
        'before_title'  => '<h5 class="card-title mb-3">',
        'after_title'   => '</h5>'
    ));
    register_sidebar(array(
        'name'          =>  __('Footer Sidebar', THEME_TEXT_DOMAIN),
        'id'            => 'jind_footer_sidebar',
        'description'   => __('Footer Sidebar of the theme', THEME_TEXT_DOMAIN),
        'class'         => '',
        'before_widget' => '<div class="col-lg-3 col-md-3">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="mb-4">',
        'after_title'   => '</h6>'
    ));
}
add_action('widgets_init', 'jind_register_sidebar');

function jind_register_widgets()
{
    register_widget('Post_Widgets');
    register_widget('Jind_Recent_Posts_Widgets');
}
add_action( 'widgets_init', 'jind_register_widgets');


