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
	    
});