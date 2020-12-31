<?php if ( ! defined( 'ABSPATH' ) ) exit;


// CONSTANT
define("THEME_DIR", get_template_directory());
define("THEME_DIR_URI", get_template_directory_uri());
define("THEME_OPTION_NAME", 'goliathus_options');
define("THEME_TEXT_DOMAIN", 'goliathus');

// Set Up
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('title-tag');

// Include
include(THEME_DIR . '/includes/front/enqueue.php'); // scripts enqueue
include(THEME_DIR . '/includes/setup.php'); // menu setup
include(THEME_DIR . '/includes/widgets.php'); // registering sidebar & custom widget
include(THEME_DIR . '/includes/Post_Widgets.class.php'); // Recent posts widget
include(THEME_DIR . '/includes/Jind_Recent_Posts_Widgets.class.php'); // Custom widget
require_once(THEME_DIR . '/includes/custom_post.php'); // register custom post type
require_once(THEME_DIR . '/includes/custom_metabox.php'); // register custom post metabox
require_once(THEME_DIR . '/includes/display_custom_fields.php'); // display metabox
require_once(THEME_DIR . '/includes/property_description_field.php'); // display metabox
require_once(THEME_DIR . '/includes/front/wordpress_custom.php'); // custom front end text, widget
require_once(THEME_DIR . '/includes/custom_query.php'); // Custom search

include(THEME_DIR . '/includes/activate.php'); // add theme options to db on activation

// Admin Include
include(THEME_DIR . '/includes/admin/menus.php'); // add theme menu to admin
include(THEME_DIR . '/includes/admin/options-page.php');
include(THEME_DIR . '/includes/admin/init.php'); // enqueue scripts & styles
include(THEME_DIR . '/includes/process/save_options.php'); // save options in theme admin form


function buildSelect($tax){
	$terms = get_terms($tax);
	$x = '<select name="'.$tax.'" class="form-control basic-select select2-hidden-accessible"  aria-hidden="true">';
	//$x = '<select name="cat" class="form-control basic-select select2-hidden-accessible"  aria-hidden="true">';
	$cat_id	  = isset($_GET['theme']) ? (int) $_GET['theme'] : 0;
	$x .= '<option value="">Select type</option>';
	foreach ($terms as $term) {
	   $x .= '<option value="' . $term->term_id . '"';
	   $x .= $cat_id == $term->term_id ? ' selected' : '';
	   $x .= '>' . $term->name . '</option>';
	}
	$x .= '</select>';
	return $x;
}

function search_form(){ ?>
	<div class="property-search-field bg-white">
          <div class="property-search-item">
            <form class="form-row basic-select-wrapper" role="search" method="get" action="<?php echo esc_url( '/search' ); ?>">
              <input type="hidden" name="search_field_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
              <div class="form-group col-lg col-md-6">
                <label>Property type</label>
                <?php  $taxonomies = get_object_taxonomies('property');
                    foreach($taxonomies as $tax){
                        if($tax == 'theme'){
                          echo buildSelect($tax);
                        }
                      }
                ?>
              </div>
              <div class="form-group col-lg col-md-6">
                <label>Status</label>
                <select class="form-control basic-select select2-hidden-accessible" data-select2-id="4" tabindex="-1" aria-hidden="true" name="type">
                  <option value="rent">For Rent</option>
                  <option value="sale" <?php echo isset($_GET['type']) && $_GET['type'] == 'sale' ? 'selected' : ''; ?>>For Sale</option>
                </select>
              </div>
              <div class="form-group d-flex col-lg-5">
                <div class="form-group-search">
                  <label>Location</label>
                  <div class="d-flex align-items-center"><i class="far fa-compass mr-1"></i><input class="form-control" type="search" placeholder="Search Location" name="address" value="<?php echo isset($_GET['address']) ? esc_html( $_GET['address']) : '';?>"></div>
                </div>
                <span class="align-items-center ml-3 d-none d-lg-block"><button class="btn btn-primary d-flex align-items-center mt-2" type="submit"><i class="fas fa-search mr-1"></i><span>Search</span></button></span>
              </div>
              <div class="d-lg-none btn-block btn-mobile m-3">
                <button class="btn btn-primary btn-block align-items-center" type="submit"><i class="fas fa-search mr-1"></i><span>Search</span></button>
              </div>
            </form>
          </div>
        </div><!-- ./ property search field -->
<?php
}


function property_cat_list(){

      $terms = get_terms(array(
          'taxonomy' => 'theme',
          'hide_empty' => false
      ));
    ?>
    <ul class="sidebar-card-list list-unstyled">
       <?php foreach($terms as $term) :?>
          <li><a href="<?php echo esc_url( get_term_link( $term ) ); ?>"><i class="fa fa-chevron-right"></i> <?php echo $term->name; ?><span class="sidebar-badge"><?php echo $term->count; ?></span></a></li>
       <?php endforeach;?>
    </ul>
	<?php
}

function jind_contact_info(){
  $opts = get_option(THEME_OPTION_NAME);
  $data['address'] = $opts['contact_info']['address'];
  $data['email'] = $opts['contact_info']['email'];
  $data['phone'] = $opts['contact_info']['phone1'];
  $data['phone2'] = $opts['contact_info']['phone2'];
  $data['website'] = $opts['contact_info']['website'];
  $data['facebook'] = $opts['social_network']['facebook'];
  $data['twitter'] = $opts['social_network']['twitter'];
  $data['instagram'] = $opts['social_network']['instagram'];
  $data['whatsapp'] = $opts['social_network']['whatsapp'];
  $data['logo_type'] = $opts['general']['logo_type'];
  $data['logo_img'] = $opts['general']['logo_img'];
  $data['header_text'] = $opts['general']['header'];
  $data['footer_text'] = $opts['general']['footer'];
  $data['subheader_text'] = $opts['general']['subheader'];
  $data['home_header_image'] = $opts['appearance']['home_header_img'];
  $data['page_header_image'] = $opts['appearance']['page_header_img'];
  $data['ads_title'] = $opts['ads']['title'];
  $data['ads_subtitle'] = $opts['ads']['subtitle'];
  $data['ads_currency'] = $opts['ads']['currency'];
  $data['ads_per_page'] = $opts['ads']['per_page'];
  return $data;
}
global $ji_opts; // themes options vars
$ji_opts = jind_contact_info();
