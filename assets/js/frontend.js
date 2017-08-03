// Based on blog post: https://www.sitepoint.com/how-to-build-your-own-ai-assistant-using-api-ai/
// Source code: https://github.com/sitepoint-editors/Api-AI-Personal-Assistant-Demo/blob/master/index.html.
// Demo: https://devdiner.com/demos/barry/

// When ready :)
jQuery(document).ready(function() {
	
	/*
	 * When the user enters text in the text input text field and then the presses Enter key
	 */
	jQuery("input#myc-text").keypress(function(event) {
		if (event.which == 13) {
			event.preventDefault();
			jQuery("#myc-conversation-area .myc-conversation-request").removeClass("myc-is-active");
			var text = jQuery("input#myc-text").val();
			jQuery("#myc-conversation-area").append("<div class=\"myc-conversation-bubble-container myc-conversation-bubble-container-request\"><div class=\"myc-conversation-bubble myc-conversation-request myc-is-active\">" + text + "</div><div>");
			jQuery("input#myc-text").val("");
			jQuery("#myc-conversation-area").scrollTop(jQuery("#myc-conversation-area").prop("scrollHeight"));
			textQuery(text);
		}
	});
	
	/*
	 * Welcome
	 */
	if (myc_script_vars.enable_welcome_event) {
		jQuery.ajax({
			type : "POST",
			url : myc_script_vars.base_url + "query?v=" + myc_script_vars.version_date,
			contentType : "application/json; charset=utf-8",
			dataType : "json",
			headers : {
				"Authorization" : "Bearer " + myc_script_vars.access_token
			},
			data : JSON.stringify( {
				event : { 
					name : "WELCOME"
				},
				lang : "en",			 
				sessionId : "my-chatbot"
			} ),
			success : function(response) {
				prepareResponse(response);
			},
			error : function() {
				textResponse(myc_script_vars.messages.internal_error);
				jQuery("#myc-conversation-area").scrollTop(jQuery("#myc-conversation-area").prop("scrollHeight"));
			}
		});
	}
	
	
	/* Overlay slide toggle */
	jQuery(".myc-content-overlay .myc-content-overlay-header .dashicons-arrow-up-alt2").click(function(event){
		jQuery(this).hide();
		jQuery(this).parent().parent().removeClass("myc-toggle-closed");
		jQuery(this).parent().parent().addClass("myc-toggle-open");
		jQuery(this).parent().find(".dashicons-arrow-down-alt2").show();
		jQuery(this).parent().siblings(".myc-content-overlay-container, .myc-content-overlay-powered-by").slideToggle("slow", function() {});
	});
	jQuery(".myc-content-overlay .myc-content-overlay-header .dashicons-arrow-down-alt2").click(function(event){
		jQuery(this).hide();
		jQuery(this).parent().parent().removeClass("myc-toggle-open");
		jQuery(this).parent().parent().addClass("myc-toggle-closed");
		jQuery(this).parent().find(".dashicons-arrow-up-alt2").show();
		jQuery(this).parent().siblings(".myc-content-overlay-container, .myc-content-overlay-powered-by").slideToggle("slow", function() {});
	});
	
});

/**
 * Send API.AI query
 * 
 * @param text
 * @returns
 */
function textQuery(text) {

	jQuery.ajax({
		type : "POST",
		url : myc_script_vars.base_url + "query?v=" + myc_script_vars.version_date,
		contentType : "application/json; charset=utf-8",
		dataType : "json",
		headers : {
			"Authorization" : "Bearer " + myc_script_vars.access_token
		},
		data: JSON.stringify( {
			query: text, 
			lang: "en", 
			sessionId: "my-chatbot"
		} ),
		success : function(response) {
			prepareResponse(response);
		},
		error : function() {
			textResponse(myc_script_vars.messages.internal_error);
			jQuery("#myc-conversation-area").scrollTop(jQuery("#myc-conversation-area").prop("scrollHeight"));
		}
	});
}

/**
 * Handle API.AI response
 * 
 * @param response
 */
function prepareResponse(response) {
	
	if (response.status.code == "200" ) {
		
		jQuery(window).trigger("myc_response_success", response);
		
		jQuery("#myc-conversation-area .myc-conversation-response").removeClass("myc-is-active");
		
		var messages = response.result.fulfillment.messages;
		var numMessages = messages.length;
		var index = 0;
		for (index; index<numMessages; index++) { 
			var message = messages[index];
			
			if (myc_script_vars.messaging_platform == message.platform 
					|| myc_script_vars.messaging_platform == "default" && message.platform === undefined
					|| message.platform === undefined && ! hasPlatform(messages, myc_script_vars.messaging_platform) ) {
			
				switch (message.type) {
				    case 0: // text response
						textResponse(message.speech);	
				        break;
				    case 1: // card response
				        cardResponse(message.title, message.subtitle, message.buttons, message.text, message.postback);
				        break;
				    case 2: // quick replies
				    	quickRepliesResponse(message.title, message.replies);
				        break;
				    case 3: // image response
						imageResponse(message.imageUrl);	
				        break;
				    case 3: // custom payload
				        
				        break;
				    default:       
				}
			}
		} 
			
	} else {
		textResponse(myc_script_vars.messages.internal_error);
	}
	
	jQuery("#myc-conversation-area").scrollTop(jQuery("#myc-conversation-area").prop("scrollHeight"));
	
	if (jQuery("#myc-debug-data").length) {
		var debugData = JSON.stringify(response, undefined, 2);
		jQuery("#myc-debug-data").text(debugData);
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
 * @returns
 */
function textResponse(text) {
	if (text === "") {
		text = myc_script_vars.messages.internal_error;
	}
	jQuery("#myc-conversation-area").append("<div class=\"myc-conversation-bubble-container myc-conversation-bubble-container-response\"><div class=\"myc-conversation-bubble myc-conversation-response myc-is-active myc-text-response\">" + text + "</div></div>");
}

/**
 * Displays a image response
 * 
 * @param imageUrl
 * @returns
 */
function imageResponse(imageUrl) {
	if (imageUrl === "") {
		textResponse(myc_script_vars.messages.internal_error)
	} else {
		// FIXME wait for image to load by creating HTML first
		jQuery("#myc-conversation-area").append("<div class=\"myc-conversation-bubble-container myc-conversation-bubble-container-response\"><div class=\"myc-conversation-bubble myc-conversation-response myc-is-active myc-image-response\"><img src=\"" + imageUrl + "\"/></div></div>");
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
 */
function cardResponse(title, subtitle, buttons, text, postback) {
	var html = "<div class=\"myc-card-title\">" + title + "</div>";
	html += "<div class=\"myc-card-subtitle\">" + subtitle + "</div>";
	// TODO
}

/**
 * Quick replies response
 * 
 * @param title
 * @param replies
 */
function quickRepliesResponse(title, replies) {
	
	var html = "<div class=\"myc-quick-replies-title\">" + title + "</div>";
	
	var index = 0;
	for (index; index<replies.length; index++) { 
		html += "<input type=\"button\" class=\"myc-quick-reply\" value=\"" + replies[index] + "\" />";
	}
	
	jQuery("#myc-conversation-area").append("<div class=\"myc-conversation-bubble-container myc-conversation-bubble-container-response\"><div class=\"myc-conversation-bubble myc-conversation-response myc-is-active myc-quick-replies-response\">" + html + "</div></div>");

	jQuery("#myc-conversation-area .myc-is-active .myc-quick-reply").click(function(event) {
		event.preventDefault();
		jQuery("#myc-conversation-area .myc-conversation-request").removeClass("myc-is-active");
		var text = jQuery(this).val()
		jQuery("#myc-conversation-area").append("<div class=\"myc-conversation-bubble-container myc-conversation-bubble-container-request\"><div class=\"myc-conversation-bubble myc-conversation-request myc-is-active\">" + text + "</div><div>");
		textQuery(text);
	});
	
}

/**
 * Custom payload
 * 
 * @param payload
 */
function customPayload(payload) {
	
}