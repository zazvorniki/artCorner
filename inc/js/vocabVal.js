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
	 
	 $('.submit').click(function() {
	     var text = tinyMCE.activeEditor.getContent();
	     if(text == "")
	     {
	     		$("#notThere").show();
	     		return false;
	     }
	  }); 	 
});