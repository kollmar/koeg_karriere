$(document).ready(function (){

	// Variablen
	var company 	= '',
		position 	= '',
		location	= '';

	// XML - Auslesen
	$.ajax({
		type: 'GET',
		url: xmlLocal,
		dataType: 'xml',
		error: function() {
			alert('xmlError!!');
		},
		success: function (xmlFile){

			$(xmlFile).find('job').each(function (){
				company  = $(this).find('companyname1').text();
				position = $(this).find('position').text();
				location = $(this).find('location').text();

				if( company === 'KÖNIGSTEINER AGENTUR GmbH'){
					var anzeige = '';
					anzeige += '<tr>'+
									'<td>'+ position +'</td>'+
									'<td>'+ location +'</td>'+
									'<td>'+ company +'</td>'+
								'</tr>';

					$('.firma').append(anzeige);
				}
			});
		}
	});
});