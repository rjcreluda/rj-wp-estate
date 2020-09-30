<?php get_header();

$opts           = get_option( THEME_OPTION_NAME );
$header_img     = $opts['appearance']['home_header_img'];
$header_text    = $opts['appearance']['home_header_text'];
$default_img    = THEME_DIR_URI . '/assets/images/header-image.png';
$header_img = !empty($header_img) ? $header_img : $default_img;
?>

<!--=================================
 Banner
 ====================================-->
<section class="banner bg-holder bg-overlay-black-30" style="background-image: url(<?php echo $header_img; ?>);">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="text-white text-center text-shadow mb-2"><?php echo $ji_opts['header_text']; ?></h1>
        <p class="lead text-center text-white mb-4 font-weight-normal"><?php echo $ji_opts['subheader_text']; ?></p>
        <?php search_form(); ?>
      </div>
    </div>
  </div>
</section> <!--==== Banner ====== -->

<section class="section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8 wow fadeInUp">
        <div class="section-title text-center">
          <h2><?php echo $ji_opts['ads_title']; ?></h2>
          <p><?php echo $ji_opts['ads_subtitle']; ?></p>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
          $args = array(
              'post_type' => 'property', // custom post type
              'orderby' => 'date',
              'order' => 'DESC',
              'posts_per_page' => 6
          );

          $loop = new WP_Query( $args );
          if( $loop->have_posts() ):

              while( $loop->have_posts() ): $loop->the_post();
                  get_template_part('content', 'propertyhome');
              endwhile;
          endif;
          wp_reset_postdata();
      ?>
      <div class="col-12 text-center">
        <a class="btn btn-primary font-weight-bold btn-lg" href="/property-list"><i class="fas fa-plus"></i> View All properties</a>
      </div>
    </div>
  </div>
</section><!-- Property list section -->

<section class="section section-bg">
    <div class="container">

            <div class="row justify-content-center">
              <div class="col-lg-8">
                <div class="section-title text-center">
                  <h2>Our Services</h2>
                </div>
              </div>
            </div>
        <div class="row justify-content-center">
          <?php
            $loop = new WP_Query(
                array(
                    'post_type'     => 'service',
                    'orderby'       => 'post_id',
                    'order'         => 'ASC'
                )
            );
            ?>
            <?php
            while( $loop->have_posts() ) : $loop->the_post();
                ?>
                <div class="col-sm text-center">
                  <i class="fas <?php the_field('service_icon'); ?> font-xlll text-primary mb-3"></i>
                  <h5 class="mb-4"><?php the_title(); ?></h5>
                  <p><?php the_field('service_description'); ?></p>
                </div>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div><!-- ./row -->
    </div>
</section><!-- end services -->

<section class="section">
    <div class="container">
        <div class="row mt-0 mt-lg-1">
            <?php
            $pages = get_pages(array(
                'meta_key' => '_wp_page_template',
                'meta_value' => 'page-about.php'
            ));
            $id = $pages[0]->ID;
            $post = get_post($id);
            $content = apply_filters( 'the_content', $post->post_content );
            $content = substr($content, 0, 555) . ' ...';
            ?>

                <div class="col-md-4 col-sm-12">
                  <?php
                    if( has_post_thumbnail( $id ) ){
                          echo '<img class="img-thumbnail" src="'.get_the_post_thumbnail_url( 72,'full' ).'" alt="img">';
                      }
                      else{
                        echo '<img src="'.THEME_DIR_URI.'/assets/images/about.jpg" alt="about-us" class="img-fluid img-thumbnail" />';
                      }
                  ?>
                </div>
                <div class="col-lg-8 col-sm-12 mt-5">
                  <h2 class="mb-4"><?php echo $post->post_title; ?></h2>
                  <div class="lead"><?php echo $content; ?></div>
                  <a href="<?php the_permalink($id);?>" class="btn btn-primary btn-lg pull-right">Know more</a>
                </div>
                <?php
            wp_reset_postdata();
            ?>
        </div><!-- ./row -->
    </div>
</section><!-- end about -->

<?php get_footer(); ?>