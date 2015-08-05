$(document).ready(function () {

	$.ajax({

		type: 'GET',

		url: "http://api.openweathermap.org/data/2.5/forecast/city?id=745044&lang=tr&APPID=3c010fc8f771609bd10a52a7baf89a00",

		dataType: 'json',

		success: function (JSON) {

			$('#hava').empty();

			$.each(JSON.main, function (i, can) {

				$('#hava').append(can.temp);

			});
		},

		error: function (e, x) {

			console.log(e);
			console.log(x);
		}
	});

});
