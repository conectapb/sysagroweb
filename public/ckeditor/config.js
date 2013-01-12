/*
Copyright (c) 2003-2012, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	 config.language = 'es';
          //config.toolbar = 'Basic';
         config.toolbar = 'Full';
         /*
         config.toolbar = 'MyToolbar';

	 config.toolbar_MyToolbar =
         [
		
                { name: 'document',  items : [ 'Source','-','NewPage','Preview'  ] },
		{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
		{ name: 'editing',   items : [ 'Find','Replace','-','SelectAll','-','Scayt' ] },
		{ name: 'insert',    items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
                '/',
		{ name: 'styles',     items : [ 'Styles','Format' ] },
		{ name: 'basicstyles', items : [ 'Bold','Italic','Strike','-','RemoveFormat' ] },
		{ name: 'paragraph',   items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
                { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
		{ name: 'tools', items : [ 'Maximize','-','About' ] }
	 ];
         */

         /*
         config.toolbar_Full =
        [
	{ name: 'document', items : [ 'Source','-','Save','NewPage','DocProps','Preview','Print','-','Templates' ] },
	{ name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
	{ name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
	{ name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton',
        'HiddenField' ] },
	'/',
	{ name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
	{ name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
	'-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
	{ name: 'links', items : [ 'Link','Unlink','Anchor' ] },
	{ name: 'insert', items : [ 'Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
	'/',
	{ name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
	{ name: 'colors', items : [ 'TextColor','BGColor' ] },
	{ name: 'tools', items : [ 'Maximize', 'ShowBlocks','-','About' ] }
        ];

        config.toolbar = [
           ["Source"],
            ["Bold","Italic","Underline","StrikeThrough","-","Undo","Redo","-","Cut",
             "Copy","Paste","PasteText","PasteFromWord","Find","Replace","-",
             "Outdent","Indent","NumberedList","BulletedList"],
           ["-","JustifyLeft","JustifyCenter","JustifyRight","JustifyBlock"],
           ["Image","Table","-","Link","Flash","TextColor","BGColor","Format","Font","FontSize"],
         ];*/


	 //config.uiColor = '#AADC6E';
         //config.uiColor = '#9AB8F3';
         config.uiColor = '#CCCCCC';
         config.resize_enabled = false;
         config.removePlugins = "elementspath";
         config.resize_enabled = false;
         config.skin = 'office2003';
         //config.resize_minWidth = 550;


};


     
