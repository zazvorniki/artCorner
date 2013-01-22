$(document).ready(function(){
	//this makes sure the title field has something inside it before submitting
	var title = new LiveValidation('title')
	title.add( Validate.Length, { maximum: 35 } );
	title.add( Validate.Presence );
	
	// this inits the rich text editor 
	  tinyMCE.init({
		  mode : "textareas",
		  mode : "textareas",
		  theme : "simple",
		  width: "300px",
		  height: "150px"
	 });
});