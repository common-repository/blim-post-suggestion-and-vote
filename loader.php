<?php
//constants 
require_once dirname( BLIM_FILE ) . DIRECTORY_SEPARATOR . 'constant.php';

/**
 * This is where all the classes and views are loaded
 */
//activator
require_once BLIM_ACTIVATOR_PATH .
    DIRECTORY_SEPARATOR .
    'class.blim-activator.php';

//view
require_once BLIM_SUGGESTIONVIEW_PATH .
    DIRECTORY_SEPARATOR . 'suggestion_main.php';
require_once BLIM_VOTEVIEW_PATH .
    DIRECTORY_SEPARATOR . 'vote_main.php';
require_once BLIM_ADMINVIEW_PATH .
    DIRECTORY_SEPARATOR . 'admin_main.php';
    
//model
require_once BLIM_MODEL_PATH .
    DIRECTORY_SEPARATOR . 'class-wpdb.php';

//controller classes
require_once BLIM_CONTROLLER_PATH .
    DIRECTORY_SEPARATOR .
    'class.blim-export-controller.php';
require_once BLIM_CONTROLLER_PATH .
    DIRECTORY_SEPARATOR .
    'class.blim-option-controller.php';
require_once BLIM_CONTROLLER_PATH .
    DIRECTORY_SEPARATOR .
    'class.blim-vote-controller.php';
require_once BLIM_CONTROLLER_PATH .
    DIRECTORY_SEPARATOR .
    'class.blim-main-controller.php';


    
