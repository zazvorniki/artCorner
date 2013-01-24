$(document).ready(function(){
	//this makes sure the title field has something inside it before submitting
	var title = new LiveValidation('title')
	title.add( Validate.Length, { maximum: 35 } );
	title.add( Validate.Presence );
	//this initializes the tinyMCE rich text editor

	//this is the advanced tinymce editor. With spellcheck and advanced editing features only available for the blog post and the edit page.
	tinyMCE.init({
	    // General options
	    mode : "textareas",
	    theme : "advanced",
	    plugins : "spellchecker,style,inlinepopups",
	    
	     //Advanced editor buttons and settings
	    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,|,cleanup,|,forecolor, spellchecker,|,fontselect",
	    theme_advanced_buttons2:
	    "undo,redo,|,link, unlink",
	    theme_advanced_toolbar_location : "top",
	    theme_advanced_toolbar_align : "center",
	    theme_advanced_resizing : true,
	    width: "630px",
	    height: "500px",
	    theme_advanced_path : false,
	    setup : function(ed) {
	    	//this calls the on key up function which helps validate the text field
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
	    		
	//On submit this is going to call the tinymce values and make sure they are filled. This also makes sure the input it selected.
	$('.submit').click(function() {
	    var text = tinyMCE.activeEditor.getContent();
	    if(text == "")
	    {
	    		$("#notThere").show();
	    		return false;
	    };
	    
	    if($("input[name=category]:checked").val() == null) 
	    {
	    		$("#radioVal").show(); 		
	     		return false;	
	    }
	 });  
});