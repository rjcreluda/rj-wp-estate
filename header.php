<?php
  global $ji_opts; // Theme options value
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php wp_head(); ?>
    </head>
    <body <?php echo body_class(); ?>>
        <!--=================================
        header -->
        <header class="header" id="header">
          <div class="topbar">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="d-block d-md-flex align-items-center text-center">
                    <div class="mr-3 d-inline-block">
                      <a href="tel:<?php echo $ji_opts['phone']; ?>"><i class="fa fa-phone mr-2 fa fa-flip-horizontal"></i><?php echo $ji_opts['phone']; ?> </a>
                    </div>
                    <div class="mr-auto d-inline-block">
                      <a href="mailto:<?php echo $ji_opts['email']; ?>"><i class="fa fa-envelope mr-2 fa fa-flip-horizontal"></i><?php echo $ji_opts['email']; ?></a>
                    </div>
                    <!--<div class="dropdown d-inline-block pl-2 pl-md-0">
                      <a class="dropdown-toggle" href="#" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Language
                      </a>
                      <div class="dropdown-menu mt-0" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">English</a>
                        <a class="dropdown-item" href="#">French</a>
                      </div>
                    </div>-->
                    <div class="social d-inline-block">
                      <ul class="list-unstyled">
                        <li><a href="<?php  echo $ji_opts['facebook']; ?>"> <i class="fab fa-facebook-f"></i> </a></li>
                        <li><a href="<?php  echo $ji_opts['twitter']; ?>"> <i class="fab fa-twitter"></i> </a></li>
                        <li><a href="<?php  echo $ji_opts['instagram']; ?>"> <i class="fab fa-instagram"></i> </a></li>
                        <li><a href="tel:<?php  echo $ji_opts['whatsapp']; ?>"> <i class="fab fa-whatsapp"></i> </a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <nav class="navbar navbar-light bg-white navbar-static-top navbar-expand-lg header-sticky">
                <div class="container-fluid">
                  <button type="button" class="navbar-toggler" data-toggle="collapse" data-target=".navbar-collapse"><i class="fas fa-align-left"></i></button>
                  <a class="navbar-brand" href="<?php echo esc_url( '/' );?>">
                    <?php
                    if($ji_opts['logo_type'] == 1)
                        echo bloginfo( 'name' );
                    else
                        echo '<img src="'.$ji_opts['logo_img'].'" class="img-fluid" alt="logo">';
                    ?>
                  </a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <?php

                    wp_nav_menu(array(
                        'theme_location'        => 'primary',
                        'container'             => false,
                        'menu_class'            => 'navbar-nav',
                        'depth'                 => 3,
                        'fallback_cb'           => 'wp_bootstrap_navwalker::fallback',
                        'walker'                => new wp_bootstrap_navwalker()
                    ));
                    ?>
                </div><!-- collapse -->
              </div><!-- .container-fluid -->
          </nav>
        </header>
        <!--========= end header -->