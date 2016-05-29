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
		if(respuesta == 1)//Si se logró logear, modifico el boton login x logout
		{
			$("#BotonLogin").html("Logout");
			$("#BotonLogin").attr("onclick","deslogear()");//MODIFICO LA FUNCION ONCLICK DEL BOTON CON JQUERY
			$("#BotonLogin").removeClass("button-blue");
			$("#BotonLogin").addClass("button-red");
		}else
		{
			alert("El usuario o password es incorrecto");
		}
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
			MostarLogin();
			$("#BotonLogin").html("Login");
			$("#BotonLogin").attr("onclick","MostarLogin()");//MODIFICO LA FUNCION ONCLICK DEL BOTON CON JQUERY
			$("#BotonLogin").addClass("button-blue");
			
	});	
}
