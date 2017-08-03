<div class="myc-container">
	<?php do_action( 'myc_shortcode_before_conversation_area' ); ?>
	<div id="myc-conversation-area"></div>
	<div id="myc-input-area">
		<input id="myc-text" type="text" placeholder="<?php _e( 'Ask something...', 'my-chatbot' ); ?>"></input>
	</div>
</div>

<?php if ( $debug ) { ?>
	<div class="myc-debug">
		<textarea id="myc-debug-data" cols="80" rows="20" disabled></textarea>
	</div>
<?php } ?>