$(document).ready(function(){
	//this makes sure the title field has something inside it before submitting
	var name = new LiveValidation('name')
	name.add( Validate.Presence );
	
	//this makes sure the title field has something inside it before submitting
	var email = new LiveValidation('email')
	email.add( Validate.Email );
	email.add( Validate.Presence );

	//this initializes the tinyMCE rich text editor
	
	tinyMCE.init({
		mode : "textareas",
		theme : "simple",
		width: "300px",
		height: "150px"
	});	
});