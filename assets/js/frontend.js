// When ready :)
jQuery(document).ready(function() {

	loadFromLocalStorage();

    // Added mutation to store the html when there is a change on chat box.
    var chat = document.querySelectorAll(".myc-conversation-area")[0];
    var mutationObserver = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            saveOnLocalStorage(document.querySelector(".myc-conversation-area").innerHTML);
        });
    });

    mutationObserver.observe(chat, {
        childList: true,
    });

    /**
     * Storage all html of chatbot in localstorage
     */
    function saveOnLocalStorage(messages) {
        localStorage.setItem("conversation", messages);
    }

    /**
     * Get all html content from localstorage when loading the page.
     */
    function loadFromLocalStorage() {
        document.querySelector(".myc-conversation-area").innerHTML = localStorage.getItem("conversation");
    }


	/*
	 * When the user enters text in the text input text field and then the presses Enter key
	 */
	jQuery("input.myc-text").keypress(function(event) {
		if (event.which == 13) {
			event.preventDefault();
			jQuery(".myc-conversation-area .myc-conversation-request").removeClass("myc-is-active");

			var text = jQuery(this).val();
			var date = new Date();

			var containerId = jQuery(this).closest(".myc-container").attr('id');
			var parts = containerId.split("-");
			var sequence = parts[2];

			var innerHTML = "<div class=\"myc-conversation-bubble-container myc-conversation-bubble-container-request\"><div class=\"myc-conversation-bubble myc-conversation-request myc-is-active\">" + escapeTextInput(text) + "</div>";
			if (myc_script_vars.show_time) {
				innerHTML += "<div class=\"myc-datetime\">" + date.toLocaleTimeString() + "</div>";
			}
			innerHTML += "</div>";
			if (myc_script_vars.show_loading) {
				innerHTML += "<div class=\"myc-loading\"><i class=\"myc-icon-loading-dot\" /><i class=\"myc-icon-loading-dot\" /><i class=\"myc-icon-loading-dot\" /></div>";
			}
			jQuery("#myc-container-" + sequence + " .myc-conversation-area").append(innerHTML);
			jQuery("#myc-container-" + sequence + " input.myc-text").val("");
			jQuery("#myc-container-" + sequence + " .myc-conversation-area")
					.scrollTop(jQuery("#myc-container-" + sequence + " .myc-conversation-area")
					.prop("scrollHeight"));
			textQuery(text, sequence);
		}
	});

	/*
	 * Welcome
	 */
	if (myc_script_vars.enable_welcome_event) {

		// show welcome intent on first chatbot only
		if ( jQuery(".myc-container").length > 0 ) {

			// check if toggled...
			jQuery(".myc-container").each( function( index, value ) {

				// Do not show welcome intent if overlay has not been opened yet
				if (jQuery(this).closest(".myc-content-overlay").length > 0) {
					if (jQuery(this).closest(".myc-content-overlay").hasClass("myc-toggle-closed")) {
						return true; // skip, same as continue
					}
				}

				var containerId = jQuery(this).attr('id');
				var parts = containerId.split("-");
				var sequence = parts[2];

				welcomeIntent(sequence);

			});

		}
	}


	/* Overlay slide toggle */
	jQuery(".myc-content-overlay .myc-content-overlay-header").click(function(event){

		if (jQuery(this).find(".myc-icon-toggle-up").css("display") !== "none") { // toggle open

			var container = jQuery(this).siblings(".myc-content-overlay-container").find(".myc-container");

			// if welcome intent enabled and no conversation exists yet
			if (myc_script_vars.enable_welcome_event && jQuery(container).find(".myc-conversation-bubble-container").length == 0) {

				var containerId = jQuery(container).attr('id');
				var parts = containerId.split("-");
				var sequence = parts[2];

				welcomeIntent(sequence);
			}

			jQuery(this).find(".myc-icon-toggle-up").hide();
			jQuery(this).parent().removeClass("myc-toggle-closed");
			jQuery(this).parent().addClass("myc-toggle-open");
			jQuery(this).find(".myc-icon-toggle-down").show();
			jQuery(this).siblings(".myc-content-overlay-container, .myc-content-overlay-powered-by").slideToggle("slow", function() {});
		} else { // toggle close
			jQuery(this).find(".myc-icon-toggle-down").hide();
			jQuery(this).parent().removeClass("myc-toggle-open");
			jQuery(this).parent().addClass("myc-toggle-closed");
			jQuery(this).find(".myc-icon-toggle-up").show();
			jQuery(this).siblings(".myc-content-overlay-container, .myc-content-overlay-powered-by").slideToggle("slow", function() {});
		}
	});

});


/**
 * Displays welcome intent for a specific chatbot identified by sequence
 *
 * @params sequence
 */
function welcomeIntent(sequence) {

	jQuery.ajax( {
		url: myc_script_vars.wpApiSettings.root + 'myc/v1/detectIntent',
		method: 'POST',
		beforeSend: function ( xhr ) {
		    xhr.setRequestHeader( 'X-WP-Nonce', myc_script_vars.wpApiSettings.nonce );
		},
		data: {
			event : "WELCOME",
			lang : myc_script_vars.language,
			sessionId: myc_script_vars.session_id
		},
		success : function(response) {
			prepareResponse(response, sequence);
		},
		error : function(response) {
			textResponse(myc_script_vars.messages.internal_error, sequence);
			jQuery("#myc-container-" + sequence + " .myc-conversation-area")
					.scrollTop(jQuery("#myc-container-" + sequence + " .myc-conversation-area")
					.prop("scrollHeight"));
		}
	} ).done( function ( response ) {
	    //console.log( response );
	} );

}

/**
 * Send Dialogflow query
 *
 * @param text
 * @param sequence
 * @returns
 */
function textQuery(text, sequence) {

	jQuery.ajax( {
		url: myc_script_vars.wpApiSettings.root + 'myc/v1/detectIntent',
		method: 'POST',
		beforeSend: function ( xhr ) {
		    xhr.setRequestHeader( 'X-WP-Nonce', myc_script_vars.wpApiSettings.nonce );
		},
		data: {
			text : text,
			lang : myc_script_vars.language,
			sessionId: myc_script_vars.session_id
		},
		success : function(response) {
			setTimeout(function(){
				if (myc_script_vars.show_loading) {
					jQuery("#myc-container-" + sequence + " .myc-loading").empty();
				}
				prepareResponse(response,sequence);
			}, myc_script_vars.response_delay);
		},
		error : function(response) {
			if (myc_script_vars.show_loading) {
				jQuery("#myc-container-" + sequence + " .myc-loading").empty();
			}
			textResponse(myc_script_vars.messages.internal_error, sequence);
			jQuery("#myc-container-" + sequence + " .myc-conversation-area")
					.scrollTop(jQuery("#myc-container-" + sequence + " .myc-conversation-area")
					.prop("scrollHeight"));
		}
	} ).done( function ( response ) {
	    //console.log( response );
	} );

}

/**
 * Handle Dialogflow response
 *
 * @param response
 * @param response
 */
function prepareResponse(response, sequence) {

	if (response) {

		jQuery(window).trigger("myc_response_success", response);

		jQuery("#myc-container-" + sequence + " .myc-conversation-area .myc-conversation-response").removeClass("myc-is-active");

		var messages = response.messages;
		var numMessages = messages.length;
		var index = 0;
		for (index; index<numMessages; index++) {
			var message = messages[index];
				
			if (message.text) {
				textResponse(message.text.text, sequence);
			} else if (message.quickReplies) {
				quickRepliesResponse(message.quickReplies.title, message.quickReplies.quickReplies, sequence);
			} else if (message.image) {
				imageResponse(message.image.imageUri, sequence);
			} else if (message.card) {
				cardResponse(message.card.title, message.card.subtitle, message.card.buttons, message.card.imageUri, sequence);
			}
				
			// custom payload

		}

	} else {
		textResponse(myc_script_vars.messages.internal_error, sequence);
	}

	jQuery("#myc-container-" + sequence + " .myc-conversation-area")
			.scrollTop(jQuery("#myc-container-" + sequence + " .myc-conversation-area")
			.prop("scrollHeight"));

	if (jQuery("#myc-container-" + sequence + " + .myc-debug #myc-debug-data").length) {
		var debugData = JSON.stringify(response, undefined, 2);
		jQuery("#myc-container-" + sequence + " + .myc-debug #myc-debug-data").text(debugData);
	}
}


/**
 * Displays a text response
 *
 * @param text
 * @param sequence
 * @returns
 */
function textResponse(text, sequence) {
	if (text === "") {
		text = myc_script_vars.messages.internal_error;
	}
	var date = new Date();
	var innerHTML = "<div class=\"myc-conversation-bubble-container myc-conversation-bubble-container-response\"><div class=\"myc-conversation-bubble myc-conversation-response myc-is-active myc-text-response\">" + text + "</div>";
	if (myc_script_vars.show_time) {
		innerHTML += "<div class=\"myc-datetime\">" + date.toLocaleTimeString() + "</div>";
	}
	innerHTML += "</div>";
	jQuery("#myc-container-" + sequence + " .myc-conversation-area").append(innerHTML);
}

/**
 * Displays a image response
 *
 * @param imageUrl
 * @param sequence
 * @returns
 */
function imageResponse(imageUrl, sequence) {
	if (imageUrl === "") {
		textResponse(myc_script_vars.messages.internal_error, sequence)
	} else {
		// FIXME wait for image to load by creating HTML first
		var date = new Date();
		var innerHTML = "<div class=\"myc-conversation-bubble-container myc-conversation-bubble-container-response\"><div class=\"myc-conversation-bubble myc-conversation-response myc-is-active myc-image-response\"><img src=\"" + imageUrl + "\"/></div>";
		if (myc_script_vars.show_time) {
			innerHTML += "<div class=\"myc-datetime\">" + date.toLocaleTimeString() + "</div>";
		}
		innerHTML += "</div>";
		jQuery("#myc-container-" + sequence + " .myc-conversation-area").append(innerHTML);
	}
}

/**
 * Card response
 *
 * @param title
 * @param subtitle
 * @param buttons
 * @param text
 * @param postback
 * @param sequence
 */
function cardResponse(title, subtitle, buttons, text, postback, sequence) {
	var html = "<div class=\"myc-card-title\">" + title + "</div>";
	html += "<div class=\"myc-card-subtitle\">" + subtitle + "</div>";
	// TODO
}

/**
 * Quick replies response
 *
 * @param title
 * @param replies
 * @param sequence
 */
function quickRepliesResponse(title, replies, sequence) {

	var html = "<div class=\"myc-quick-replies-title\">" + title + "</div>";

	var index = 0;
	for (index; index<replies.length; index++) {
		html += "<input type=\"button\" class=\"myc-quick-reply\" value=\"" + replies[index] + "\" />";
	}

	var date = new Date();
	var innerHTML = "<div class=\"myc-conversation-bubble-container myc-conversation-bubble-container-response\"><div class=\"myc-conversation-bubble myc-conversation-response myc-is-active myc-quick-replies-response\">" + html + "</div>";
	if (myc_script_vars.show_time) {
		innerHTML += "<div class=\"myc-datetime\">" + date.toLocaleTimeString() + "</div>";
	}
	innerHTML += "</div>";
	jQuery("#myc-container-" + sequence + " .myc-conversation-area").append(innerHTML);

	jQuery("#myc-container-" + sequence + " .myc-conversation-area .myc-is-active .myc-quick-reply").click(function(event) {
		event.preventDefault();
		jQuery("#myc-container-" + sequence + " .myc-conversation-area .myc-conversation-request").removeClass("myc-is-active");
		var text = jQuery(this).val()
		var date = new Date();
		var innerHTML = "<div class=\"myc-conversation-bubble-container myc-conversation-bubble-container-request\"><div class=\"myc-conversation-bubble myc-conversation-request myc-is-active\">" + escapeTextInput(text) + "</div>";
		if (myc_script_vars.show_time) {
			innerHTML += "<div class=\"myc-datetime\">" + date.toLocaleTimeString() + "</div>";
		}
		if (myc_script_vars.show_loading) {
			innerHTML += "<div class=\"myc-loading\"><i class=\"myc-icon-loading-dot\" /><i class=\"myc-icon-loading-dot\" /><i class=\"myc-icon-loading-dot\" /></div>";
		}
		innerHTML += "</div>";
		jQuery("#myc-container-" + sequence + " .myc-conversation-area").append(innerHTML);
		textQuery(text, sequence);
	});

}

/**
 * Custom payload
 *
 * @param payload
 */
function customPayload(payload, sequence) {
}


var entityMap = {
  '&': '&amp;',
  '<': '&lt;',
  '>': '&gt;',
  '"': '&quot;',
  "'": '&#39;',
  '/': '&#x2F;',
  '`': '&#x60;',
  '=': '&#x3D;'
};

/**
 * Escapes HTML in text input
 */
function escapeTextInput(text) {
  return String(text).replace(/[&<>"'`=\/]/g, function (s) {
    return entityMap[s];
  });
}
