<?php

namespace BlimPostSuggestionAndVote\Activator;
use BlimPostSuggestionAndVote\Controller\Blim_Vote_Controller as vote;
class Blim_Activator
{
    /**
     * Run when plugin is activated
     * @return void
     * 
     */
    static function plugin_activation()
    {
        add_option( 'blim_options', ['feature' => 'both'] );
    }
    /**
     * Run when plugin is deactivated
     * @return void
     */
    static function plugin_deactivation()
    {
        // reset options
        delete_option( 'blim_options' );
        //delete all stored votes
        vote::delete();
    }
}
