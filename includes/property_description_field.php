<?php
function show_property_description_meta_box() {
	global $post;
    $meta = get_post_meta( $post->ID, 'property_description_field', true ); ?>
    <input type="hidden" name="property_description_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">
    <!-- All fields will go here -->
    <table class="form-table property_description_metabox">
        <tbody>
            <tr class="form-field">
                <th class="left"><?php echo __('Area', THEME_TEXT_DOMAIN); ?></th>
                <td>
                    <label>
                        <input  id="property_area" type="text" name="property_description[area]" value="<?php echo (isset($meta['area']) ? $meta['area'] : ''); ?>">
                    </label>
                </td>
                <th class="left"><?php echo __('Bed', THEME_TEXT_DOMAIN); ?></th>
                <td><input id="property_bed" class="regular-text" type="number" name="property_description[bed]" value="<?php echo (isset($meta['bed']) ? $meta['bed'] : ''); ?>"></td>
            </tr>
            <tr class="form-field">
                <th class="left"><?php echo __('Bath', THEME_TEXT_DOMAIN); ?></th>
                <td><input id="property_bath" class="regular-text" type="number" name="property_description[bath]" value="<?php echo (isset($meta['bath']) ? $meta['bath'] : ''); ?>"></td>

                <th class="left"><?php echo __('Room', THEME_TEXT_DOMAIN); ?></th>
                <td><input id="property_room" class="regular-text" type="number" name="property_description[room]" value="<?php echo (isset($meta['room']) ? $meta['room'] : ''); ?>"></td>
            </tr>
            <tr class="form-field">
                <th class="left"><?php echo __('Floor', THEME_TEXT_DOMAIN); ?></th>
                <td><input id="property_floor" class="regular-text" type="number" name="property_description[floor]" value="<?php echo (isset($meta['floor']) ? $meta['floor'] : ''); ?>"></td>

                <th class="left"><?php echo __('Garage', THEME_TEXT_DOMAIN); ?></th>
                <td><input id="property_garage" class="regular-text" type="number" name="property_description[garage]" value="<?php echo (isset($meta['garage']) ? $meta['garage'] : ''); ?>"></td>
            </tr>
        </tbody>
    </table>

<?php }

// Save fields into database
function save_property_description_meta( $post_id ) {
    	// verify nonce
    	if ( isset($_POST['property_description_nonce']) && !wp_verify_nonce( $_POST['property_description_nonce'], basename(__FILE__) ) ) {
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

    	$old = get_post_meta( $post_id, 'property_description_field', true );
    	$new = isset($_POST['property_description']) ? $_POST['property_description'] : '';

    	if ( $new && $new !== $old ) {
    		update_post_meta( $post_id, 'property_description_field', $new );
    	} elseif ( '' === $new && $old ) {
    		delete_post_meta( $post_id, 'property_description_field', $old );
    	}
    }
add_action( 'save_post', 'save_property_description_meta' );
?>