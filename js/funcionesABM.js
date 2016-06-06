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

function EditarAlumno(idParametro)//CREAR UNA FUNCIONES QUE ME ASEGURE QUE SIEMPRE SE VA A CARGAR EL FORM ANTES DE QUE SE SETEEN LOS CAMPOS!
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
			nombreFoto, nombreFoto
		}
	});
	funcionAjax.done(function(retorno){
		alert("Registro exitoso!");
		$("#divmostrar").html("<h1>Home Page</h1>");
	    $("#divmostrar").addClass("Frm animated bounceInDown");
	});
	funcionAjax.fail(function(retorno){	
		alert("Error en guardar alumno");
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