<?php

function add_property_description_meta_box() {
        add_meta_box(
            'property_description_meta_box', // $id
            'Property Description', // $title
            'show_property_description_meta_box', // $callback
            'property', // $screen
            'normal', // $context
            'high' // $priority
        );
}
add_action( 'add_meta_boxes', 'add_property_description_meta_box' );

function add_property_meta_box() {
    	add_meta_box(
    		'property_fields_meta_box', // $id
    		'Property Details', // $title
    		'show_property_meta_box', // $callback
    		'property', // $screen
    		'normal', // $context
    		'high' // $priority
    	);
}
add_action( 'add_meta_boxes', 'add_property_meta_box' );
