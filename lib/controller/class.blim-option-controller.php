<?php

namespace BlimPostSuggestionAndVote\Controller;

class Blim_Option_Controller
{
    /**
     * Add blim setting menu to main admin settings menu
     * @return void
     */
    static function blim_register_option_page()
    {
        add_options_page( 'Blim settings', '	
        Blim Post Suggestion and Vote', 'manage_options', 'blim_option_settings', 'BlimPostSuggestionAndVote\Controller\Blim_Export_Controller::plugin_options_page' );
    }
    /**
     * Register a options setting
     * @return void
     */
    static function blim_register_settings()
    {
        register_setting( 'blim_options_group', 'blim_options' );
    }
}
