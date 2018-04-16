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



	$("#cerrarSesion").click(function(){
		$.ajax({
			type: "POST",
			url: "funciones.php",
			data: {
				"accion":"cerrarSesion"
			},
			success: function () {
				location.replace("http://i-pointsite.com/CARUSFERRY");	
			}
		});
	});

	$("#modificarPagina").click(function(){
		$( ".main" ).empty();
		$(".main").append("<section id='mServices'><div class='container-fluid'><div class='row'><div class='col-xs-6 col-md-4'><h2 class='titleServices'>CarRes</h2><p class='Services-text'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse arcu turpis, congue in elit id, posuere iaculis ante. Mauris quis augue nec tellus volutpat dignissim nec a lacus.</p></div><div class='col-xs-6 col-md-4'><h2 class='titleServices'>ePos -TPV</h2><p class='Services-text'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse arcu turpis, congue in elit id, posuere iaculis ante. Mauris quis augue nec tellus volutpat dignissim nec a lacus.</p></div><div class='col-xs-6 col-md-4'><h2 class='titleServices'>Poirt - Carus Port</h2><p class='Services-text'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse arcu turpis, congue in elit id, posuere iaculis ante. Mauris quis augue nec tellus volutpat dignissim nec a lacus.</p></div></div></div></section>");

	});

});