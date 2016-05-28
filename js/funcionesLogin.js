function validarLogin()
{
	var usuario	= $("#correo").val();//funciona como un geter o un setter si recibe parametros
	var password = $("#clave").val();
	var recordarme = $("#recordarme").is(':checked');

	var funcionAjax = $.ajax({
		type:"post",
		url:"php/validarUsuario.php",
		data:{usuario:usuario, clave:password, recordarme:recordarme}
	});

	funcionAjax.done(function(respuesta){
		alert(respuesta);
		MostarLogin();
	});
}

function deslogear()
{	
	var funcionAjax=$.ajax({
		url:"php/deslogearUsuario.php",
		type:"post"
	});

	funcionAjax.done(function(retorno){
			//MostarBotones();
			MostarLogin();
			$("#usuario").val("Sin usuario.");
			$("#BotonLogin").html("Login<br>-Sesión-");
			$("#BotonLogin").removeClass("btn-danger");
			$("#BotonLogin").addClass("btn-primary");
			
	});	
}
function MostarBotones()
{		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarBotones"}
	});
	funcionAjax.done(function(retorno){
		$("#botonesABM").html(retorno);
		//$("#informe").html("Correcto BOTONES!!!");	
	});
}
