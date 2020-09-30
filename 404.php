<?php get_header(); ?>
<?php get_header('page'); ?>
<section class="section">
    <div id="primary">
        <div id="main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 mx-auto text-center">
                      <h1><img class="img-fluid" src="<?php echo THEME_DIR_URI . '/assets/images/404-error.png' ?>" alt="404"></h1>
                      <h1>Sorry! Page not found.</h1>
                      <p class="land">Unfortunately the page you are looking for has been moved or deleted.</p>
                      <div class="mt-5">
                         <a href="/" class="btn btn-warning btn-lg"><i class="mdi mdi-home"></i> GO TO HOME PAGE</a>
                      </div>
                    </div>
                </div>
            </div>
        </div> <!-- #main -->
    </div><!-- #primary -->
</section>
<?php get_footer(); ?>