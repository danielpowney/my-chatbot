<div class="myc-content-overlay <?php if ( isset( $toggle_class ) ) { echo $toggle_class; } ?>">
	<div class="myc-content-overlay-header">
	<span class=myc-content-overlay-header-text"><?php echo $overlay_header_text; ?></span>
	<span class="dashicons dashicons-arrow-up-alt2" title="<?php _e( 'Open', 'my-chatbot' ); ?>"></span>
	<span class="dashicons dashicons-arrow-down-alt2" title="<?php _e( 'Close', 'my-chatbot' ); ?>"></span>
	</div>
	<?php if ( strlen( $overlay_powered_by_text ) > 0 ) {
		?>
		<div class="myc-content-overlay-powered-by"><?php echo $overlay_powered_by_text; ?></div>
		<?php 
	} ?>
	<div class="myc-content-overlay-container"><?php echo do_shortcode( '[my_chatbot]' ); ?></div>
</div>