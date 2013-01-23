$(document).ready(function(){
	//this makes sure the title field has something inside it before submitting
	var title = new LiveValidation('title')
	title.add( Validate.Length, { maximum: 35 } );
	title.add( Validate.Presence );
	
	// this inits the rich text editor 
	  tinyMCE.init({
		  mode : "textareas",
		  mode : "textareas",
		  theme : "simple",
		  width: "300px",
		  height: "150px",
		  setup : function(ed) {
		  	//this calls the on key up function and makes sure that the text area is filled
		  	ed.onKeyUp.add(function(ed, e) {
		  	var text = tinyMCE.activeEditor.getContent();
		  	console.log(text.length);
		  		if(text == "")
		  		{
		  			$("#notThere").show();
		  		}
		  	});
		  },
	 });
	 //on submit  this will double check to make sure the text area is filled
	 $('.submit').click(function() {
	     var text = tinyMCE.activeEditor.getContent();
	     if(text == "")
	     {
	     		$("#notThere").show();
	     		return false;
	     }
	  }); 	 
});