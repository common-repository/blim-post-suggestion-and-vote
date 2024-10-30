<?php

namespace BlimPostSuggestionAndVote\Controller;
use BlimPostSuggestionAndVote\View\Suggestion as suggestion;
use BlimPostSuggestionAndVote\View\Vote as vote;
use BlimPostSuggestionAndVote\View\Admin as admin;

use WP_Post;

class Blim_Export_Controller
{
    /**
     * Render suggested post into view
     * @param WP_Post $sibling_post
     * @return string
     */
    static function suggestion( WP_Post $sibling_post )
    {
        ob_start();
        suggestion::blim_bpsv_suggestion_show( $sibling_post );
        return ob_get_clean();
    }
    /**
     * Render suggested post into view
     * @param array $vote_details
     * @return string
     */
    static function vote( $vote_data )
    {
        ob_start();
        vote::blim_bpsv_vote_show( $vote_data );
        return ob_get_clean();
    }
    /**
     * Render suggested post into view
     * @return string
     */
    static function plugin_options_page()
    {
        // ob_start();
        admin::blim_bpsv_admin_show();
        // echo ob_get_clean();
    }
}
