<?php

/*
Plugin Name: Custom Functions Plugin
Plugin URI: http://pippinsplugins.com/
Description: Put custom functions in this plugin
Author: Pippin Williamson
Author URI: http://pippinsplugins.com
Version: 10.0

Please think about where your functions belong and place them there. :)
Create new files and directories if necessary.
*/


/**
 * Definitions
 */
define( 'EDD_MENU_POSITION', 35 );
//define( 'EDD_SL_REDIRECT_UPDATES', true );
define( 'EDD_CUSTOM_FUNCTIONS', dirname(__FILE__) . '/includes/' );


/**
 * Include custom site functions
 */
include( EDD_CUSTOM_FUNCTIONS . '3rd-party-plugin-functions.php' );
include( EDD_CUSTOM_FUNCTIONS . 'analytics-functions.php' );
include( EDD_CUSTOM_FUNCTIONS . 'edd-filters-actions.php' );
include( EDD_CUSTOM_FUNCTIONS . 'misc-functions.php' );
include( EDD_CUSTOM_FUNCTIONS . 'shortcodes.php' );
include( EDD_CUSTOM_FUNCTIONS . 'taxonomies.php' );


/**
 * Include custom EDD extension functions
 */
include( EDD_CUSTOM_FUNCTIONS . 'extensions/software-licensing-functions.php' );
include( EDD_CUSTOM_FUNCTIONS . 'extensions/recurring-payments-functions.php' );
include( EDD_CUSTOM_FUNCTIONS . 'extensions/all-access-functions.php' );
