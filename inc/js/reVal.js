$(document).ready(function(){
	//Live validation for the resource field. This makes sure that the website is correctly formatted with the http://www
	var resource = new LiveValidation('resource')
	resource.add( Validate.Format, { pattern: /http:/ } );
	resource.add( Validate.Presence );
	//this is the live validation for the name filed
	var name = new LiveValidation('name')
	name.add( Validate.Presence );
	
	$('.submit').click(function() {
		if($("input[name=category]:checked").val() == null) 
		{
				$("#radioVal").show(); 		
		 		return false;	
		}
	});
});