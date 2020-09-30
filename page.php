<?php get_header(); ?>
<?php get_header('page'); ?>
<section class="section">
    <div id="primary">
        <div id="main">
            <div class="container">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-10">

                        <?php
                            while ( have_posts() ) :
                                the_post();

                                the_content();

                            endwhile; // End of the loop.
                        ?>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
        </div> <!-- #main -->
    </div><!-- #primary -->
</section>

<?php get_footer(); ?>