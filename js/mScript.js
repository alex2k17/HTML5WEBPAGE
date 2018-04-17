jQuery(function($){

	$(document).ready(function () {
		$.ajax({
			type: "POST",
			url: "funciones.php",
			data: {
				"accion":"getServices"
			},
			success: function (data) {
				console.log("Success");
				for(i = 0; i < data.length; i++){
					$(".Services").append("<div class='col-xs-6 col-md-4'><h2 class='titleServices'>"+data[i].titulo+"</h2><p class='Services-text'>"+data[i].descripcion+"</p></div>");
				}
			}
		});
	});


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
		$.ajax({
			type: "POST",
			url: "funciones.php",
			data: {
				"accion":"getServices"
			},
			success: function (data) {
				$(".main").append("<section id='mServices'><div class='container-fluid'><div class='row'><div class='col-xs-6 col-md-4'><h2>Servicio 1</h2><div class='input-group' style='width:50%;'><span class='input-group-addon'>Título</span><input class='form-control' id='titulo1' type='text'></div><br>Descripción:<br><textarea style='width:auto;' class='form-control' id='descripcion1' rows='6' cols='40'></textarea><br><div><button class='actualizar btn btn-default' data-usage='1' type='button' class='btn btn-default btn-md'>Actualizar</button></div></div><div class='col-xs-6 col-md-4'><h2>Servicio 2</h2><div class='input-group' style='width:50%;'><span class='input-group-addon'>Título</span><input class='form-control' id='titulo2' type='text'></div><br>Descripción:<br><textarea style='width:auto;' class='form-control' id='descripcion2' rows='6' cols='40'></textarea><br><button class='actualizar btn btn-default' data-usage='2' type='button' class='btn btn-default btn-md'>Actualizar</button></div><div class='col-xs-6 col-md-4'><h2>Servicio 3</h2><div class='input-group' style='width:50%;'><span class='input-group-addon'>Título</span><input class='form-control' id='titulo3' type='text'></div><br>Descripción:<br> <textarea style='width:auto;' class='form-control' id='descripcion3' rows='6' cols='40'></textarea><br><button class='actualizar btn btn-default' data-usage='3' class='btn btn-default btn-md' type='button'>Actualizar</button></div></div></div></section>");
				$("#titulo1").val(data[0].titulo);
				$("#descripcion1").val(data[0].descripcion);
				$("#titulo2").val(data[1].titulo);
				$("#descripcion2").val(data[1].descripcion);
				$("#titulo3").val(data[2].titulo);
				$("#descripcion3").val(data[2].descripcion);
				var btnsUpdate=document.getElementsByClassName('actualizar');
				for (i = 0; i < btnsUpdate.length; i++) {
    				btnsUpdate[i].addEventListener("click", UpdateServ);
				}
			}
		});
	});

	function UpdateServ() {
		var id = this.getAttribute ("data-usage");
		var titulo = $("#titulo"+id).val();
		var descripcion = $("#descripcion"+id).val();
		ajaxUpdate(id, titulo, descripcion);
	}

	function ajaxUpdate(id, titulo, descripcion) {
		$.ajax({
			type: "POST",
			url:"funciones.php",
			data:{
				"accion":"updateService",
				"titulo":titulo,
				"descripcion": descripcion,
				"id": id
			},
			success: function (data){

				console.log(data);
			}
		});
	}


});