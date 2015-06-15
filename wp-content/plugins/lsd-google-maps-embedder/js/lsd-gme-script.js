var CreateLSDGME = {
	e: '',
	init: function(e) {
		CreateLSDGME.e = e;
		tinyMCEPopup.resizeToInnerSize();
	},
	insert: function createGalleryShortcode(e) {
		
        //Create gallery Shortcode
		var type        = jQuery('#select-type').val();
		var origin      = jQuery('#origin').val();
        var location1   = jQuery('#location1').val();
        var location2   = jQuery('#location2').val();
        var center      = jQuery('#center').val();
        var maptype     = jQuery('#maptype').val();
        var zoom        = jQuery('#zoom').val();
        var q           = jQuery('#q').val();
			
		var output = '[lsd_gme ';
        
		if (type == 'place') {
			output += 'type="'+type+'" ';
            output += 'q="'+location1+'" ';
		}
        
        if (type == 'directions') {
       	    output += 'type="'+type+'" ';
			output += 'origin="'+origin+'" ';
            output += 'destination="'+location2+'" ';
            
            avoid = '';
            set = false;
            
            if (jQuery('#avoid-tolls').attr('checked')) {
                avoid += 'tolls'
                set = true;
            }
            if (jQuery('#avoid-ferries').attr('checked')) {
                if (set) {
                    avoid += '|';
                }
                avoid += 'ferries'
                set = true;
            }
            if (jQuery('#avoid-highways').attr('checked')) {
                if (set) {
                    avoid += '|';
                }
                avoid += 'highways'
            }
            
            output += 'avoid="'+avoid+'" ';
            
		}
        
        if (type == 'search') {
			output += 'type="'+type+'" ';
            output += 'q="'+q+'" ';
            if (zoom != '') {
                output += 'zoom="'+zoom+'" ';
            }
		}
        
        if (type == 'view') {
			output += 'type="'+type+'" ';
            output += 'maptype="'+maptype+'" ';
            output += 'zoom="'+zoom+'" ';
            output += 'center="'+center+'" ';
		}
        
		output += ']';
		
		tinyMCEPopup.execCommand('mceReplaceContent', false, output);
		
		tinyMCEPopup.close();
		
	}
}
tinyMCEPopup.onInit.add(CreateLSDGME.init, CreateLSDGME);