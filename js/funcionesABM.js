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
	Mostrar("MostrarFormAlta");//Primero cargo el formulario y después le seteo los valores, si lo muestro al final no me setea 
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
		console.log(alu.nombre);
		$("#idAlumno").val(alu.id);
		/*$("#nombre").val(alu.nombre);
		$("#legajo").val(alu.legajo);	//CON JQUERY NO FUNCAAAA (SÓLO EL HIDDEN(?))
		$("#sexo").val(alu.sexo);*/
		document.getElementById("nombre").setAttribute("value", alu.nombre);
		document.getElementById("legajo").setAttribute("value", alu.legajo);
		document.getElementById("sexo").setAttribute("value", alu.sexo);
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
