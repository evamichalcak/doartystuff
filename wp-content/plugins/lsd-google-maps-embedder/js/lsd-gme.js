(function() {
	tinymce.create('tinymce.plugins.lsd_gme', {
		/**
		 * Initializes the plugin, this will be executed after the plugin has been created.
		 * This call is done before the editor instance has finished its initialization so use the onInit event
		 * of the editor instance to intercept that event.
		 *
		 * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
		 * @param {string} url Absolute URL to where the plugin is located.
		 */
		init : function(ed, url) {
		  
			ed.addCommand('lsd_gme_popup', function() {
                ed.windowManager.open({
                    id : 'lsd-gme',
                    width : 550,
                    height : 340,
                    title  : 'LSD Google Maps Embedder',
                    file   : url+'/window.html',
                    inline: 1,
                    onsubmit: function( e ) {
                        editor.insertContent(e.data.framecode);
                    }
                });
            }, {
                plugin_url : url
            });
            
            // Register example button
			ed.addButton('lsd_gme', {
				title : 'LSD Google Maps Embedder',
				image : url + '/lsd-gme.png',
				cmd   : 'lsd_gme_popup'
			});
            
//            // Add a node change handler, selects the button in the UI when a image is selected
//			ed.onNodeChange.add(function(ed, cm, n) {
//				cm.setActive('lsd_gme', n.nodeName == 'IMG');
//			});
            
		},
		/**
		 * Returns information about the plugin as a name/value array.
		 * The current keys are longname, author, authorurl, infourl and version.
		 *
		 * @return {Object} Name/value array containing information about the plugin.
		 */
		getInfo : function() {
			return {
				longname    : 'LSD Google Maps Editor',
				author      : 'Bas Matthee',
				authorurl   : 'https://www.twitter.com/BasMatthee',
				infourl     : 'http://www.bas-matthee.nl',
				version     : '1.0'
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('lsd_gme', tinymce.plugins.lsd_gme);
})();