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
			//This calls the key up function which makes sure that the field is filled and does not have more than a thousand characters 
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

	//On submit this makes sure that the tinymce text area is filled in and has less than a thousand characters 
	 $('.submit').click(function() {
	     var text = tinyMCE.activeEditor.getContent();
	     if(text == "")
	     {
	     		$("#notThere").show();
	     		return false;
	     }
	     //If this is not here than the user can just hit enter and it will submit
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