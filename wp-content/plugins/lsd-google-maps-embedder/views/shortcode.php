<?php

class lsd_gme_shortcode {
		
	// register the new shortcodes
	function lsd_gme_shortcode() {
	    
		add_shortcode( 'lsd_gme', array(&$this, 'show_google_maps') );
			
	}

	function show_google_maps( $atts ) {
	    
        $config = get_option("lsd_gme_config");
        
		extract(shortcode_atts(array(
			'height'        => 300,
			'width'         => '100%',
            'location1'     => 'Leusden, Utrecht, The Netherlands',
            'origin'        => 'Leusden, Utrecht, The Netherlands',
            'destination'   => 'Amsterdan, Utrecht, The Netherlands',
            'type'          => 'directions',
            'zoom'          => '',
            'avoid'         => 'tolls|ferries|highways',
            'q'             => 'Leusden, Utrecht, The Netherlands',
            'center'        => '52.1188249,5.4036785',
            'maptype'       => 'sattelite'
            
		), $atts ));
		
        $src = 'https://www.google.com/maps/embed/v1/'.$type;
        $src .= '?key='.$config['google_maps_api_key'];
            
        if ($type == 'place') {
            
            $src .= '&q='.urlencode($q);
            
        } elseif ($type == 'search') {
            
            $src .= '&q='.urlencode($q);
            if (isset($zoom) && $zoom != '') {
                $src .= '&zoom='.urlencode($zoom);
            }
            
        } elseif ($type == 'directions') {
            
            $src .= '&origin='.urlencode($origin);
            $src .= '&destination='.urlencode($destination);
            $src .= '&avoid='.$avoid;
            
        } elseif ($type == 'view') {
            
            $src .= '&center='.$center;
            $src .= '&zoom='.$zoom;
            $src .= '&maptype='.$maptype;
            
        }
        
		$return = '<iframe width="' . $width . '" height="' . $height . '" frameborder="0" scrolling="no" src="' . $src . '"></iframe>';
		
		return $return;
		
	}	
}

// let's use it
$cets_EmbedGmapsShortcodes = new lsd_gme_shortcode;	