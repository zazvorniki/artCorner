$(document).ready(function(){
	
	//liveValidation for the password field on the admin login. This ensures that the field is not blank
	var pass = new LiveValidation('pass');
	pass.add( Validate.Presence );
	
	//liveValidation for the email field on the admin login. This ensures that the field is not blank and there is a valid email address present
	var email = new LiveValidation('email');
	email.add( Validate.Email );
	email.add( Validate.Presence );	
	            
});