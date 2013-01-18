$(document).ready(function(){
	//liveValidation for the password field on the admin login. This ensures that the field is not blank
	var pass = new LiveValidation('pass');
	pass.add( Validate.Presence );
	//liveValidation for the email field on the admin login. This ensures that the field is not blank and there is a valid email address present
	var email = new LiveValidation('email');
	email.add( Validate.Email );
	email.add( Validate.Presence );
	//this uses the modernizr sessonstorage function to check weather or not they have in enabled or disabled. If it is disabled then this disables the input fields and shows an error message.
	if(Modernizr.sessionstorage){
	}else{
		$('.sessionMess').show();
		$("input").prop('disabled', true);
		$("input").css("background-color", "#cecdcd");
	}	
});