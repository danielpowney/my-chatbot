/**
 * Pickers
 */
jQuery(document).ready(function() {
		
	jQuery('.color-picker').wpColorPicker({
	    defaultColor: false,
	    change: function(event, ui){},
	    clear: function() {},
	    hide: true,
	    palettes: true
	});

	jQuery('.myc-key-file-table input:radio').change(function () {
		if (jQuery(this).val() === 'config') {
			jQuery(".myc-key-file-config").show();
			jQuery(".myc-key-file-options").hide();
		} else {
			jQuery(".myc-key-file-config").hide();
			jQuery(".myc-key-file-options").show();
		}
       
	});

	jQuery('#myc-how-to-create-key-file-btn').click(function() {
		jQuery("#myc-how-to-create-key-file-text").show();
	});
	    
});