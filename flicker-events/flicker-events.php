<?php

/*
Plugin Name: Flicker Events
Plugin URI:  flickerleap.com
Description: Flicker events plugin
Version:     1.0
Author:      Shema
Author URI:  flickerleap.com
Text Domain: flicker-events
License:     MIT
 */

class flickerEvents
{
    /**
     * $isActive current active state of the plugin.
     * @var boolean
     */
    private $isActive = false;
    public function __construct()
    {
        // check if plugin is active.
        if (get_option('flicker-events-status') == 1) {
            // set current active status.
            $this->isActive = true;
            // include the files.
            $this->registerIncludes();
            // register all the hooks.
            $flickerHooks = new flickerEventsHooks();
            $flickerHooks->registerHooks();
        }
    }
    /**
     * registerIncludes include all the necessary classes and other files.
     * @return void
     */
    private function registerIncludes()
    {
        require_once plugin_dir_path(__FILE__) . '/includes/hooks/class-flicker-events-hooks.php';
        require_once plugin_dir_path(__FILE__) . '/includes/hooks/actions/class-flicker-action.php';
        require_once plugin_dir_path(__FILE__) . '/includes/hooks/actions/class-flicker-events-post.php';
        require_once plugin_dir_path(__FILE__) . '/includes/hooks/actions/class-flicker-events-metabox.php';
        require_once plugin_dir_path(__FILE__) . '/includes/hooks/actions/class-flicker-events-save-meta.php';
        require_once plugin_dir_path(__FILE__) . '/includes/hooks/actions/class-flicker-events-api.php';

    }
    /**
     * activate the function to run upon plugin activation.
     * @return [type] [description]
     */
    public function activate()
    {
        update_option('flicker-events-status', 1);
    }
    /**
     * deactivate the function to run upon plugin deactivation.
     * @return [type] [description]
     */
    public function deactivate()
    {
        update_option('flicker-events-status', 0);
    }
}
/**
 * $flickerEvents an instance of the main plugin class.
 * @var flickerEvents
 */
$flickerEvents = new flickerEvents();

// register plugin activation/deactivation and pass it an instance of the main plugin class.
register_activation_hook(__FILE__, array($flickerEvents, 'activate'));
register_deactivation_hook(__FILE__, array($flickerEvents, 'deactivate'));
