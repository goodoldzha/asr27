(function() {
	tinymce.PluginManager.requireLangPack('smiliesforwp');
	tinymce.create('tinymce.plugins.SmiliesForWpPlugin', {
		init : function(ed, url) {
			ed.addCommand('mceSmiliesInsert', function() {
				ed.windowManager.open({
					file : url + '/popup.php',
					width : 405 + parseInt(ed.getLang('emotions.delta_width', 0)),
					height : 180 + parseInt(ed.getLang('emotions.delta_height', 0)),
					inline : 1
				}, {
					plugin_url : url
				});
			});
			ed.addButton('smiliesforwp', {
				title : 'smiliesforwp.insert_smile',
				cmd : 'mceSmiliesInsert',
				image : url + '/1.gif'
			});
		},
		getInfo : function() {
			return {
				longname : 'WP-Smiley',
				author : 'As247',
				authorurl : 'http://as247.vui360.com',
				infourl : 'http://www.theanh.vui360.com/blog/wp-smiley/',
				version : "1.0"
			};
		}
	});
	tinymce.PluginManager.add('smiliesforwp', tinymce.plugins.SmiliesForWpPlugin);
})();