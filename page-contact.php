<?php
/*
 * Template Name: Contact Page
 * description: Template for contact page
 */
get_header();
get_header('page');
?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <section class="section listing-section">
            <div class="container">
                <div class="row">
               <div class="col-lg-4 col-md-4 contact-us">
                  <div class="section-title">
                     <h2 class="mt-1 mb-5">Get In Touch</h2>
                  </div>
                  <div class="contact-address">
                    <div class="d-flex mb-3">
                  <div class="contact-address-icon">
                    <i class="fa fa-map"></i>
                  </div>
                  <div class="ml-3">
                    <h6>Address</h6>
                    <p><?php echo $ji_opts['address']; ?></p>
                  </div>
              </div>
              <div class="d-flex mb-3">
                  <div class="contact-address-icon">
                    <i class="fa fa-phone"></i>
                  </div>
                  <div class="ml-3">
                    <h6>Phone</h6>
                    <p><?php echo $ji_opts['phone']; ?></p>
                  </div>
              </div>
              <div class="d-flex mb-3">
                  <div class="contact-address-icon">
                    <i class="fa fa-envelope"></i>
                  </div>
                  <div class="ml-3">
                    <h6>Email</h6>
                    <p><?php echo $ji_opts['email']; ?></p>
                  </div>
              </div>
              <div class="d-flex mb-3">
                  <div class="contact-address-icon">
                    <i class="fa fa-globe"></i>
                  </div>
                  <div class="ml-3">
                    <h6>Website</h6>
                    <p><a href="<?php echo $ji_opts['website']; ?>"><?php echo $ji_opts['website']; ?></a></p>
                  </div>
              </div>
                  </div><!-- contact address -->
               </div>
               <form class="col-lg-8 col-md-8" name="sentMessage" id="contactForm" novalidate="">
                  <div class="section-title">
                     <h2 class="mt-1 mb-5">Email Us</h2>
                  </div>
                  <?php echo do_shortcode( '[contact-form-7 id="89" title="Main Contact Form"]' ); ?>
               </form>
            </div><!--./row -->
            </div> <!-- ./container -->
            </section><!-- ./ section -->
        </main>
    </div>
</div>

<?php get_footer(); ?>
