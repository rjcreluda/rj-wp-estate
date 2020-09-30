<?php

// Display  custom fields for property
function show_property_meta_box() {
    	global $post;
    		$meta = get_post_meta( $post->ID, 'property_fields', true ); ?>

    	<input type="hidden" name="property_meta_box_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

    <!-- All fields will go here -->
    <table class="form-table property_metabox">
        <tbody>
            <tr class="form-field">
                <th class="left"><?php echo __('Reference ID', THEME_TEXT_DOMAIN); ?></th>
                <td>
                    <label>
                        <input  id="property_id" type="text" name="property_fields[refid]" value="<?php echo ( isset($meta['refid']) ? $meta['refid'] : $post->ID.uniqid() ); ?>" readonly="readonly">
                    </label>
                </td>
            </tr>
            <tr class="form-field">
                <th class="left"><?php echo __('Price', THEME_TEXT_DOMAIN); ?></th>
                <td>
                    <label>
                        <input  id="property_price" type="text" name="property_fields[price]" value="<?php echo (isset($meta['price']) ? $meta['price'] : ''); ?>">
                    </label>
                </td>
            </tr>
            <tr class="form-field">
                <th class="left"><?php echo __('Address', THEME_TEXT_DOMAIN); ?></th>
                <td><input id="property_address" class="regular-text" type="text" name="property_fields[address]" value="<?php echo (isset($meta['address']) ? $meta['address'] : ''); ?>"></td>
            </tr>
            <tr class="form-field">
                <th class="left"><?php echo __('City', THEME_TEXT_DOMAIN); ?></th>
                <td><input id="property_city" class="regular-text" type="text" name="property_fields[city]" value="<?php echo (isset($meta['city']) ? $meta['city'] : ''); ?>"></td>
            </tr>
            <tr class="form-field">
                <th class="left"><?php echo __('State', THEME_TEXT_DOMAIN); ?></th>
                <td><input id="property_state" class="regular-text" type="text" name="property_fields[state]" value="<?php echo (isset($meta['state']) ? $meta['state'] : ''); ?>"></td>
            </tr>
            <tr class="form-field">
                <th class="left">Zip/Postal Code</th>
                <td><input id="property_zipcode" class="regular-text" type="text" name="property_fields[zipcode]" value="<?php echo (isset($meta['zipcode']) ? $meta['zipcode'] : ''); ?>"></td>
            </tr>
            <tr class="form-field">
                <th class="left"><?php echo __('Property type', THEME_TEXT_DOMAIN); ?></th>
                <td>
                    <select name="property_fields[type]" id="property_type" class="postbox">
                        <option value="rent" <?php if(isset($meta['type'])){selected( $meta['type'], 'rent' );} ?>>For rent</option>
                        <option value="sale" <?php if(isset($meta['type'])){selected( $meta['type'], 'sale' );} ?>>For sale</option>
                    </select>
                </td>
            </tr>
            <tr class="form-field">
                <th class="left"><?php echo __('Status', THEME_TEXT_DOMAIN); ?></th>
                <td>
                    <select name="property_fields[availability]" id="property_availability" class="postbox">
                        <option value="available" <?php if(isset($meta['availability'])){selected( $meta['availability'], 'available' );} ?>>Available</option>
                        <option value="rented" <?php if(isset($meta['availability'])){selected( $meta['availability'], 'rented' );} ?>>Rented</option>
                        <option value="sold" <?php if(isset($meta['availability'])){selected( $meta['availability'], 'sold' );} ?>>Sold</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="left">
                    Photos
                </th>
                <td>
                    <input type="button" class="button image-upload" value="Select Images">
                </td>
            </tr>
            <?php
            if( isset($meta['photos']) && is_array($meta['photos']) && isset($meta['photos'][0]) ):
                foreach($meta['photos'] as $photo){
                    echo '<tr class="image_line">
                            <td>
                                <img src="'. $photo .'" style="max-width: 250px;">
                            </td>
                            <td>
                                <input type="hidden" name="property_fields[photos][]"  value="'.$photo.'">
                                <a href="#" onclick="jQuery(this).parent().parent().remove(); return false;">
                                    <font color="red">Delete</font>
                                </a>
                            </td>
                            </tr>';
                }

            endif;
            ?>
        </tbody>
    </table>

    <script>
        jQuery(document).ready(function($) {
            // Instantiates the variable that holds the media library frame.
            var meta_image_frame
            // Runs when the image button is clicked.
            $('.image-upload').click(function(e) {
                // Get preview pane
                var meta_image_preview = $('.image-preview')
                // Prevents the default action from occuring.
                e.preventDefault()
                var meta_image = $('.meta-image')
                // If the frame already exists, re-open it.
                if (meta_image_frame) {
                    meta_image_frame.open()
                    return
                }
                // Sets up the media library frame
                meta_image_frame = wp.media.frames.meta_image_frame = wp.media({
                    title: meta_image.title,
                    button: {
                        text: meta_image.button,
                    },
                    multiple: true,
                })
                // Runs when an image is selected.
                meta_image_frame.on('select', function() {
                    // Grabs the attachment selection and creates a JSON representation of the model.
                    /*var media_attachment = meta_image_frame
                     .state()
                     .get('selection')
                     .first()
                     .toJSON()*/
                    // Sends the attachment URL to our custom image input field.
                    /*meta_image.val(media_attachment.url)
                     meta_image_preview.children('img').attr('src', media_attachment.url)*/
                    var media_attachment = meta_image_frame.state().get('selection').map(

                        function( attachment ) {

                            attachment.toJSON();
                            return attachment;

                        }
                    );
                    var i;

                    for (i = 0; i < media_attachment.length; ++i) {

                        //sample function 1: add image preview
                        $('.property_metabox tbody').append(  '<tr class="image_line"><td><img src="' + media_attachment[i].attributes.url + '" style="max-width: 250px;"></td><td><input id="property_photo_' + media_attachment[i].id + '" type="hidden" name="property_fields[photos][]"  value="' + media_attachment[i].attributes.url + '">  <a href="#" onclick="jQuery(this).parent().parent().remove(); return false;"><font color="red">Delete</font></a></td></tr>' );

                    }
                })
                // Opens the media library frame.
                meta_image_frame.open()
            })

        })
    </script>
<?php }

// Save fields into database
function save_property_fields_meta( $post_id ) {
    	// verify nonce
    	if ( isset($_POST['property_meta_box_nonce']) && !wp_verify_nonce( $_POST['property_meta_box_nonce'], basename(__FILE__) ) ) {
    		return $post_id;
    	}
    	// check autosave
    	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    		return $post_id;
    	}
    	// check permissions
    	if ( isset($_POST['post_type']) && 'property' === $_POST['post_type'] ) {
    		if ( !current_user_can( 'edit_page', $post_id ) ) {
    			return $post_id;
    		} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
    			return $post_id;
    		}
    	}

    	$old = get_post_meta( $post_id, 'property_fields', true );
    	$new = isset($_POST['property_fields']) ? $_POST['property_fields'] : '';

    	if ( $new && $new !== $old ) {
    		update_post_meta( $post_id, 'property_fields', $new );
    	} elseif ( '' === $new && $old ) {
    		delete_post_meta( $post_id, 'property_fields', $old );
    	}
    }
add_action( 'save_post', 'save_property_fields_meta' );