<?php

/**
 * An extension of the extension class which allows controllers to use lightGallery features.
 */
class LightGalleryControllerExtension extends Extension
{
    /**
     * Event handler method triggered after the controller has initialised.
     */
    public function onAfterInit()
    {
        if (defined('LIGHTGALLERY_DIST_DIR')) {
            
            // Load Required Stylesheets:
            
            Requirements::css(LIGHTGALLERY_DIST_DIR . '/css/lightgallery.min.css');
            Requirements::css(LIGHTGALLERY_DIST_DIR . '/css/lg-transitions.min.css');
            
            // Load Required JavaScript:
            
            Requirements::javascript(LIGHTGALLERY_DIST_DIR . '/js/lightgallery.min.js');
            Requirements::javascript(LIGHTGALLERY_DIST_DIR . '/js/lg-thumbnail.min.js');
            Requirements::javascript(LIGHTGALLERY_DIST_DIR . '/js/lg-fullscreen.min.js');
            
            // Load JavaScript Template:
            
            SilverWareTools::load_javascript_template(
                SILVERWARE_LIGHTGALLERY_DIR . '/javascript/lightgallery.init.js',
                array(
                    'json:Config' => SiteConfig::current_site_config()->getLightGalleryConfigArray()
                )
            );
            
        }
    }
}
