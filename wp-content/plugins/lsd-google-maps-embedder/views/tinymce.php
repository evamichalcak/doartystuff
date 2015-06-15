<?php

class lsd_gme_tinymce {
    
    private $pluginname = 'lsd_gme';
    
    public function __construct() {
        
        add_action('admin_enqueue_scripts', array(&$this, 'adminEnqueueScripts') );
        
        // Modify the version when tinyMCE plugins are changed.
		add_filter('tiny_mce_version', array (&$this, 'change_tinymce_version') );
		
        add_action('init', array (&$this, 'add_buttons') );
        
    }
    
    public function add_buttons() {
        
        //wp_register_script( 'lsd-gme-script', LSD_GME_URLPATH.'js/lsd-gme-script.js'); 
        
        // Don't bother doing this stuff if the current user lacks permissions
        if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) return;
        
        // Add only in Rich Editor mode
        if ( get_user_option('rich_editing') == 'true') {
            
            // add the button for wp2.5 in a new way
            add_filter("mce_external_plugins", array (&$this, "add_tinymce_plugin" ), 5);
            add_filter('mce_buttons_2', array(&$this, 'register_button') );
        	
        }
        
    }
    
    // Load the TinyMCE plugin : spm-gme.js
	public function add_tinymce_plugin($plugin_array) {
	    
		$plugin_array[$this->pluginname] =  LSD_GME_URLPATH.'js/lsd-gme.js';
		
		return $plugin_array;
        
	}
    
    // used to insert button in wordpress 2.5x editor
	public function register_button($buttons) {

		array_push($buttons, "separator", $this->pluginname );
	
		return $buttons;
        
	}
    
	public function change_tinymce_version($version) {
	   
		return ++$version;
        
	}
	
    public function adminEnqueueScripts() {
        
		wp_enqueue_script('jquery');
        wp_enqueue_script('wpdialogs');
        wp_enqueue_script( 'jquery-ui-draggable' );
		wp_enqueue_script( 'jquery-ui-resizable' );
		wp_enqueue_script( 'jquery-ui-dialog' );
		//wp_enqueue_script('lsd-gme-script');
        
	}
    
}