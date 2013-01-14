$(document).ready(function(){
	
	//this makes sure the title field has something inside it before submitting
	var title = new LiveValidation('title')
	title.add( Validate.Presence );


	tinyMCE.init({
		mode : "textareas",
		theme : "simple"
	});
	  
});