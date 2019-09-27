// Based on blog post: https://www.sitepoint.com/how-to-build-your-own-ai-assistant-using-api-ai/
// Source code: https://github.com/sitepoint-editors/Api-AI-Personal-Assistant-Demo/blob/master/index.html.
// Demo: https://devdiner.com/demos/barry/

// When ready :)
jQuery(document).ready(function() {

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

	jQuery.ajax({
		type : "POST",
		url : myc_script_vars.base_url + myc_script_vars.project_id + myc_script_vars.mid_url + myc_script_vars.session_id + myc_script_vars.end_url,
		contentType : "application/json; charset=utf-8",
		dataType : "json",
		headers : {
			"Authorization" : "Bearer " + myc_script_vars.access_token,
		},
		data : JSON.stringify( {
			"queryInput": {
				"event": {
					"name": "WELCOME",
					"languageCode": myc_script_vars.language
				},
			}
		} ),
		success : function(response) {
			prepareResponse(response, sequence);
		},
		error : function(response) {
			textResponse(myc_script_vars.messages.internal_error, sequence);
			jQuery("#myc-container-" + sequence + " .myc-conversation-area")
					.scrollTop(jQuery("#myc-container-" + sequence + " .myc-conversation-area")
					.prop("scrollHeight"));
		}
	});

}

// query: text,
// lang : myc_script_vars.language,
// sessionId: myc_script_vars.session_id
/**
 * Send Dialogflow query
 *
 * @param text
 * @param sequence
 * @returns
 */
function textQuery(text, sequence) {
	jQuery.ajax({
		type : "POST",
		url : myc_script_vars.base_url + myc_script_vars.project_id + myc_script_vars.mid_url + myc_script_vars.session_id + myc_script_vars.end_url,
		contentType : "application/json; charset=utf-8",
		dataType : "json",
		headers : {
			"Authorization" : "Bearer " + myc_script_vars.access_token,
		},
		data: JSON.stringify( {
			"queryInput": {
					"text": {
								"text": text,
								"languageCode": myc_script_vars.language
							}
					}
		} ),
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
					.scrollTop(jQuery(".myc-container-" + sequence + " .myc-conversation-area")
					.prop("scrollHeight"));
		}
	});
}

/**
 * Handle Dialogflow response
 *
 * @param response
 * @param response
 */
function prepareResponse(response, sequence) {
	if (response.hasOwnProperty('responseId')) {

		jQuery(window).trigger("myc_response_success", response);

		jQuery("#myc-container-" + sequence + " .myc-conversation-area .myc-conversation-response").removeClass("myc-is-active");

		var messages = response.queryResult.fulfillmentMessages

			if (messages[0].hasOwnProperty('text')) {
				textResponse(messages[0].text.text[0], sequence);
			} else if (messages[0].hasOwnProperty('card')) {
				//TODO cardResponse(messages[0].title, messages[0].subtitle, messages[0].buttons, messages[0].text, messages[0].postback, sequence);
			} else if (messages[0].hasOwnProperty('replies')) {
				//TODO quickRepliesResponse(messages[0].title, messages[0].replies, sequence);
			} else if (messages[0].hasOwnProperty('image')) {
				imageResponse(messages[0].image.imageUri, sequence);
			} else {
				console.log('not found');
				textResponse(myc_script_vars.messages.internal_error, sequence);
			}

	} else {
		textResponse(myc_script_vars.messages.internal_error, sequence);
	}

	jQuery("#myc-container-" + sequence + " .myc-conversation-area")
			.scrollTop(jQuery("#myc-container-" + sequence + " .myc-conversation-area")
			.prop("scrollHeight"));

	if (jQuery("#myc-container-" + sequence + " #myc-debug-data").length) {
		var debugData = JSON.stringify(response, undefined, 2);
		jQuery("#myc-container-" + sequence + " #myc-debug-data").text(debugData);
	}
}

/**
 * Checks if messages support a specific platform
 *
 * @param messages
 * @param platform
 * @returns {Boolean}
 */
function hasPlatform(messages, platform) {
	var numMessages = messages.length;
	var index = 0;
	for (index; index<numMessages; index++) {
		var message = messages[index];
		if (message.platform === platform) {
			return true;
		}
	}

	return false;
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
