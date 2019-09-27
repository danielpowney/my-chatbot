<?php
/**
 * Misc Functions
 *
 * @package     MYC
 * @subpackage  Token
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 */

// Exit if accessed directly
if (! defined ( 'ABSPATH' ))
	exit ();

// run this if keyfile exists
$keyfile = MYC_PLUGIN_DIR . 'key.json';
if (file_exists($keyfile)) {

  //incase allready loaded in by something else
  if( !class_exists( 'Google_Client' ) )
  {
    $library_to_include = MYC_PLUGIN_DIR . 'library/google-api-php-client-2.4.0/vendor/autoload.php';
    require_once $library_to_include;

  }

  //call class one loaded in for sure
  if( class_exists( 'Google_Client' ) ) {

    global $wpdb;
    $table_name = $wpdb->prefix . 'myc_token';

    $gettoken = false;

    $sql = "SELECT * FROM {$table_name}";
    $result = $wpdb->get_results( $sql );

    if (!empty($result)) {
      if (time() > $result[0]->validuntil) {
        $gettoken = true;
      }
    } else {
      $gettoken = true;
    }

    if ($gettoken) {
      $wpdb->delete( $table_name, array(
          'id' => $result[0]->id
        ), array(
          '%d'
        )
      );

      putenv("GOOGLE_APPLICATION_CREDENTIALS={$keyfile}");
      $scope = 'https://www.googleapis.com/auth/dialogflow';
      $client = new Google_Client();
      $client->setScopes($scope);
      $client->useApplicationDefaultCredentials();
      $token = $client->fetchAccessTokenWithAssertion();
      $token['validuntil'] = $token['created'] + $token['expires_in'];

      $wpdb->insert( $table_name, array(
          'token' => $token['access_token'],
          'timecreated' => $token['created'],
          'validuntil' => $token['validuntil']
        ), array(
          '%s',
          '%s',
          '%s'
        )
      );

    }


  }
}
