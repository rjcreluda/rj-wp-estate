<?php
/*
 * Template Name: Property Search Page
 * description: Page template for property list
 */
get_header();
get_header('page');

$is_search = count( $_GET );
/*
if ( !wp_verify_nonce( $_GET['search_field_nonce'], basename(__FILE__) ) ) {
   print 'Sorry, your nonce did not verify.';
} else {
   // process form data
}
*/
$page_title = $is_search ? 'Search results' : 'Search';

$args = array(
    'post_type'         => 'property',
    'tax_query'         => [],
    'meta_query'        => [
        'relation'  => 'AND',
    ]
);
if( isset($_GET['theme']) && (int) $_GET['theme'] > 0 ){
    $term_id = (int) sanitize_text_field( $_GET['theme'] );
    $args['tax_query'][] = [
        'taxonomy'  => 'theme',
        'terms'     => $term_id,
        'operator'  => 'IN'
    ];
}
if( isset($_GET['type']) && !empty($_GET['type']) ){
    $type = sanitize_text_field( $_GET['type'] );
    $args['meta_query'][] = array(
        'key'       => 'property_fields',
        'value'     => $type,
        'compare'   => 'LIKE'
    );
}
if( isset($_GET['address']) && !empty($_GET['address']) ){
    $address = sanitize_text_field( $_GET['address'] );
    $args['meta_query'][] = array(
        'key'       => 'property_fields',
        'value'     => $address,
        'compare'   => 'LIKE'
    );
}

?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <section class="section">
            <div class="container">
            	<div class="row">
            		<div class="col-md-12">
            			<h2 class="text-center mb-3"><?php echo $page_title; ?></h2>
            			<?php search_form(); ?>
            		</div>
            	</div>
                <div class="row mt-5">
                	<div class="col-md-8 ">
                	<?php
                		/*$args = array(
						    'post_type'  => 'property',
						    'meta_query' => array(
						        array(
						            array ( 'key' => 'property_fields', 'value' => $type, 'compare' => 'LIKE'),
						            array( 'key' => 'property_fields', 'value' => $address, 'compare' => 'LIKE' ),
				                    'relation' => 'AND'
						        )
						    ),
						    'tax_query' => array(
					            array(
					                'taxonomy'  => 'theme',
					                //'field'     => 'slug',
					                'terms'     => $term_id,
					                'operator'  => 'IN')
					                )
						); */

                        if( $is_search ): // Run query if there was a $_GET
    						$postslist = new WP_Query( $args );
    						if( $postslist->have_posts() ):
    							while($postslist->have_posts()): $postslist->the_post();
    								get_template_part('content', 'property');
    							endwhile;
    						else:
    							echo '<h3 class="text-center">No result for your search</h3>';
    						endif;
                        endif;
                	?>
                	</div>
                	<div class="col-md-4">
                      <div class="card sidebar-card  inner-side-bar">
                       <div class="card-body">
                          <h5 class="card-title mb-3">Property Type</h5>
                          <?php property_cat_list(); ?>
                       </div>
                    </div>
                  </div>
                </div>
            </div>
            </section>
        </main>
    </div>
</div>


<?php get_footer(); ?>