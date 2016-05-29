<?php 
session_start();//Habilita el acceso a la variable superglobal session (es un array)
$mail=$_POST['usuario'];
$clave=$_POST['clave'];
$recordar=$_POST['recordarme'];

require_once('../clases/usuario.php');

$usuario = usuario::TraerUnUsuario($mail, $clave); 

$retorno = 0;

if($usuario->tipo == "admin")
{		
	$_SESSION['usuario']="admin";
	$retorno= 1;
}

echo $retorno;
?>




<?php 
/*
session_start();
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$recordar=$_POST['recordarme'];

$retorno;

if($usuario=="octavio@admin.com.ar" && $clave=="1234")
{			
	if($recordar=="true")
	{
		setcookie("registro",$usuario,  time()+36000 , '/');
		
	}else
	{
		setcookie("registro",$usuario,  time()-36000 , '/');
		
	}
	$_SESSION['registrado']="octavio";
	$retorno=" ingreso";

	
}else
{
	$retorno= "No-esta";
}

echo $retorno;
*/
?>
