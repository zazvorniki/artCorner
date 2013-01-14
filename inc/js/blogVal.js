$(document).ready(function(){
	//this makes sure the title field has something inside it before submitting
	var title = new LiveValidation('title')
	title.add( Validate.Presence );
	//this initializes the tinyMCE rich text editor
	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
});