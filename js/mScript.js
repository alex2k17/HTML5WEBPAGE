jQuery(function($){

	$("#btnLogin").click(function () {
		var usurario = $("#usuario").val();
		var password = $("#password").val();
		if (usuario!="" || password!="") {
			console.log("Usuario "+usuario.value);
			console.log("Password "+password);
			$.ajax({
				type: "POST",
				url: "funciones.php",
				data: {
					"accion":"login",
					"usuario":usuario.value,
					"password":password
				},
				success: function (data) {
	        			console.log(data);

				}
			});
		}
	});


});