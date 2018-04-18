jQuery(function($){

	var fichero;

	$(document).ready(function () {
		$.ajax({
			type: "POST",
			url: "funciones.php",
			data: {
				"accion":"getServices"
			},
			success: function (data) {
				for(i = 0; i < data.length; i++){
					$(".Services").append("<div class='col-xs-6 col-md-4'><h2 class='titleServices'>"+data[i].titulo+"</h2><p class='Services-text'>"+data[i].descripcion+"</p></div>");
				}
			}
		});
	});

	$(document).ready(function () {
		$.ajax({
			type: "POST",
			url: "funciones.php",
			data: {
				"accion":"getBlogs"
			},
			success: function (data) {
				for(i = 0; i < data.length; i++){
					$(".Blogs").append("<div class='col-xs-6 col-md-4'><a style='text-decoration:none; 'href='#'><img style='width:50%; display:block; margin:0 auto;' src='https://upload.wikimedia.org/wikipedia/commons/thumb/e/e6/Playa-el-campello.jpg/800px-Playa-el-campello.jpg'/><h2 class='titleServices' style='padding-top:10px;'>"+data[i].titulo+"</h2><h4 class='Services-text'>" + data[i].fecha + "</h4>"+data[i].descripcion+"</a></div>");
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
		$(".main").empty();
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



	$("#blog").click(function(){
		$(".main").empty();
		//$(".main").append("<script>tinymce.remove();</script>");
		tinymce.remove();
		$(".main").append("<section id='mServices'><div class='container-fluid'><div class='row'><div class='col-xs-6 col-md-8'><h2>Blog</h2><div class='input-group' style='width:100%;'><span class='input-group-addon'>Título</span><input class='form-control' id='titulo1' type='text'></div><br><p style='font-size:23px;'>Contenido:</p><textarea id='textarea1' style='width:auto;' rows='6' cols='60'></textarea><br><div id='btnupload'></div><div><button id='publicar' class='publicar btn btn-default' data-usage='edit' type='button' class='btn btn-default btn-md'>Publicar</button></div></div></div></section>");
		//$(".main").append("<script>tinymce.init({ selector:'textarea' });</script>");
		addButtonUpload();

		var btnPublicar=document.getElementsByClassName('publicar');
		for (i = 0; i < btnPublicar.length; i++) {
			btnPublicar[i].addEventListener("click", insertBlog);
		}
		tinymce.init({ selector:'textarea' });
	});

	

	function insertBlog(){
		var titulo = $("#titulo1").val();
		var descripcion = tinymce.get('textarea1').getContent();

		if(fichero == null){

		}else{
			ajaxInsert(titulo, descripcion, fichero);
		}
		
	}

	function ajaxInsert(titulo, descripcion, fichero){
		$.ajax({
			type: "POST",
			url:"funciones.php",
			data:{
				"accion":"insertBlog",
				"titulo":titulo,
				"descripcion": descripcion,
				"fichero": fichero
			},
			success: function (data){
				console.log("INSERTADO");
			}
		});
	}

	

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

			}
		});
	}

	function addButtonUpload() {
		var url = '/CARUSFERRY/php/';
		fichero = null;
		$('head').append( $('<link rel="stylesheet" type="text/css" />').attr('href', 'fileupload/css/jquery.fileupload.css'));
		$("#btnupload").append("<div class='row' style='margin-left:0px; margin-top:20px;'><span class='btn btn-default fileinput-button'><i class='fa fa-plus' style='font-size:12px'></i><span> Seleccionar</span><input id='fileupload' type='file' name='files[]' data-url="+url+" multiple></span><br><br></div>");
		$("#btnupload").append("<div class='row' style='margin-left:0px; margin-top:20px;'><div id='progress' class='progress' style='width:98%;'><div class='progress-bar progress-bar-success'></div></div></div>");
		$("#btnupload").append("<div class='row' style='margin-left:0px; margin-top:0px;'><div id='files' class='files'></div></div>");
		
		$('#fileupload').fileupload({
			url: url,
	        dataType: 'json',
	        done: function (e, data) {
	            $.each(data.result.files, function (index, file) {
	                $('<p/>').text(file.name).appendTo(".files");
	                fichero = file.url;
	            });
	        },
	       progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $("#progress .progress-bar").css("width", "0");
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
	    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
	}

});
