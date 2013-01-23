$(document).ready(function(){	  
	//this calls the pagination on each item
	  $('ul.commentList').flexipage();
	  
	// this inits the rich text editor 
	tinyMCE.init({
		mode : "textareas",
		mode : "textareas",
		theme : "simple",
		width: "300px",
		height: "150px",
		setup : function(ed) {
			ed.onKeyUp.add(function(ed, e) {
			var text = tinyMCE.activeEditor.getContent();
			console.log(text.length);
				if(text == "")
				{
					$("#notThere").show();
				}
						
				if (text.length >1000)
				{
					$("#tooLong").show();
				}
				
			});
		},
	});
	
	

	 //makes sure the author input field is filled in before submitting
	 var cAuthor = new LiveValidation('cAuthor')
	 cAuthor.add( Validate.Presence );
	 
	 //makes sure the email input field is filled in before submitting
	 var cEmail = new LiveValidation('cEmail')
	 cEmail.add( Validate.Email );
	 cEmail.add( Validate.Presence );
	 

	 $('.submit').click(function() {
	     var text = tinyMCE.activeEditor.getContent();
	     if(text == "")
	     {
	     		$("#notThere").show();
	     		return false;
	     }
	     if (text.length == 27)
	     {
	     		$("#notThere").show();
	     		return false;
	     }
	     if (text.length >1000)
	     {
	     		$("#tooLong").show();
	     		return false;
	     }	
	 }); 	  
});