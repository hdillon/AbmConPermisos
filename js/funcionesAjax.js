$(document).ready(function(){
    validarSession();
});

function validarSession()
{
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"ValidarSession"}
	});
	funcionAjax.done(function(retorno){
		if(retorno == 1)
		{
			$("#BotonLogin").html("Logout");
			$("#BotonLogin").attr("onclick","deslogear()");
			$("#BotonLogin").removeClass("button-blue");
			$("#BotonLogin").addClass("button-red");
			$("#BotonRegistrarse").hide();//Si se logueó, oculto el boton de registro
		}
	});
	funcionAjax.fail(function(retorno){

	});
}

function Inicio()
{
$("#divmostrar").html("<h1>Home Page</h1>");
$("#divmostrar").addClass("Frm animated bounceInDown");
}


function MostrarError()
{
	var funcionAjax=$.ajax({url:"nexoNoExiste.php",type:"post",data:{queHacer:"MostrarTexto"}});
	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto!!!");
	});
	funcionAjax.fail(function(retorno){
			$("#principal").html("error :(");
		//$("#informe").html(retorno.responseText);		
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);
	});
}
function MostrarSinParametros()
{
	var funcionAjax=$.ajax({url:"nexoTexto.php"});

	funcionAjax.done(function(retorno){
		$("#principal").html(retorno);
		$("#informe").html("Correcto!!!");
	});
	funcionAjax.fail(function(retorno){
		$("#principal").html(":(");
		$("#informe").html(retorno.responseText);	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}

function Mostrar(queMostrar)
{
		//alert(queMostrar);
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:queMostrar}
	});
	funcionAjax.done(function(retorno){
		$("#divmostrar").html(retorno);
	});
	funcionAjax.fail(function(retorno){
		$("#divmostrar").html(":(");	
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}

function MostarLogin()
{
		//alert("queMostrar");
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarLogin"}
	});
	funcionAjax.done(function(retorno){
		$("#divmostrar").html(retorno);
	});
	funcionAjax.fail(function(retorno){
		$("#divmostrar").html(":(");
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}

function MostarRegistro()
{
		//alert("queMostrar");
	var funcionAjax=$.ajax({
		url:"nexo.php",
		type:"post",
		data:{queHacer:"MostarRegistro"}
	});
	funcionAjax.done(function(retorno){
		$("#divmostrar").html(retorno);
	});
	funcionAjax.fail(function(retorno){
		$("#divmostrar").html(":(");
	});
	funcionAjax.always(function(retorno){
		//alert("siempre "+retorno.statusText);

	});
}


function subirFoto()
{
    var foto = document.getElementById("foto").value;
    var mail = document.getElementById("correo").value;//recupero el mail para usarlo en el nombre de la foto
    
    if(foto === "")
    {
        return;
    }
    
    var formData = new FormData();
    var archivo = $("#foto")[0];
    formData.append("foto",archivo.files[0]);
    formData.append("queHacer", "Subirfotos");
    formData.append("mail", mail);


    $.ajax({
        type: 'POST',
        url: "nexo.php",
        dataType: "json",
        cache: false,
        contentType: false,
        processData: false,
        data: formData,
        async: true
    })
    .done(function (objJson) {
        $("#Divfoto").html(objJson.html);
        /*if(objJson)
            alert("Foto Subida!");
        else
            alert("Foto No Subida!");*/
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
        alert(jqXHR.responseText + "\n" + textStatus + "\n" + errorThrown);
    });   
    
}