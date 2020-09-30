<?php
function jind_theme_opts_page(){
    $theme_opt = get_option( THEME_OPTION_NAME );
?>
    <div class="wrap">
        <h1 class="mb-4"><?php echo bloginfo('name'); ?> Theme Options</h1>
        <?php
            if( isset($_GET['status']) && $_GET['status'] == 1){
                echo '<div class="alert alert-success">Success!</div>';
            }
        ?>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="general-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">General</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Apparence</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Property</a>
            </li>
        </ul>
        <div class="tab-content col-md-10 ml-2" id="myTabContent">
            <!-- =======================================
                TAB 1
                =====================================-->
            <div class="tab-pane fade show active pt-4" id="home" role="tabpanel" aria-labelledby="general-tab">
                <form method="post" action="admin-post.php" id="form-opt">
                    <input type="hidden" name="action" value="jind_save_options">
                    <?php wp_nonce_field('jind_options_verify'); ?>
                    <h5>General</h5><br>

                    <div class="form-group row">
                        <div class="col-3 mr-2">
                            <label><?php _e('Logo type', THEME_TEXT_DOMAIN); ?></label>
                        </div>
                        <div class="col-4">
                            <select class="custom-select" name="jind_logo_type">
                            <option value="1">Site name</option>
                            <option value="2" <?php echo $theme_opt['general']['logo_type'] == 2 ? 'SELECTED' : ''; ?>>Image</option>
                            </select>
                        </div>
                    </div><!-- ./form-group row -->

                    <div class="form-group row">
                        <div class="col-3 mr-2">
                            <label><?php _e('Site logo', THEME_TEXT_DOMAIN); ?></label>
                        </div>
                        <div class="col-4">
                            <input type="text" name="jind_logo_file" placeholder="Logo Image" class="form-control" value="<?php echo $theme_opt['general']['logo_img']; ?>" readonly>
                        </div>
                        <div class="col-2">
                            <button class="btn btn-outline-primary" id="btn_upload_logo">Choose</button>
                        </div>
                    </div><!-- ./form-group row -->

                    <div class="form-group row">
                        <div class="col-3 mr-2">
                            <label for="jind_header_text"><?php _e('Home Header Text', THEME_TEXT_DOMAIN); ?></label>
                        </div>
                        <div class="col-5">
                            <textarea form="form-opt" name="jind_header_text" id="jind_header_text" class="form-control" cols="30" rows="1"><?php echo stripslashes_deep($theme_opt['general']['header']); ?></textarea><br>
                            <textarea form="form-opt" name="jind_subheader_text" id="jind_subheader_text" class="form-control" cols="30" rows="1"><?php echo stripslashes_deep($theme_opt['general']['subheader']); ?></textarea>
                        </div>
                    </div><!-- ./form-group row -->

                    <div class="form-group row">
                        <div class="col-3 mr-2">
                            <label for="jind_footer_text"><?php _e('Footer Text', THEME_TEXT_DOMAIN); ?></label>
                        </div>
                        <div class="col-5">
                            <textarea name="jind_footer_text" id="jind_footer_text" class="form-control" cols="30" rows="3"><?php echo $theme_opt['general']['footer']; ?></textarea>
                        </div>
                    </div><!-- ./form-group row -->

                    <h5>Social Network</h5><br>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Facebook</label>
                            <input type="text" class="form-control" name="jind_facebook" value="<?php echo $theme_opt['social_network']['facebook']; ?>">
                        </div><!-- form group -->
                        <div class="form-group col-md-4">
                            <label>Twitter</label>
                            <input type="text" class="form-control" name="jind_twitter" value="<?php echo $theme_opt['social_network']['twitter']; ?>">
                        </div><!-- form group -->
                    </div><!-- form row -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Instagram</label>
                            <input type="text" class="form-control" name="jind_instagram" value="<?php echo $theme_opt['social_network']['instagram']; ?>">
                        </div><!-- form group -->
                        <div class="form-group col-md-4">
                            <label>WhatsApp</label>
                            <input type="text" class="form-control" name="jind_whatsapp" value="<?php echo $theme_opt['social_network']['whatsapp']; ?>">
                        </div><!-- form group -->
                    </div><!-- form row -->

                    <h5>Contact Info</h5>
                    <div class="form-group row">
                        <div class="col-3 mr-2">
                            <label><?php _e( 'Address', THEME_TEXT_DOMAIN );?></label>
                        </div>
                        <div class="col-5">
                            <input type="text" class="form-control" name="jind_address" value="<?php echo $theme_opt['contact_info']['address']; ?>">
                        </div>
                    </div><!-- ./form-group row -->

                    <div class="form-group row">
                        <div class="col-3 mr-2"><label for="jind_email"><?php _e( 'Email', THEME_TEXT_DOMAIN );?></label></div>
                        <div class="col-5"><input type="text" class="form-control" name="jind_email" value="<?php echo $theme_opt['contact_info']['email']; ?>"></div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-4">
                            <label for="jind_phone1"><?php _e( 'Phone 1', THEME_TEXT_DOMAIN );?></label>
                            <input type="text" class="form-control" name="jind_phone1" value="<?php echo $theme_opt['contact_info']['phone1']; ?>">
                        </div>
                        <div class="form-group col-4">
                            <label for="jind_phone2"><?php _e( 'Phone 2', THEME_TEXT_DOMAIN );?></label>
                            <input type="text" class="form-control" name="jind_phone2" value="<?php echo $theme_opt['contact_info']['phone2']; ?>">
                        </div>
                    </div><!-- form row -->
                    <div class="form-group row">
                        <div class="col-3  mr-2">
                            <label for="jind_website"><?php _e( 'Website URL', THEME_TEXT_DOMAIN );?></label>
                        </div>
                        <div class="col-5">
                            <input type="text" class="form-control" name="jind_website" value="<?php echo $theme_opt['contact_info']['website']; ?>">
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit"><?php _e('Save Changes', THEME_TEXT_DOMAIN); ?></button>
                </form>
            </div><!--./tab pane 1 -->

            <!-- =======================================
                TAB 2
                =====================================-->
            <div class="tab-pane fade pt-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                <h5>Header Image</h5><br>
                <div class="form-group row">
                    <div class="col-3">
                        <label><?php _e('Home Header Image', THEME_TEXT_DOMAIN); ?></label>
                    </div>
                    <div class="col-4">
                        <input form="form-opt" type="text" name="home_header_image_file" class="form-control" value="<?php echo $theme_opt['appearance']['home_header_img']; ?>" readonly> <br>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-outline-primary" id="btn_upload_header_home">Choose</button>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-3">
                        <label><?php _e('Page Header Image', THEME_TEXT_DOMAIN); ?></label>
                    </div>
                    <div class="col-4">
                        <input form="form-opt" type="text" name="page_header_image_file" class="form-control" value="<?php echo $theme_opt['appearance']['page_header_img']; ?>" readonly>
                    </div>
                    <div class="col-2">
                        <button class="btn btn-outline-primary" id="btn_upload_header_page">Choose</button>
                    </div>
                </div>
                <button form="form-opt" type="submit" class="btn btn-primary">Save Changes</button>

            </div><!-- ./tap pane 2 -->

            <!-- =======================================
                TAB 3
                =====================================-->
            <div class="tab-pane fade pt-4" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="form-group row">
                    <label for="" class="col-sm-3">Property list title</label>
                    <div class="col-sm-5">
                        <input type="text" form="form-opt" class="form-control" name="ads_title" value="<?php echo $theme_opt['ads']['title']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3">Property list subtitle</label>
                    <div class="col-sm-5">
                        <input type="text" form="form-opt" class="form-control" name="ads_subtitle" value="<?php echo $theme_opt['ads']['subtitle']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3">Currency Symbol</label>
                    <div class="col-sm-5">
                        <input type="text" form="form-opt" class="form-control" name="currency" value="<?php echo $theme_opt['ads']['currency']; ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3">Property per page</label>
                    <div class="col-sm-5">
                        <input type="number" form="form-opt" class="form-control" name="ads_per_page" value="<?php echo $theme_opt['ads']['per_page']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <button form="form-opt" type="submit" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
            <!-- ./tap pane 3 -->

        </div><!-- tab content -->
    </div>
<?php
}
