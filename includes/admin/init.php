<?php
function jind_admin_init()
{
    include('enqueue.php');
    add_action('admin_enqueue_scripts', 'jind_admin_enqueue');
    add_action( 'admin_post_jind_save_options', 'jind_save_options'); // in process/save_options.php
}
add_action('admin_init', 'jind_admin_init');