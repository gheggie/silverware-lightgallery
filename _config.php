<?php

/**
 * SilverWare lightGallery module configuration file
 *
 * @author Colin Tucker <colin@praxis.net.au>
 * @package silverware-lightgallery
 */

// Define Module Directory:

if (!defined('SILVERWARE_LIGHTGALLERY_DIR')) {
    define('SILVERWARE_LIGHTGALLERY_DIR', basename(__DIR__));
}

// Define lightGallery Distribution Directory:

if (!defined('LIGHTGALLERY_DIST_DIR')) {
    define('LIGHTGALLERY_DIST_DIR', SILVERWARE_LIGHTGALLERY_DIR . '/thirdparty/lightgallery');
}
