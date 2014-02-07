
(function() {
	tinymce.create('tinymce.plugins.buttonPlugin', {
		init : function(ed, url) {
			ed.addCommand('mcebutton', function() {
				ed.windowManager.open({
					file : url + '/popup.php', // file that contains HTML for our modal window
					width : 850 + parseInt(ed.getLang('button.delta_width', 0)), // size of our window
					height : 550 + parseInt(ed.getLang('button.delta_height', 0)), // size of our window
					inline : 1
				}, {
					plugin_url : url
				});
			});
			 
			// Register buttons
			ed.addButton('kauri_button', {title : 'Insert Shortcodes', cmd : 'mcebutton', image: url + '/images/icon.png' });
		},
		 
		getInfo : function() {
			return {
				longname : 'Insert Shortcodes',
				author : 'Pippin Williamson',
				authorurl : 'http://pippinsplugins.com',
				infourl : 'http://pippinsplugins.com',
				version : tinymce.majorVersion + "." + tinymce.minorVersion
			};
		}
	});
	 
	tinymce.PluginManager.add('kauri_button', tinymce.plugins.buttonPlugin);

})();