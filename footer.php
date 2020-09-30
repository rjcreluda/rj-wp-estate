<?php global $ji_opts; ?>
<!-- Footer -->
        <section class="section-footer footer">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-3">
                  <h6 class="mb-4"><?php echo __('Our contact Info', THEME_TEXT_DOMAIN); ?></h6>
                  <div class="footer-contact-info mb-4">
                      <p class="mb-3"><i class="fa fa-home"></i><span><?php echo $ji_opts['address']; ?></span></p>
                      <p><a class="text-warning" href="#"><i class="fa fa-phone"></i> <span><?php echo $ji_opts['phone']; ?></span></a></p>
                      <p><a class="text-success" href="#"><i class="fas fa-envelope"></i> <span><?php echo $ji_opts['email']; ?></span></a></p>
                      <p><a href="<?php esc_url( '/' );?>"><i class="fa fa-globe"></i> <span><?php echo $ji_opts['website']; ?></span></a></p>
                  </div>
               </div>
               <?php
                if ( is_active_sidebar('jind_footer_sidebar') ){
                    dynamic_sidebar('jind_footer_sidebar');
                }
                ?>
               <div class="col-lg-3 col-md-3">
                  <h6 class="mb-4">FOLLOW US</h6>
                  <div class="footer-social">
                     <a class="btn-facebook" href="<?php echo $ji_opts['facebook']; ?>"><i class="fab fa-facebook-f"></i></a>
                     <a class="btn-twitter" href="<?php echo $ji_opts['twitter']; ?>"><i class="fab fa-twitter"></i></a>
                     <a class="btn-instagram" href="<?php echo $ji_opts['instagram']; ?>"><i class="fab fa-instagram"></i></a>
                     <a class="btn-whatsapp" href="<?php echo $ji_opts['whatsapp']; ?>"><i class="fab fa-whatsapp"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </section>
        <footer class="py-4 footer-bottom">
            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
            <div class="container">
            <p class="m-0 text-center text-white"><?php echo $ji_opts['footer_text']; ?></p>
            </div>
            <!-- /.container -->
        </footer>
        <?php wp_footer(); ?>

    </body>
</html>