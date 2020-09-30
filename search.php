<?php get_header(); ?>
<?php get_header('page'); ?>


<section id="main">
    <section class="section">
        <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8 blog-posts">
                <?php
                if( have_posts() ):
                  while( have_posts() ):
                    the_post();
                    get_template_part( 'template-parts/content', 'search' );
                  endwhile;
                else:
                  echo '<h3>' . __('No result found!', THEME_TEXT_DOMAIN) . '</h3>';
                endif;
                 ?>
            </div>

            <div class="col-sm-4 blog-sidebar">
                <?php get_sidebar('single'); ?>
            </div>
        </div>
    </div>
    </section>
</section>

<?php get_footer(); ?>