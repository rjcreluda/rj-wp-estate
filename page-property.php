<?php
/*
 * Template Name: Property List
 * description: Page template for property list
 */
get_header();
get_header('page');

global $ji_opts;
?>

<div class="wrap">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <section class="section listing-section">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                  <h2 class="text-center mb-3">Search</h2>
                  <?php search_form(); ?>
                </div>
              </div>
                <div class="row mt-5">
                    <div class="col-md-8">
                        <?php
                        $args = array(
                            'posts_per_page' => $ji_opts['ads_per_page'],
                            'post_type' => 'property', // custom post type
                            'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
                            'orderby' => 'date',
                            'order' => 'DESC',
                        );

                        $loop = new WP_Query( $args );
                        if( $loop->have_posts() ):
                            while( $loop->have_posts() ): $loop->the_post();

                                get_template_part('content', 'property');

                            endwhile;
                        else:
                            echo '<h2>'.__('There are no property yet, please come in soon!', THEME_TEXT_DOMAIN).'</h2>';
                        endif;
                        ?>
                        <!-- pagination row -->
                        <div class="row">
                          <div class="col-12">
                            <?php $total_pages = max( 1, absint( $loop->max_num_pages ) );

                            ?>
                            <nav class="pagination mt-4 mb-5">
                              <?php
                                $big = 999999999;
                                 $pages_list = paginate_links( array(
                                      'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                                      'format' => '?paged=%#%',
                                      'current' => max( 1, get_query_var('paged') ),
                                      'total' => $loop->max_num_pages,
                                      'mid_size' => 1,
                                      'prev_text' => '&laquo; Previous page',
                                      'next_text' => 'Next Page &raquo;',
                                      'type' => 'array'
                                 ) );
                                echo $pages_list[0]; // First
                                echo $pages_list[sizeof($pages_list) - 1]; // Last

                              ?>
                            </nav>
                          </div>
                        </div><!-- ./pagination row -->
                    </div><!--/.col-md-8 -->

                    <div class="col-md-4">
                        <div class="card sidebar-card  inner-side-bar">
                         <div class="card-body">
                            <h5 class="card-title mb-3">Property Type</h5>
                            <?php property_cat_list(); ?>
                         </div>
                      </div>
                    </div>
                </div><!--./row -->
            </div> <!-- ./container -->
            </section><!-- ./ section -->
        </main>
    </div>
</div>

<?php get_footer(); ?>
