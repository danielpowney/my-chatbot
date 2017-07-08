// Based on blog post: https://www.sitepoint.com/how-to-build-your-own-ai-assistant-using-api-ai/
// Source code: https://github.com/sitepoint-editors/Api-AI-Personal-Assistant-Demo/blob/master/index.html.
// Demo: https://devdiner.com/demos/barry/

jQuery(document).ready(function() {
	
	/*
	 * When the user enters text in the speech input text field and then the presses Enter key
	 */
	jQuery("input#myc-speech").keypress(function(event) {
		if (event.which == 13) {
			event.preventDefault();
			jQuery("#myc-conversation-area .myc-conversation-request").removeClass("is-active");
			var speechRequest = jQuery("input#myc-speech").val();
			jQuery("#myc-conversation-area").append("<div class=\"myc-conversation-bubble-container\"><div class=\"myc-conversation-bubble myc-conversation-request\">" + speechRequest + "</div><div>").addClass("is-active");
			jQuery("input#myc-speech").val("");
			send(speechRequest);
		}
	});
	
});

/*
 * Send API.AI query
 */
function send(speechRequest) {

	jQuery.ajax({
		type : "POST",
		url : myc_script_vars.base_url + "query",
		contentType : "application/json; charset=utf-8",
		dataType : "json",
		headers : {
			"Authorization" : "Bearer " + myc_script_vars.access_token
		},
		data: JSON.stringify( {
			query: speechRequest, 
			lang: "en", 
			sessionId: "my-chatbot"
		} ),
		success : function(responseData) {
			prepareResponse(responseData);
		},
		error : function() {
			conversationResponse(myc_script_vars.messages.internal_error);
		}
	});
}

/**
 * Handle API.AI response
 * 
 * @param data
 */
function prepareResponse(responseData) {
	var speechResponse = responseData.result.speech;
	
	if (speechResponse == "") {
		speechResponse = myc_script_vars.messages.input_unknown;
	}
	
	conversationResponse(speechResponse);
	
	if (jQuery("#myc-debug-data").length) {
		var debugData = JSON.stringify(responseData, undefined, 2);
		jQuery("#myc-debug-data").text(debugData);
	}
}

function conversationResponse(speechResponse) {
	jQuery("#myc-conversation-area .myc-conversation-response").removeClass("is-active");
	jQuery("#myc-conversation-area").append("<div class=\"myc-conversation-bubble-container\"><div class=\"myc-conversation-bubble myc-conversation-response\">" + speechResponse + "</div></div>").addClass("is-active");
	
}