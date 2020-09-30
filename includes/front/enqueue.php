<?php

function jind_enqueue()
{
	wp_register_style('jind_bootstrap', THEME_DIR_URI . '/assets/css/bootstrap.min.css');
	wp_register_style('jind_fontawesome', THEME_DIR_URI . '/assets/css/all.min.css');	wp_register_style('jind_main', THEME_DIR_URI . '/style.css');

	wp_enqueue_style('jind_bootstrap');
	wp_enqueue_style('jind_fontawesome');
	wp_enqueue_style('jind_main');

	wp_register_script('jind_jquery', THEME_DIR_URI . '/assets/js/jquery.min.js', array(), false, true);
	wp_register_script('jind_bootstrap', THEME_DIR_URI . '/assets/js/bootstrap.bundle.min.js', array('jind_jquery'), false, true);
	wp_register_script('jind_main', THEME_DIR_URI . '/assets/js/main.js', array('jind_jquery'), false, true);


	wp_enqueue_script('jind_jquery');
	wp_enqueue_script('jind_bootstrap');
	wp_enqueue_script('jind_main');
}
add_action('wp_enqueue_scripts', 'jind_enqueue');

 ?>