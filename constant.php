<?php
/**
 * This is where all the constants are defined
 */
// Basic constants
define( 'BLIM_PLUGIN_NAME', 'BLIM' );

define( 'BLIM_VER', 'v1.0' );

define( 'BLIM_URL_SLASH', '/' );

// Plugin Basename
define( 'BLIM_PLUGIN_BASENAME', basename(BLIM_FILE) );

// Plugin Path
define( 'BLIM_PATH', dirname(BLIM_FILE) );

// Plugin URL
define( 'BLIM_URL', plugin_dir_url(BLIM_FILE) );

// ===================
// = Top Paths =
// ===================

//Library
define( 'BLIM_LIB_PATH', BLIM_PATH . DIRECTORY_SEPARATOR . 'lib' );

//Ajax URI
define( 'BLIM_AJAX_URI', BLIM_URL .  'ajax' );

//Ajax Directory
define( 'BLIM_AJAX_PATH', BLIM_PATH . DIRECTORY_SEPARATOR .'ajax' );

//Assets
define( 'BLIM_ASSETS_PATH', BLIM_URL . 'assets' );

//View
define( 'BLIM_VIEW_PATH',  BLIM_PATH . DIRECTORY_SEPARATOR . 'view' );

// ===================
// = Activator Path =
// ===================

define( 'BLIM_ACTIVATOR_PATH', BLIM_LIB_PATH . DIRECTORY_SEPARATOR . 'activator' );

// ===================
// = Controller Path =
// ===================

define( 'BLIM_CONTROLLER_PATH', BLIM_LIB_PATH . DIRECTORY_SEPARATOR . 'controller' );

// ===================
// = Model Path =
// ===================

define( 'BLIM_MODEL_PATH', BLIM_LIB_PATH . DIRECTORY_SEPARATOR . 'model' );

// ===================
// = Vendor Path =
// ===================

define( 'BLIM_VENDOR_PATH', BLIM_LIB_PATH . DIRECTORY_SEPARATOR . 'vendor' );

define( 'BLIM_BANDARVENDOR_PATH', BLIM_VENDOR_PATH . DIRECTORY_SEPARATOR . 'bandar' );

// ===================
// = View Path =
// ===================

define( 'BLIM_SUGGESTIONVIEW_PATH', BLIM_VIEW_PATH . DIRECTORY_SEPARATOR . 'suggestion' );

define( 'BLIM_ADMINVIEW_PATH', BLIM_VIEW_PATH . DIRECTORY_SEPARATOR . 'admin' );

define( 'BLIM_VOTEVIEW_PATH', BLIM_VIEW_PATH . DIRECTORY_SEPARATOR . 'vote' );

// ===================
// = CSS Path =
// ===================

define( 'BLIM_ASSETSCSS_PATH', BLIM_ASSETS_PATH . BLIM_URL_SLASH . 'css' );

define( 'BLIM_MAINSTYLE_PATH', BLIM_ASSETSCSS_PATH . BLIM_URL_SLASH . 'blim_mainstyle.css' );

// ===================
// = JS Path =
// ===================

define( 'BLIM_ASSETSJS_PATH', BLIM_ASSETS_PATH . BLIM_URL_SLASH . 'js' );

define( 'BLIM_MAINSCRIPT_PATH', BLIM_ASSETSJS_PATH . BLIM_URL_SLASH . 'blim_mainscript.js' );

// ===================
// = IMAGE Path =
// ===================

define( 'BLIM_ASSETSIMG_PATH', BLIM_ASSETS_PATH . BLIM_URL_SLASH . 'img' );

define( 'BLIM_DEFAULT_IMAGE', BLIM_ASSETSIMG_PATH . BLIM_URL_SLASH . 'default.jpg' );