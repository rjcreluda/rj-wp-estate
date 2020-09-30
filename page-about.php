<?php
/*
 * Template Name: About us
 * description: Template for about page
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
                    <div class="col-md-8 about-page">
                        <?php
                        while ( have_posts() ) :
                            the_post();

                            the_content();

                        endwhile; // End of the loop.
                        wp_reset_postdata();
                      ?>
                    </div><!--/.col-md-8 -->
                    <div class="col-md-4">
                      <?php
                        if( has_post_thumbnail( get_the_ID() ) ){
                              echo '<img class="img-thumbnail" src="'.get_the_post_thumbnail_url( get_the_ID(),'full' ).'" alt="img">';
                          }
                          else{
                            echo '<img src="'.THEME_DIR_URI.'/assets/images/about.jpg" alt="about-us" class="img-fluid img-thumbnail" />';
                          }
                      ?>
                    </div><!-- col -->
                </div><!--./row -->
            </div> <!-- ./container -->
            </section><!-- ./ section -->
        </main>
    </div>
</div>

<?php get_footer(); ?>
