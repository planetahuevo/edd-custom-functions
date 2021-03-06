<?php
/*
 * edd-filters-actions.php
 */


/**
 * Disable API request logging
 */
add_filter( 'edd_api_log_requests', '__return_false' );


/**
 * Disable heartbeat in dashboard
 */
remove_action( 'plugins_loaded', array( 'EDD_Heartbeat', 'init' ) );


/**
 * Allow all usernames
 */
add_filter( 'edd_validate_username', '__return_true' );


/**
 * If the page loaded is the homepage, we don't need to start a session if one doesn't exist
 */
function eddwp_maybe_start_session( $start_session ) {

	if ( '/' == $_SERVER['REQUEST_URI'] ) {
		$start_session = false;
	}

	if( false !== strpos( $_SERVER['REQUEST_URI'], '/downloads' ) && '/downloads/' === trailingslashit( $_SERVER['REQUEST_URI'] ) ) {
		$start_session = false;
	}

	if( empty( $_REQUEST['edd_action'] ) && false === strpos( $_SERVER['REQUEST_URI'], '/downloads' ) ) {
		//	$start_session = false;
	}

	$to_skip = array(
		'activate_license',
		'deactivate_license',
		'check_license',
		'checkin',
		'get_version'
	);

	if( ! empty( $_REQUEST['edd_action'] ) && in_array( $_REQUEST['edd_action'], $to_skip ) ) {
		$start_session = false;
	}

	// Finally, if there is a discount in the GET parameters, we should always start a session, so it applies correctly.
	if ( ! empty( $_GET['discount'] ) ) {
		$start_session = true;
	}

	return $start_session;
}
add_filter( 'edd_start_session', 'eddwp_maybe_start_session', 10, 1 );