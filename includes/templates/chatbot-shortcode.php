<div id="myc-container-<?php echo $sequence; ?>" class="myc-container">

	<?php do_action( 'myc_shortcode_before_conversation_area' ); ?>

	<div class="myc-conversation-area"></div>
	<div id="myc-input-area">
		<input class="myc-text" type="text" placeholder="<?php echo $input_text; ?>"></input>
	</div>

</div>

<?php if ( $debug ) { ?>
	<div class="myc-debug">
		<textarea id="myc-debug-data" cols="80" rows="20" disabled></textarea>
	</div>
<?php } ?>
