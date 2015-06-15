<?php
/*
Plugin Name: LSD Google Maps Embedder
Plugin URI: http://www.bas-matthee.nl
Description: Embed a Google Maps frame inside your posts and pages
Author: Bas Matthee
Version: 1.1
Author URI: https://www.twitter.com/BasMatthee
*/

// define URL
define('LSD_GME_ABSPATH', WP_PLUGIN_DIR.'/'.plugin_basename( dirname(__FILE__) ).'/' );
define('LSD_GME_URLPATH', WP_PLUGIN_URL.'/'.plugin_basename( dirname(__FILE__) ).'/' );

// Options page
if (is_admin()) {
    
    include LSD_GME_ABSPATH.'/views/options.php';
    
    $lsd_gme_options = new lsd_gme_options();
    
    include LSD_GME_ABSPATH.'/views/tinymce.php';
    
    $lsd_gme_tinymce = new lsd_gme_tinymce();
    
}

include LSD_GME_ABSPATH.'/views/shortcode.php';