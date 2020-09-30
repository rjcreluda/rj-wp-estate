<?php

function jind_theme_activate()
{
    if( version_compare( get_bloginfo('version'), '4.9', '<' ) ){
        wp_die( __('You must have a minimum version of 4.9 to use this theme') );
    }
    //delete_option( THEME_OPTION_NAME );
    $theme_opts                 = get_option( THEME_OPTION_NAME ); // retrieve the option from the database
    if ( !$theme_opts ){
        $general_opt            = array(
            'logo_type'         => 1,
            'logo_img'          => THEME_DIR_URI . '/assets/images/logo.png',
            'header'            => 'Create Lasting Wealth Through Real Home',
            'subheader'         => 'Realize your dream home',
            'footer'            => 'Copyright 2020'
        );
        $social_opt = array(
            'facebook'  => 'http://facebook.com/',
            'twitter'   => 'http://twitter.com/',
            'instagram' => 'http://instagram.com/',
            'wathsapp'   => ''
        );
        $contact_opt = array(
            'address'   => '3935 Maple Avenue',
            'email'     => 'LenaAAdams@rhyta.com',
            'phone1'    => '209-218-2129',
            'phone2'    => '209-134"-2129',
            'website'   => 'nathyericardo.com'
        );
        $appearance_opt         = array(
            'home_header_img'   => THEME_DIR_URI . '/assets/images/header-image.png',
            'page_header_img'   => THEME_DIR_URI . '/assets/images/header-property.png',
            'primary_color'     => '#25318D',
            'secondary_color'   => '#f63'
        );
        $ads_opt            = array(
            'title'       => 'Newly Added Properties',
            'subtitle'    => 'Find your dream home from our lastest properties',
            'currency'    => '$',
            'per_page'    => 5
        );

        $opts                   = array(
            'general'           => $general_opt,
            'social_network'    => $social_opt,
            'contact_info'      => $contact_opt,
            'appearance'        => $appearance_opt,
            'ads'               => $ads_opt
        );
        // adding the options to the DB
        add_option( THEME_OPTION_NAME, $opts);
    }

}
add_action( 'after_switch_theme', 'jind_theme_activate' ); // theme options

function jind_add_default_about_page(){
    // Set the title, template, etc
    $new_page_title     = __( 'About Us', THEME_TEXT_DOMAIN ); // Page's title
    $new_page_content   = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc auctor purus id sem pellentesque, id dapibus neque cursus. Donec tincidunt mattis eros quis pellentesque. Fusce faucibus, nunc ac tempus luctus, dui odio ultrices ante, nec pellentesque sapien nibh sit amet neque. Nulla ornare laoreet porttitor. Aenean ex elit, tincidunt eget nibh ut, volutpat suscipit mauris. Nam venenatis facilisis turpis vitae tincidunt. Fusce efficitur vitae nibh vel vestibulum. Pellentesque tempor mattis justo ac vestibulum. Quisque sed nunc vel lectus condimentum pulvinar. Vestibulum sit amet mattis nisl, sit amet ultrices nulla. Morbi orci nibh, pulvinar a tortor eget, convallis ultrices nibh. Integer vulputate posuere maximus.

Vestibulum consectetur neque ac nibh convallis, vel fermentum velit iaculis. Praesent eu porta eros. Nullam sit amet eros cursus, auctor est sit amet, viverra dui. In faucibus pulvinar eros, sed tempor dui lacinia quis. Donec dapibus diam dui, vitae volutpat odio tristique in. Integer vulputate elit vitae varius blandit. Sed viverra fermentum nisi, vitae venenatis ipsum pretium vulputate.

Aliquam et velit in turpis lobortis tincidunt eu porttitor nisl. Curabitur eu augue eros. Quisque luctus tortor eget mi varius, sit amet aliquam metus pharetra. Aenean at mauris turpis. Curabitur euismod at libero placerat volutpat. Maecenas non ullamcorper urna. Vivamus pretium a nisl vitae bibendum.

Curabitur tincidunt lacinia mi, rutrum sagittis erat tempus non. Nullam lorem augue, faucibus a magna et, pharetra rhoncus lorem. Praesent libero est, pharetra vitae semper et, molestie at nisl. Suspendisse porta eros quam, quis tristique odio euismod faucibus. Suspendisse potenti. Integer vulputate finibus odio ut viverra. Pellentesque tincidunt sed elit ut dictum. Aliquam ac aliquet lectus, ut imperdiet velit. Etiam gravida nunc sed viverra scelerisque. Nulla vestibulum dignissim justo ac viverra. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse pellentesque augue id iaculis vulputate. Quisque finibus venenatis laoreet. Pellentesque tincidunt justo vel scelerisque malesuada. Sed vel neque nibh.';                           // Content
    $new_page_template  = 'page-about.php';       // The template to use for the page
    $page_check = get_page_by_title($new_page_title);   // Check if the page already exists
    // Store the above data in an array
    $new_page = array(
            'post_type'     => 'page', 
            'post_title'    => $new_page_title,
            'post_content'  => $new_page_content,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_name'     => 'about-us'
    );
    // If the page doesn't already exist, create it
    if(!isset($page_check->ID)){
        $new_page_id = wp_insert_post($new_page);
        if(!empty($new_page_template)){
            update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
        }
    }
}
add_action( 'after_switch_theme', 'jind_add_default_about_page' ); 

function jind_add_default_contact_page(){
    // Set the title, template, etc
    $new_page_title     = __( 'Contact', THEME_TEXT_DOMAIN ); // Page's title
    $new_page_content   = '';                           // Content
    $new_page_template  = 'page-contact.php';       // The template to use for the page
    $page_check = get_page_by_title($new_page_title);   // Check if the page already exists
    // Store the above data in an array
    $new_page = array(
            'post_type'     => 'page', 
            'post_title'    => $new_page_title,
            'post_content'  => $new_page_content,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_name'     => 'contact-us'
    );
    // If the page doesn't already exist, create it
    if(!isset($page_check->ID)){
        $new_page_id = wp_insert_post($new_page);
        if(!empty($new_page_template)){
            update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
        }
    }
}
add_action( 'after_switch_theme', 'jind_add_default_contact_page' ); 

function jind_add_default_search_page(){
    // Set the title, template, etc
    $new_page_title     = __( 'Search for property', THEME_TEXT_DOMAIN ); // Page's title
    $new_page_content   = '';                           // Content
    $new_page_template  = 'custom-search-result.php';       // The template to use for the page
    $page_check = get_page_by_title($new_page_title);   // Check if the page already exists
    // Store the above data in an array
    $new_page = array(
            'post_type'     => 'page', 
            'post_title'    => $new_page_title,
            'post_content'  => $new_page_content,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_name'     => 'search'
    );
    // If the page doesn't already exist, create it
    if(!isset($page_check->ID)){
        $new_page_id = wp_insert_post($new_page);
        if(!empty($new_page_template)){
            update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
        }
    }
}
add_action( 'after_switch_theme', 'jind_add_default_search_page' ); 