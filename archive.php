<?php
get_header();
get_header('page');
?>

<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center">
          <h2><?php the_archive_description('<div class="taxonomy-description">', '</div>'); ?></h2>
        </div>
      </div>
    </div>
    <div class="row">
    	<div class="col-md-8">
    		<?php
				if ( have_posts() ) {
				    while ( have_posts() ) {
				        the_post();
				        get_template_part('content', 'property');

				    }
				}
				else{
					echo '<h2>No post found</h2>';
				}
				wp_reset_postdata();
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

<?php get_footer(); ?>