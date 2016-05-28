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
		var alu =JSON.parse(retorno);	
		$("#idCD").val(alu.id);
		$("#cantante").val(alu.cantante);
		$("#titulo").val(alu.titulo);
		$("#anio").val(alu.año);
	});
	funcionAjax.fail(function(retorno){	
		alert("Error en editar alumno");
	});	
	Mostrar("MostrarFormAlta");
}

function GuardarAlumno()
{
		var id=$("#idAlumno").val();
		var nombre=$("#nombre").val();
		var legajo=$("#legajo").val();
		var sexo=$("#sexo").val();

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
