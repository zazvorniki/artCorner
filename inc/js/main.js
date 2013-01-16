$(document).ready(function(){
	//this calls the truncate js class and applies it to the bodies of the blog posts
	 $('.blogContainer p').jTruncate(); 
	  
	//this calls the pagination on each item
	  $('ul.item').flexipage();
	  
	  $('ul.commentList').flexipage();
	  
	 //this inits the rich text editor 
	  tinyMCE.init({
	  	mode : "textareas",
	  	theme : "simple"
	  });
	  
	  	  
	  //makes sure the author input field is filled in before submitting
	  var cAuthor = new LiveValidation('cAuthor')
	  cAuthor.add( Validate.Presence );
	  
	  //makes sure the email input field is filled in before submitting
	  var cEmail = new LiveValidation('cEmail')
	  cEmail.add( Validate.Email );
	  cEmail.add( Validate.Presence );  
});