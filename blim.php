<?php
/**
 * @package Blim
 * 
 * Plugin Name: Blim Post Suggestion and Vote
 * Plugin URI: https://businesstosales.com/contact.html
 * Description: Suggest next post based on user current posts. Also, when the plugin gives users the opportunity to engage blog posts by upvoting or downvoting. <strong>NB: All counted votes will be removed when plugin is deactivated</strong>
 * Author: Udor Blessing
 * Author URI: https://twitter.com/knight_b_u
 * Version: 1.0.4
 * Text Domain: blim-plugin
 * Text Path: blessing
 * Network: True
 * License: GPLv2 or later
 * */

//If this file is called directly, abort.
defined( 'ABSPATH' ) or die( 'Normal humans go through the door' );

define( 'BLIM_FILE', __FILE__ );

define( 'BLIM_MIN_PHP', '5.6.0' );


// Check PHP Version and deactivate & die if it doesn't meet minimum requirements.
if ( version_compare( PHP_VERSION, BLIM_MIN_PHP, '<' ) ) {
    deactivate_plugins( plugin_basename( BLIM_FILE ) );
    wp_die( 'This plugin requires a minimum PHP Version of ' . BLIM_MIN_PHP );
}
// loader
require_once dirname( BLIM_FILE ) . DIRECTORY_SEPARATOR . 'loader.php';


// =========================================================================
// = All app initialization is done in Blim_Main_Controller __constructor =
// =========================================================================
// Check the minimum required PHP version and run the plugin.
if ( version_compare( PHP_VERSION, BLIM_MIN_PHP, '>=' ) ) 
{
    $main_controller = new BlimPostSuggestionAndVote\Controller\Blim_Main_Controller();
}
