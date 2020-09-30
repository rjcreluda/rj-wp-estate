<?php

// REGISTER property POST TYPE

function property_post() {
    register_post_type( 'property',
		array(
			'labels'       => array(
                'name'       => __( 'Properties' ),
                'singular_name'       => __( 'Property' ),
                'add_new_item'          => __( 'Add New property', THEME_TEXT_DOMAIN ),
                'edit_item'             => __( 'Edit property', THEME_TEXT_DOMAIN ),
				),
			'public'       => true,
			'hierarchical' => true,
			'has_archive'  => true,
			'supports'     => array(
				'title',
				'editor',
				'thumbnail',
				)
		)
	);
	//register_taxonomy_for_object_type( 'category', 'property' );
	//register_taxonomy_for_object_type( 'post_tag', 'your_post' );
}

add_action( 'init', 'property_post' );

// REGISTER CUSTOM POST CATEGORY (TAXONOMY)

function property_taxonomy() {
    register_taxonomy(
        'theme',
        'property',
        array(
            'label' => __( 'Property type' ),
            'rewrite' => array( 'slug' => 'theme' ),
            'hierarchical' => true,
        )
    );
    // Add Default term to the taxonomy
	/*wp_insert_term(
	  'All Office Space', // the term
	  'theme', // the taxonomy
	  array(
	    'description'=> '',
	    'slug' => 'all-officee-space'
	  )
	);*/
}
add_action( 'init', 'property_taxonomy' );


// Register Service post type
function service_post_type() {
	register_post_type( 'service',
		array(
			'labels'       => array(
                'name'       => __( 'Services' ),
                'singular_name'       => __( 'Service' ),
                'add_new_item'          => __( 'Add New Service', THEME_TEXT_DOMAIN ),
                'edit_item'             => __( 'Edit Service', THEME_TEXT_DOMAIN ),
				),
			'public'       => true,
			'hierarchical' => true,
			'has_archive'  => false,
			'supports'     => array(
				'title',
				'editor',
				)
		)
	);
}
add_action( 'init', 'service_post_type' );


?>