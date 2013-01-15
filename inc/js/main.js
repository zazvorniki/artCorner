$(document).ready(function(){
	//this calls the truncate js class and applies it to the bodies of the blog posts
	 $('.blogContainer p').jTruncate(); 
	  
	//this calls the pagination on each item
	  $('ul.item').flexipage();
	  
	  
	  tinyMCE.init({
	  	mode : "textareas",
	  	theme : "simple"
	  });	
});