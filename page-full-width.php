<?php
/*
 * Template Name: Jind Full width Page
 * description: Template for full width page
 */
get_header();
get_header('page');
?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
          <?php
            while ( have_posts() ) :
                the_post();

                the_content();

            endwhile; // End of the loop.
            wp_reset_postdata();
          ?>
        </main>
    </div>
</div>

<?php get_footer(); ?>
