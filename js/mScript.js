jQuery(function($){

	$("#btnLogin").click(function () {
		var usurario = $("#usuario").val();
		var password = $("#password").val();
		if (usuario!="" || password!="") {
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
	        			if (data == "Login") {
	        				location.replace("http://i-pointsite.com/CARUSFERRY/panel.php");
	        			}else{
	        				$(".container").append("<div class='row align-items-center justify-content-center'><div style='margin-top:25px;' class='alert alert-danger alert-dismissible'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Contraseña o usuario incorrecto.</div></div>");
	        				$(".alert").fadeOut(6000);
	        			}	
				}
			});
		}
	});


});