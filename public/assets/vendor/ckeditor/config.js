/**
 * @license Copyright (c) 2003-2019, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	config.filebrowserBrowserUrl='/assets/vendor/ckfinder/ckfinder.html?type=files';
	config.filebrowserImageBrowseUrl='/assets/vendor/ckfinder/ckfinder.html?type=Images';
	config.filebrowserFlashBrowseUrl = '/assets/vendor/ckfinder/ckfinder.html?type=flash';
	config.filebrowserUploadUrl = '/assets/vendor/ckfinder/ckfinder.html?type=files';
	config.filebrowserImageUploadUrl = '/assets/vendor/ckfinder/ckfinder.html?type=images';
	config.filebrowserFlashUploadUrl = '/assets/vendor/ckfinder/ckfinder.html?type=flash';
};
