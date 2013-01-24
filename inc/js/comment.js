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
			//console.log(text);			
				if(text == "")
				{
					$("#notThere").show();
				}else {
					$("#notThere").hide();
				}
						
				if (text.length >1000)
				{
					$("#tooLong").show();
				}else{
					$("#tooLong").hide();
				}

			});
			ed.onPostProcess.add(function(ed, o) {
				var text = "";
				var tmp = document.createElement("DIV");
				
				tmp.innerHTML = o.content;
				if (tmp.innerHTML) {
					text = tmp.textContent||tmp.innerText||"";
					text = text.replace(/\n/gi, "");
					text = text.replace(/\s/g, "");
					text = text.replace(/\t/g, "");
				} else {
					text = "";
				}
				if (text == "") {
					o.content = text;
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
	     
	     if (text.length >1000)
	     {
	     		$("#tooLong").show();
	     		return false;
	     }	
	 }); 	  
});