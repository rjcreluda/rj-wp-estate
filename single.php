<?php get_header(); ?>
<?php get_header('page'); ?>


<section id="main">
    <section class="section">
        <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8 blog-posts">
                <div class="card blog-card padding-card blog-single-page">
                   <?php
                        if( has_post_thumbnail( get_the_ID() ) ){
                            echo '<img class="img-thumbnail" src="'.get_the_post_thumbnail_url( get_the_ID(),'full' ).'" alt="img">';
                        }
                    ?>
                   <div class="card-body blog-single-page">
                      <span class="badge badge-success">House/Villa</span>
                      <h2><?php echo get_the_title(); ?></h2>
                      <h6 class="mb-3 small"><i class="fa fa-calendar"></i> <?php echo get_the_date( 'D M j Y' ); ?></h6>
                        <?php
                            if( have_posts() ):
                                while( have_posts() ):
                                    the_post();
                            ?>
                                <div><?php the_content(); ?></div>
                            <?php
                                endwhile;
                            endif;
                        ?>
                   </div>
                   <div>
                    <?php
                        $next_post = get_adjacent_post(false,'',false);
                        $previous_post = get_adjacent_post(false,'',true);
                    ?>

                    <?php if(! empty($previous_post) || empty($next_post) ) : ?>
                     <nav class="navigation post-navigation">
                        <div class="nav-links">
                            <?php if(! empty($previous_post) ): ?>
                              <div class="nav-previous">
                                <a href="<?php echo get_permalink($previous_post->ID); ?>"><span class="pagi-text"> PREV</span><span class="nav-title"><?php echo $previous_post->post_title; ?></span></a>
                              </div>
                            <?php endif; ?>
                            <?php if(! empty($next_post) ): ?>
                              <div class="nav-next">
                                <a href="<?php echo get_permalink($next_post->ID); ?>"><span class="nav-title"><?php echo $next_post->post_title; ?></span> <span class="pagi-text">NEXT</span></a> </div>
                              </div>
                            <?php endif; ?>
                      </nav>
                    <?php endif; ?>
                   </div>
                </div><!-- blog card -->
            </div>

            <div class="col-sm-4 blog-sidebar">
                <?php get_sidebar('single'); ?>
            </div>
        </div>
    </div>
    </section>
</section>

<?php get_footer(); ?>