<?php
global $post;

if( has_post_thumbnail( get_the_ID() ) ){
    $thumbnail_url  = get_the_post_thumbnail_url(get_the_ID(),'full');
}
else{
    $thumbnail_url = THEME_DIR_URI.'/assets/images/placeholder.png';
}
$empty          = '<i class="fa fa-times"></i>';

$meta           = get_post_meta( $post->ID , 'property_fields', true );
$price          = (isset($meta['price']) && !empty($meta['price']) ? $meta['price'] : $empty);
$address        = (isset($meta['address']) && !empty($meta['address']) ? ucfirst($meta['address']) : 'Not specified');
$city           = (isset($meta['city']) && !empty($meta['city']) ? ucfirst($meta['city']) : 'Not specified');
$type           = (isset($meta['type']) && !empty($meta['type']) ? $meta['type'] : 'rent');; // rent or sale
$price          = $type == 'rent' ? $price . '<small> /month</small>' : $price;
$type           = 'For ' . $type;
$avail          = (isset($meta['availability']) && !empty($meta['availability']) ? $meta['availability'] : '');

//$desc           = get_post_meta( $post->ID , 'property_description_field', true );
/*$area           = ( isset($desc['area']) && $desc['area'] > 0 ? $desc['area'] : '?');
$bed            = ( isset($desc['bed']) && $desc['bed'] > 0 ? $desc['bed'] : '?');
$bath           = ( isset($desc['bath']) && $desc['bath'] > 0 ? $desc['bath'] : '?');*/

$avail_css      = $avail == 'available' ? 'success' : 'danger';

$desc           = get_post_meta( $post->ID , 'property_description_field', true );
$area           = ( isset($desc['area']) && $desc['area'] > 0 ? 'Sqft <span>' . $desc['area'] . '</span>' : $empty);
$bed            = ( isset($desc['bed']) && $desc['bed'] > 0 ? 'Bed <span>' . $desc['bed'] . '</span>' : $empty);
$bath           = ( isset($desc['bath']) && $desc['bath'] > 0 ? 'Bath <span>' . $desc['bath'] . '</span>' : $empty);

global $ji_opts;

?>


<div class="row no-gutters mb-4">
    <div class="col-lg-4">
        <div class="property-image bg-overlay-gradient-04">
            <img src="<?php echo $thumbnail_url; ?>" alt="">
            <div class="property-lable">
              <span class="badge badge-md badge-<?php echo $avail_css; ?>"><?php echo $avail;?></span>
              <span class="badge badge-md badge-warning"><?php echo $type;?> </span>
            </div>
          </div>
    </div><!-- property image -->
    <div class="col-lg-8">
        <div class="property-details">
            <div class="property-details-inner">
              <div class="property-details-inner-box">
                <div class="property-details-inner-box-left">
                  <h5 class="property-title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
                  <span class="property-address"><i class="fas fa-map-marker-alt fa-xs"></i><?php echo $address; ?></span>
                  <span class="property-agent-date"><i class="far fa-clock fa-md"></i><?php echo get_the_date( 'D M j Y' ); ?></span>
                </div>
                <div class="property-price"><?php echo $ji_opts['ads_currency'] .' '. $price; ?></div>
              </div>
              <ul class="property-info list-unstyled d-flex">
                <li class="flex-fill property-bed"><i class="fas fa-bed"></i><?php echo $bed; ?></li>
                <li class="flex-fill property-bath"><i class="fas fa-bath"></i><?php echo $bath; ?></li>
                <li class="flex-fill property-m-sqft"><i class="far fa-square"></i><?php echo $area; ?></li>
              </ul>
              <div class="mb-0 d-none d-block mt-1 property-excerpt">
                <?php
                  $content = get_the_content();
                  $content = strip_tags($content);
                  echo substr($content, 0, 110); ?>
              </div>
            </div>
          </div>
    </div>
</div><!-- property item -->