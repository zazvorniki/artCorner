$(document).ready(function(){
	var pass = new LiveValidation('pass');
	pass.add( Validate.Presence );
	
	var email = new LiveValidation('email');
	email.add( Validate.Email );
	email.add( Validate.Presence );	
	            
});