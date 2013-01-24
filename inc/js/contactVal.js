$(document).ready(function(){
	//this makes sure the title field has something inside it before submitting
	var name = new LiveValidation('name')
	name.add( Validate.Presence );
	
	//this makes sure the title field has something inside it before submitting
	var email = new LiveValidation('email')
	email.add( Validate.Email );
	email.add( Validate.Presence );

	//this initializes the tinyMCE rich text editor
	tinyMCE.init({
		mode : "textareas",
		theme : "simple",
		width: "300px",
		height: "150px",
		setup : function(ed) {
			//this calls the on key up function and makes sure the ext field is not empty
		ed.onKeyUp.add(function(ed, e) {
				var text = tinyMCE.activeEditor.getContent();
				//console.log(text);			
					if(text == "")
					{
						$("#notThere").show();
					}else {
						$("#notThere").hide();
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
				
	//On submit this makes sure that the text field is not empty
	$('.submit').click(function() {
	    var text = tinyMCE.activeEditor.getContent();
	    if(text == "")
	    {
	    		$("#notThere").show();
	    		return false;
	    }
	 }); 	
});