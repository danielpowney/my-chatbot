<?php

/**
 * Adds My Chatbot post meta box to all existing post types
 *
 * @since 1.4
 */
function myc_post_meta_box() {

    add_meta_box( 'myc-post-meta-box', __( 'My Chatbot', 'my-chatbot' ), 'myc_post_meta_box_callback', '', 'side', 'default' );

}
add_action( 'add_meta_boxes', 'myc_post_meta_box' );


/**
 * Displays the My Chatbot post meta box on the Edit post screen
 */
function myc_post_meta_box_callback( $post ) {

    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'myc_post_meta_box_nonce', 'myc_post_meta_box_nonce' );

    $chatbot_overlay = get_post_meta( $post->ID, 'myc_chatbot_overlay', true );
    if ( $chatbot_overlay == null) {
    	$chatbot_overlay = '';
    }

    ?>

    <p>
    	<label class="post-attributes-label" for="myc_chatbot_overlay"><?php _e( 'Chatbot Overlay', 'my-chatbot' ); ?></label>
    </p>

    <select name="myc_chatbot_overlay" id="myc_chatbot_overlay">
	    	<option value="" <?php selected( '', $chatbot_overlay, true ); ?>><?php _e( 'Use global settings', 'my-chatbot' ); ?></option>
	    	<option value="enable" <?php selected( "enable", $chatbot_overlay, true ); ?>><?php _e( 'Enable', 'my-chatbot' ); ?></option>
	    	<option value="disable" <?php selected( "disable", $chatbot_overlay, true ); ?>><?php _e( 'Disable', 'my-chatbot' ); ?></option>
	    </select>

    <p class="howto"><?php _e( 'Do you want to enable or disable the chatbot overlay specifically for this post?', 'my-chatbot' ); ?></p>

	<?php

}


/**
 * When the post is saved, saves the My Chatbot post meta box data.
 *
 * @param int $post_id
 */
function myc_save_post_meta_box( $post_id ) {

    // Check if our nonce is set
    if ( ! isset( $_POST['myc_post_meta_box_nonce'] ) ) {
        return;
    }

    // Verify that the nonce is valid
    if ( ! wp_verify_nonce( $_POST['myc_post_meta_box_nonce'], 'myc_post_meta_box_nonce' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    /* OK, it's safe for us to save the data now */

    // Sanitize input
    $chatbot_overlay = ''; // default to general settings
    if ( isset( $_POST['myc_chatbot_overlay'] )
    	&& ( $_POST['myc_chatbot_overlay']  === "enable" || $_POST['myc_chatbot_overlay']  === "disable" ) ) {
	    $chatbot_overlay = $_POST['myc_chatbot_overlay'];
	}

    // Update the post meta field
	update_post_meta( $post_id, 'myc_chatbot_overlay', $chatbot_overlay );
}
add_action( 'save_post', 'myc_save_post_meta_box' );
