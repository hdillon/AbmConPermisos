function BorrarAlumno(idParametro)
{
	//alert(idParametro);
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"BorrarAlumno",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		Mostrar("MostrarGrilla");
		
	});
	funcionAjax.fail(function(retorno){	
		alert("Error en BorrarAlumno");
	});	
}

function EditarAlumno(idParametro)
{
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerAlumno",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		Mostrar("MostrarFormAlta");

		var delay=1000; //Demora de 1seg
		setTimeout(function() {
 		var alu =JSON.parse(retorno);
		$("#idAlumno").val(alu.id);
		document.getElementById("nombre").setAttribute("value", alu.nombre);
		document.getElementById("legajo").setAttribute("value", alu.legajo);
		if(alu.sexo == 'F')
			$('#f').prop('checked',true);
		}, delay);
	
	});
	funcionAjax.fail(function(retorno){	
		alert("Error en editar alumno");
	});	
}

function GuardarAlumno()
{
		var id=$("#idAlumno").val();
		var nombre=$("#nombre").val();
		var legajo=$("#legajo").val();
		var sexo = document.getElementById('m').checked ? "M" : "F";

		if(!ValidarDatos(nombre, legajo))
			return;

		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"GuardarAlumno",
			id:id,
			nombre:nombre,
			legajo:legajo,
			sexo:sexo
		}
	});
	funcionAjax.done(function(retorno){
			Mostrar("MostrarGrilla");
		
	});
	funcionAjax.fail(function(retorno){	
		alert("Error en guardar alumno");
	});	
}

function BorrarCookie()
{	
	var funcionAjax=$.ajax({
		url:"php/borrarCookie.php",
		type:"post"
	});

	funcionAjax.done(function(retorno){
			alert("Coockies eliminadas!");
	});	
}


function ValidarDatos(nombre, legajo)
{
    if(nombre == ""){
        alert("El campo Nombre no puede ser vacio!");
        return false;
    }

    if(legajo == ""){
        alert("El campo Legajo no puede ser vacio!");
        return false;
    }

    if(!/^([0-9])*$/.test(legajo)){
        alert("El campo Legajo debe ser numerico!");
        return false;
    }
    return true;
}

function EditarUsuario(idParametro)
{
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"TraerUsuario",
			id:idParametro	
		}
	});
	funcionAjax.done(function(retorno){
		Mostrar('MostrarRegistro');

		var delay=1000; //Demora de 1seg
		setTimeout(function() {
 		var usu =JSON.parse(retorno);
		$("#idUsuario").val(usu.id);
		document.getElementById("nombre").setAttribute("value", usu.nombre);
		document.getElementById("correo").setAttribute("value", usu.mail);
		document.getElementById("clave").setAttribute("value", usu.password);
		document.getElementById("clave2").setAttribute("value", usu.password);
		var nombreFoto = usu.pathfoto.split("/"); //Obtengo sólo el nombre de la foto a partir del path
		nombreFoto = nombreFoto[1];
		$("#Divfoto").html("<input type='hidden' id='hdnnombrefoto' value='"+nombreFoto+"' />");
		if(usu.tipo == 'user')
			$('#u').prop('checked',true);
		$("#login").html("<span>Confirmar </span>");	
		$("#titulo").html("Editar Perfil");	
		}, delay);
	
	});
	funcionAjax.fail(function(retorno){	
		alert("Error en editar alumno");
	});	
}


function GuardarUsuario()
{
		var id=$("#idUsuario").val();
		var nombre=$("#nombre").val();
		var mail=$("#correo").val();
		var clave=$("#clave").val();
		var clave2=$("#clave2").val();
		var tipo = document.getElementById('a').checked ? "admin" : "user";
		var nombreFoto = document.getElementById("hdnnombrefoto").value;

		if(!ValidarDatosRegistro(nombre, clave, clave2, nombreFoto))
			return;
		var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{
			queHacer:"GuardarUsuario",
			id:id,
			nombre:nombre,
			mail:mail,
			clave:clave,
			tipo:tipo,
			nombreFoto: nombreFoto
		}
	});
	funcionAjax.done(function(retorno){
		if(id != null && id != "")
			alert("Se guardaron los cambios!");
		else
			alert("Registro exitoso!");
		$("#divmostrar").html("<h1>Home Page</h1>");
	    $("#divmostrar").addClass("Frm animated bounceInDown");
	});
	funcionAjax.fail(function(retorno){	
		alert("Error en guardar usuario");
	});	
}

function ValidarDatosRegistro(nombre, clave, clave2, nombreFoto)
{
    if(nombre == ""){
        alert("El campo Nombre no puede ser vacio!");
        return false;
    }

    if(clave == "" || clave2 == "" ){
        alert("El campo clave no puede ser vacio!");
        return false;
    }

    if(clave != clave2 ){
        alert("Las claves no son iguales!");
        return false;
    }

    if(nombreFoto == ""){
        alert("Debe seleccionar una foto!");
        return false;
    }

    return true;
}