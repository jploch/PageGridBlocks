/**
 * Example “Hello” plugin
 *
 */
tinymce.PluginManager.add('iconpicker', (editor, url) => {
	editor.ui.registry.addButton('iconpicker', {
		text: 'iconpicker',
		icon: 'user',
		onAction: function() {
			showIconList();
		}
	});
	// Adds a menu item, which can then be included in any menu via the menu/menubar configuration 
	editor.ui.registry.addMenuItem('iconpicker', {
		text: 'iconpicker',
		icon: 'user',
		onAction: function() {
			showIconList();
		}
	});
	// Return metadata for the plugin 
	return {
		getMetadata: () => ({ name: 'iconpicker' })
	};
});

showIconList() {
	alert('iconpicker');
};