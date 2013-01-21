$(document).ready(function(){	  
	//this calls the pagination on each item
	  $('ul.commentList').flexipage();
	  
	// this inits the rich text editor 
	  tinyMCE.init({
		  mode : "textareas",
		  mode : "textareas",
		  theme : "simple",
		  width: "300px",
		  height: "150px"
	 });

	 //makes sure the author input field is filled in before submitting
	 var cAuthor = new LiveValidation('cAuthor')
	 cAuthor.add( Validate.Presence );
	 
	 //makes sure the email input field is filled in before submitting
	 var cEmail = new LiveValidation('cEmail')
	 cEmail.add( Validate.Email );
	 cEmail.add( Validate.Presence );  
	  	  
});