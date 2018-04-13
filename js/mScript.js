jQuery(function($){

	$("#loginform").submit(function () {
		$.ajax({
			type: "POST",
			url: "funciones.php",
			data: $(this).serialize(),
			success: function (data) {
				console.log(data);
			}
		});
	});


});