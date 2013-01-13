$(document).ready(function(){
	
	//this makes sure the title field has something inside it before submitting
	var title = new LiveValidation('title')
	title.add( Validate.Presence );

	//this makes sure that the body field has something in it before submitting the form 
	var body = new LiveValidation('body')
	body.add( Validate.Presence );
	
	//This makes sure that the category field has a value in its
	var category = new LiveValidation('category')
	category.add( Validate.Inclusion, { within: [ 'project' , 'event' ] } );
	category.add( Validate.Presence );
	  
});