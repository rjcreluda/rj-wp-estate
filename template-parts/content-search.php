<?php
global $post;

if( has_post_thumbnail( get_the_ID() ) ){
    $thumbnail_url  = get_the_post_thumbnail_url(get_the_ID(),'full');
}
else{
    $thumbnail_url = THEME_DIR_URI.'/assets/images/placeholder.png';
}

?>


<div class="row no-gutters mb-4">
    <div class="col-lg-4">
        <div class="property-image bg-overlay-gradient-04">
            <img src="<?php echo $thumbnail_url; ?>" alt="">
          </div>
    </div><!-- property image -->
    <div class="col-lg-8">
        <div class="property-details">
            <div class="property-details-inner">
              <div class="property-details-inner-box">
                <div class="property-details-inner-box-left">
                  <h5 class="property-title"><a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a></h5>
                  <span class="property-agent-date"><i class="far fa-clock fa-md"></i><?php echo get_the_date( 'D M j Y' ); ?></span>
                </div>
              </div>
              <div class="mb-0 d-none d-block mt-1 property-excerpt">
                <?php
                  $content = get_the_content();
                  $content = strip_tags($content);
                  //echo substr($content, 0, 100);
                  the_excerpt();
                   ?>
              </div>
            </div>
          </div>
    </div>
</div><!-- property item -->