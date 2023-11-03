/**
 * Get uptodate material icon list from: https://fonts.google.com/metadata/icons?key=material_symbols&incomplete=true
 * Google is not allowing to access it through js, so have to put it manually for now
 */
var urlRoot = '/site/modules/PageGridBlocks/tinymce_plugins/iconpicker/assets/';
var icons = [];

tinymce.PluginManager.add('iconpicker', (editor, url) => {

	editor.ui.registry.addButton('iconpicker', {
		tooltip: 'Icons',
		icon: 'temporary-placeholder',
		onAction: function () {
			getJSON((jsonData) => {
				if (jsonData) {
					console.log(jsonData);
					icons = jsonData.icons;
					showDialog();
				}
			});
		}
	});

	// Adds a menu item, which can then be included in any menu via the menu/menubar configuration 
	editor.ui.registry.addMenuItem('iconpicker', {
		tooltip: 'Icons',
		icon: 'temporary-placeholder',
		onAction: function () {
			getJSON((jsonData) => {
				if (jsonData) {
					icons = jsonData.icons;
					showDialog();
				}
			});
		}
	});
	// Return metadata for the plugin 
	return {
		getMetadata: () => ({ name: 'iconpicker' })
	};
});


//custom functions
function showDialog() {
	let dialogWidth = document.body.clientWidth || 400;
	tinymce.DOM.loadCSS(urlRoot + 'style.css');
	tinymce.DOM.loadCSS(urlRoot + 'style-free.css');
	tinymce.DOM.loadCSS(urlRoot + 'material-icons.css');

	tinymce.activeEditor.windowManager.open({
		title: 'Material Icons',
		body: {
			type: 'panel',
			items: [{
				type: 'htmlpanel',
				html: renderBody()
			}]
		},
		buttons: [],
		width: dialogWidth,
		height: 240
	});

	//attach click events
	let elementsArray = document.querySelectorAll(".mce-iconpicker--content .mce-iconpicker--icon");

	elementsArray.forEach(function (elem) {
		elem.addEventListener("click", function (e) {
			tinymce.activeEditor.insertContent(e.target.outerHTML);
			tinymce.activeEditor.windowManager.close();
		});
	});
}


function getJSON(callback) {
	let url = urlRoot + 'material-icons.json';
	fetch(url)
		.then(response => response.json())
		.then(json => callback(json))
		.catch(error => callback(null))
}

function renderBody() {
	var bodyHtml = '';
	bodyHtml += '<input type="text" class="mce-iconpicker--search" onkeyup="search()" placeholder="Search for names..">'
	bodyHtml += '<div class="mce-iconpicker--body">'
	bodyHtml += '<div class="mce-iconpicker--content">'
	bodyHtml += renderIcons()
	bodyHtml += '	</div>'
	bodyHtml += '</div>'
	return bodyHtml
}

function renderIcons() {
	var html = ''
	console.log(icons);
	icons.forEach(function (icon) {
		console.log(icon);
		if (!icon) return;
		html += '<span class="mce-iconpicker--icon material-symbols-outlined">' + icon.name + '</span>';
	});
	return html
}

function search() {
	// Declare variables
	var input, filter, items, i, txtValue;
	input = document.querySelector('.mce-iconpicker--search');
	filter = input.value.toUpperCase();
	items = document.querySelectorAll('.mce-iconpicker--icon');

	// Loop through all list items, and hide those who don't match the search query
	for (i = 0; i < items.length; i++) {
		txtValue = items[i].textContent || items[i].innerText;
		if (txtValue.toUpperCase().indexOf(filter) > -1) {
			items[i].style.display = "";
		} else {
			items[i].style.display = "none";
		}
	}
}