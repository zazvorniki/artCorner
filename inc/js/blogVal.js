$(document).ready(function(){
	//this makes sure the title field has something inside it before submitting
	var title = new LiveValidation('title')
	title.add( Validate.Presence );
	//this initializes the tinyMCE rich text editor

	//this is the advanced tinymce editor. With spellcheck and advanced editing features only available for the blog post and the edit page.
	tinyMCE.init({
	    // General options
	    mode : "textareas",
	    theme : "advanced",
	    plugins : "spellchecker,style,inlinepopups",
	    
	     //Theme options
	    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,cleanup,|,forecolor, spellchecker,|,fontselect",
	    theme_advanced_buttons2:
	    "undo,redo,|,link, unlink, image",
	    theme_advanced_toolbar_location : "top",
	    theme_advanced_toolbar_align : "center",
	    theme_advanced_resizing : true,
	    width: "630px",
	    height: "500px",
	    theme_advanced_path : false
	});	
});