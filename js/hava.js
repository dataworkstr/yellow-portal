$(document).ready(function () {

	$.ajax({

		type: 'GET',

		url: "http://api.openweathermap.org/data/2.5/weather?q=Istanbul",

		dataType: 'json',

		success: function (JSON) {

			$('#hava').empty();

			$.each(JSON, function (i, can) {

				$('#hava').append(can.main.temp);

			});
		},

		error: function (e, x) {

			console.log(e);
			console.log(x);
		}
	});

});