<?php

namespace BlimPostSuggestionAndVote\Controller;

use BlimPostSuggestionAndVote\Controller\Blim_Export_Controller as export;
use BlimPostSuggestionAndVote\Controller\Blim_Vote_Controller as vote;

class Blim_Main_Controller
{
    function __construct()
    {
        $this->activate_add_action();
        $this->activate_filter_action();
    }

    /**
     * Enqueue all styles and assets
     * @return void
     */
    function enqueue_action()
    {
        wp_enqueue_style( BLIM_PLUGIN_NAME . 'main_style', BLIM_MAINSTYLE_PATH, array(), BLIM_VER, 'all' );

        wp_enqueue_script( BLIM_PLUGIN_NAME . '_main_js', BLIM_MAINSCRIPT_PATH, array(), BLIM_VER, 'all' );

        wp_localize_script(
            BLIM_PLUGIN_NAME . '_main_js',
            'blim_vote_object',
            array('blim_ajax_url' => admin_url('admin-ajax.php'), 'blim_post_id' => get_the_ID(),'blim_wp_nonce'=> wp_create_nonce( 'blim_vote_'.get_the_ID()))
        );
    }

    /**
     * Activate hook action
     */
    function activate_add_action()
    {
        if (is_admin()) { // admin actions
            add_action( 'admin_menu', array('BlimPostSuggestionAndVote\Controller\Blim_Option_Controller', 'blim_register_option_page') );

            add_action( 'wp_ajax_blim_update_vote_count', array('BlimPostSuggestionAndVote\Controller\Blim_Vote_Controller', 'update') );

            add_action( 'wp_ajax_nopriv_blim_update_vote_count', array('BlimPostSuggestionAndVote\Controller\Blim_Vote_Controller', 'update') );

            add_action( 'admin_enqueue_scripts', array($this, 'enqueue_action') );

            add_action( 'admin_init', array('BlimPostSuggestionAndVote\Controller\Blim_Option_Controller', 'blim_register_settings') );
        } else {
            // non-admin enqueues, actions, and filters
            add_action( 'wp_enqueue_scripts', array($this, 'enqueue_action') );
        }

        register_activation_hook( BLIM_FILE, array('BlimPostSuggestionAndVote\Activator\Blim_Activator', 'plugin_activation') );
        /**
         * The code that runs during plugin deactivation.
         * This action is documented activator/class.blim-activator.php
         */

        register_deactivation_hook( BLIM_FILE, array( 'BlimPostSuggestionAndVote\Activator\Blim_Activator', 'plugin_deactivation' ) );
    }
    /**
     * Filter hook
     * @return void
     */
    function activate_filter_action()
    {
        
        add_filter( 'the_content', array( $this, 'show_feature' ) );
        
    }
    /**
     * Render feature to users
     * @param string $content
     * @return string
     */
    function show_feature( $content )
    {
        $options = get_option( 'blim_options' );
        $blim_content = '';
        if ( is_single() && !empty( $GLOBALS['post'] ))
        {
        if ( in_array( $options['feature'], ['both', 'suggestion'] ) ) 
            $blim_content .= $this->get_post_sibling();
        if (in_array($options['feature'], ['both', 'vote']))
            $blim_content .= vote::show( get_the_ID() );
        }
        return $content . $blim_content;
    }
    /**
     * Get similar post
     * @param string $content
     * @return string
     */
    function get_post_sibling( $content = '' )
    {
        if (is_single() && !empty( $GLOBALS['post'] )) {
            $current_post_id = get_the_ID();
            if ( $GLOBALS['post']->ID == $current_post_id ) {

                $content .= $this->generate( get_the_category()[0]->term_id, $current_post_id );
            }
        }
        return $content;
    }
    /**
     * Conjure a new view from post category
     * @param int $cat_id Category id
     * @param int $current_post_id Current post id
     * @return string
     */
    function generate( $cat_id, $current_post_id )
    {
        $args = array(
            'numberposts'   => rand(1,3),
            'category'         =>  $cat_id,
            'order'            => rand( 0, 1 ) ? 'DESC' : 'ASC',
            'exclude' => $current_post_id
        );
     
        $sibling_post = get_posts( $args )[0];
        if ( is_null($sibling_post) )
            return '';
        $permalink = get_permalink( $sibling_post );
        $sibling_post->permalink = $permalink ? $permalink :
        $sibling_post->guid;
        $thumbnail = get_the_post_thumbnail_url( $sibling_post );
        $sibling_post->image = $thumbnail ? $thumbnail : BLIM_DEFAULT_IMAGE;
        return export::suggestion( $sibling_post );
    }
}
