jQuery(document).ready(function($) {
	$.ajax({
		url: 'js/test-json.js' ,
		method: 'GET',
		success: function(data){
			console.log ("data recue:", data);
                //Faire quelque chose avec les données
            },
            error: function(error){
            	alert(error.statusText);
            	console.log(error);
            }
        });
});