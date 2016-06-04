<?php 
session_start();//Habilita el acceso a la variable superglobal session (es un array)
$mail=$_POST['usuario'];
$clave=$_POST['clave'];
$recordar=$_POST['recordarme'];

require_once('../clases/usuario.php');

$usuario = usuario::TraerUnUsuario($mail, $clave); 

$sepudologear = 0;

if($usuario->id != NULL)
{	
	$_SESSION['id']=$usuario->id;	
	$_SESSION['usuario']=$usuario->mail;
	$_SESSION['tipo']=$usuario->tipo;//Guardo el tipo para después manejar los permisos
	
	$sepudologear= 1;

	if($recordar=="true")
	{
		setcookie("cookieusuario", json_encode($usuario), time()+36000 , '/');
	}else
	{
		setcookie("cookieusuario", "", time()-36000 , '/');
		//setcookie("arraycookie[password]", "", time()-36000 , '/');
	}
}

echo $sepudologear;
?>

