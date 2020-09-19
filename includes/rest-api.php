<?php
use Google\Cloud\Dialogflow\V2\SessionsClient;
use Google\Cloud\Dialogflow\V2\TextInput;
use Google\Cloud\Dialogflow\V2\QueryInput;
use Google\Cloud\Dialogflow\V2\EventInput;

require MYC_PLUGIN_DIR . 'vendor/autoload.php';


/**
 *  Dialogflow detect intent
 */
function myc_detect_intent( $request ) {

    $session_id = $request['sessionId'];
    $language_code = $request['lang'];
	
    $general_settings = (array) get_option( 'myc_general_settings' );
    $platform = strtolower( $general_settings['messaging_platform'] );

    $key_file_content = '';

    if ( defined( 'MYC_KEY_FILE_CONTENT' ) && $general_settings['key_file_option'] === 'config') {
        $key_file_content = MYC_KEY_FILE_CONTENT;
    } else if ( $general_settings['key_file_option'] === 'options' ) {
        $key_file_content = $general_settings['key_file_content'];
    }

    if ( strlen( $key_file_content ) === 0 ) {
        return;
    }

    $credentials = json_decode( $key_file_content, true );
    $project_id = $credentials['project_id'];

    $sessions_client = new SessionsClient( array(
        'credentials' =>  $credentials 
    ) );

    $session = $sessions_client->sessionName( $project_id, $session_id ?: uniqid() );

    $query_input = new QueryInput();
    if ( isset( $request['text'] ) ) { 
        $text_input = new TextInput();
        $text_input->setText( $request['text']);
        $text_input->setLanguageCode( $language_code );
        $query_input->setText( $text_input );
    } else if ( isset( $request['event'] ) ) {
        $event_input = new EventInput();
        $event_input->setName( $request['event'] );
        $event_input->setLanguageCode( $language_code ); 
        $query_input->setEvent( $event_input );   
    }

    // get response and relevant info
    $response = $sessions_client->detectIntent( $session, $query_input );
    $query_result = $response->getQueryResult();
    $query_text = $query_result->getQueryText();

    $fulfillment_messages = $query_result->getFulfillmentMessages();
    $messages = array();
    $i=0;
    $current_platform = 'default'; // can be changed in first iteration...
    while ($fulfillment_messages[$i]) {

        $current_message = $fulfillment_messages[$i]->serializeToJsonString();
        $current_message = json_decode( $current_message, true );

        $current_platform = 'default';
        // ensures responses are only returned for the first platform...
        if ( isset( $current_message['platform'] ) ) {
            $current_platform = strtolower( $current_message['platform'] );
        }

        // we only want text or custom responses from supported platforms
        if ( $current_platform === $platform && count( $current_message ) > 0 ) {
            array_push( $messages, $current_message );
        }

        $i++;
    }

    // ensure only unique responses are returned
    $messages = array_unique( $messages, SORT_REGULAR );

    $sessions_client->close();

	return rest_ensure_response( array( 'messages' =>  $messages ) );

}


/**
 * REST API arguments
 */
function myc_apply_args() {
	$args = array();
    // Here we are registering the schema for the filter argument.
    $args['text'] = array(
        'description' => esc_html__( 'Text', 'my-chatbot' ),
        'type'        => 'string',
        'required'		=> false,
        'validate_callback' => 'myc_validate_string_arg',
        'sanitize_callback' => 'myc_sanitize_string_arg',
    );
    $args['event'] = array(
        'description' => esc_html__( 'Event', 'my-chatbot' ),
        'type'        => 'string',
        'required'      => false,
        'validate_callback' => 'myc_validate_string_arg',
        'sanitize_callback' => 'myc_sanitize_string_arg',
    );
    $args['lang'] = array(
        'description' => esc_html__( 'Language', 'my-chatbot' ),
        'type'        => 'string',
        'required'      => true,
        'validate_callback' => 'myc_validate_string_arg',
        'sanitize_callback' => 'myc_sanitize_string_arg',
    );
    $args['sessionId'] = array(
        'description' => esc_html__( 'Session Id', 'my-chatbot' ),
        'type'        => 'string',
        'required'      => true,
        'validate_callback' => 'myc_validate_string_arg',
        'sanitize_callback' => 'myc_sanitize_string_arg',
    );
    return $args;
}

/**
 * Validate request string arg
 */
function myc_validate_string_arg( $value, $request, $param ) {
    if ( ! is_string( $value ) ) {
        return new WP_Error( 'rest_invalid_param', esc_html__( 'The argument must be a string.', 'my-chatbot' ), array( 'status' => 400 ) );
    }
}
 
/**
 * Sanitize request string arg
 */
function myc_sanitize_string_arg( $value, $request, $param ) {
    return sanitize_text_field( $value );
}

/**
 *
 */
function myc_register_routes() {
	register_rest_route( 'myc/v1', '/detectIntent', array(
        'methods'  => WP_REST_Server::CREATABLE,
        'callback' => 'myc_detect_intent',
        'args' => myc_apply_args()
    ) );
}
add_action( 'rest_api_init', 'myc_register_routes' );