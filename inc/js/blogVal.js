$(document).ready(function(){
	
	var title = new LiveValidation('title')
	title.add( Validate.Presence );
	
	var body = new LiveValidation('body')
	body.add( Validate.Presence );
	  
});