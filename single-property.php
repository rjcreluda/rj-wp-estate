<?php get_header(); get_header('page'); ?>

<?php
global $post;
$empty          = '<span class="fa fa-times"></span>';
$meta           = get_post_meta( $post->ID , 'property_fields', true );
$ref            = (isset($meta['refid']) && !empty($meta['refid']) ? $meta['refid'] : $empty);
$price          = (isset($meta['price']) && !empty($meta['price']) ? $meta['price'] : $empty);
$address        = (isset($meta['address']) && !empty($meta['address']) ? $meta['address'] : 'Address not specified');
$city           = (isset($meta['city']) && !empty($meta['city']) ? $meta['city'] : $empty);
$state          = (isset($meta['state']) && !empty($meta['state']) ? $meta['state'] : $empty);
$zipcode        = (isset($meta['zipcode']) && !empty($meta['zipcode']) ? $meta['zipcode'] : 'Not specified');
$type           = (isset($meta['type']) && !empty($meta['type']) ? $meta['type'] : 'rent'); // rent default
$price          = $type == 'rent' ?  $price . '<small> /month</small>' : $price;
$type           = 'For '. $type;
$availability   = (isset($meta['availability']) && !empty($meta['availability']) ? $meta['availability'] : 'Available');
$photos         = (isset($meta['photos']) && !empty($meta['photos']) ? $meta['photos'] : false);


$desc           = get_post_meta( $post->ID , 'property_description_field', true );
$area           = ( isset($desc['area']) && $desc['area'] > 0 ? $desc['area'].' sqft' : $empty);
$bed            = ( isset($desc['bed']) && $desc['bed'] > 0 ? $desc['bed'] . ' Bedrooms' : $empty);
$bath           = ( isset($desc['bath']) && $desc['bath'] > 0 ? $desc['bath'] . ' Bathrooms' : $empty);
$room           = ( isset($desc['room']) && $desc['room'] > 0 ? $desc['room'] . ' Rooms' : $empty);
$floor          = ( isset($desc['floor']) && $desc['floor'] > 0 ? $desc['floor'] . ' Floor' : $empty);
$garage         = ( isset($desc['garage']) && $desc['garage'] > 0 ? $desc['garage'] . ' Garages' : $empty);

$terms = get_the_terms( $post->ID, 'theme' ); // get list of attached terms in theme taxonomy
if( !empty( $terms ) && !is_wp_error( $terms ) ){
  $cats = wp_list_pluck( $terms, 'name' );
  $cat = $cats[0];
}
else{
  $cat = '';
}
global $ji_opts;
?>

<div class="property-single-title property-single-title-gallery">
    <div class="container">
           <div class="row">
              <div class="col-lg-8 col-md-8">
                 <h1><?php echo get_the_title($post->ID); ?></h1>
                 <h6><i class="mdi mdi-home-map-marker"></i><?php echo $address; ?></h6>
              </div>
              <div class="col-lg-4 col-md-4 text-right">
                 <h6 class="mt-2"><?php echo __($cat .' '. $type, THEME_TEXT_DOMAIN); ?></h6>
                 <h2 class="price"><?php echo $ji_opts['ads_currency'] .' '.$price; ?></h2>
              </div>
           </div>
           <hr>
           <div class="row">
              <div class="col-lg-8 col-md-8">
                 <p class="mt-1 mb-0"><strong><?php echo __('Property ID', THEME_TEXT_DOMAIN); ?></strong> : <?php echo strtoupper($ref);?> </p>
              </div>
           </div>
    </div>
</div><!-- end single property title -->

<section id="main">
    <section class="section">
        <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8 blog-posts">
                <?php if($photos) :?>
                <div class="car property-single-slider">
                     <div class="card-body samar-slider pl-0 pr-0 pt-0 pb-0">
                        <div id="property-carousel" class="carousel slide" data-ride="carousel">
                          <div class="carousel-inner">
                            <?php for($i = 0; $i < sizeof($photos); $i++):?>
                                <div class="carousel-item <?php echo $i == 0 ? 'active' : '';?>">
                                  <img class="d-block w-100" src="<?php echo $photos[$i]; ?>" alt="slide">
                                </div>
                            <?php endfor;?>
                          </div>
                          <a class="carousel-control-prev" href="#property-carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="carousel-control-next" href="#property-carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                     </div>
               </div><!-- ./slider card -->
           <?php endif; ?>
               <!-- Property description -->
                  <div class="card padding-card property-single-slider">
                     <div class="card-body">
                        <h5 class="card-title mb-3">Description</h5>
                        <div class="row">
                           <div class="col-lg-4 col-md-4">
                              <div class="list-icon">
                                 <i class="far fa-square"></i>
                                 <strong>Area:</strong>
                                 <p class="mb-0"><?php echo $area; ?></p>
                              </div>
                           </div>
                           <div class="col-lg-4 col-md-4">
                              <div class="list-icon">
                                 <i class="fa fa-bed"></i>
                                 <strong>Beds:</strong>
                                 <p class="mb-0"><?php echo __($bed, THEME_TEXT_DOMAIN); ?></p>
                              </div>
                           </div>
                           <div class="col-lg-4 col-md-4">
                              <div class="list-icon">
                                 <i class="fas fa-bath"></i>
                                 <strong>Baths:</strong>
                                 <p class="mb-0"><?php echo __($bath, THEME_TEXT_DOMAIN); ?></p>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-4 col-md-4">
                              <div class="list-icon">
                                 <i class="fa fa-bed"></i>
                                 <strong>Rooms:</strong>
                                 <p class="mb-0"><?php echo __($room, THEME_TEXT_DOMAIN); ?></p>
                              </div>
                           </div>
                           <div class="col-lg-4 col-md-4">
                              <div class="list-icon">
                                 <i class="fa fa-stop"></i>
                                 <strong>Floors:</strong>
                                 <p class="mb-0"><?php echo __($floor, THEME_TEXT_DOMAIN); ?></p>
                              </div>
                           </div>
                           <div class="col-lg-4 col-md-4">
                              <div class="list-icon">
                                 <i class="fa fa-truck"></i>
                                 <strong>Garage:</strong>
                                 <p class="mb-0"><?php echo __($garage, THEME_TEXT_DOMAIN); ?></p>
                              </div>
                           </div>
                        </div>
                        <?php while ( have_posts() ) : the_post();
                                the_content();
                                endwhile; ?>
                     </div>
                  </div><!-- end property description -->
                  <!-- Property Location -->
                  <div class="card padding-card property-single-slider">
                     <div class="card-body">
                        <h5 class="card-title mb-3">Location</h5>
                        <div class="row mb-3">
                           <div class="col-lg-6 col-md-6">
                              <p><strong class="text-dark">Address :</strong> <?php echo $address;?></p>
                              <p><strong class="text-dark">State :</strong> <?php echo $state;?></p>
                           </div>
                           <div class="col-lg-6 col-md-6">
                              <p><strong class="text-dark">City :</strong> <?php echo $city;?></p>
                              <p><strong class="text-dark">Zip/Postal Code  :</strong> <?php echo $zipcode;?></p>
                           </div>
                        </div>
                        <div id="map"></div>
                     </div>
                  </div><!-- end property location -->
            </div>

            <div class="col-sm-4 blog-sidebar">
                <?php get_sidebar('property'); ?>
            </div>
        </div>
    </div>
    </section>
</section>

<?php get_footer(); ?>