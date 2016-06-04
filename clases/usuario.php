<?php
require_once('AccesoDatos.php');
class usuario
{
	public $id;
	public $nombre;
 	public $mail;
  	public $password;
  	public $tipo;

  	public static function TraerUnUsuario($correo, $password) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, nombre as nombre, mail as mail,password as password, tipo
			as tipo from usuario where mail = '$correo' and password = '$password'");
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('usuario');
			return $usuarioBuscado;
	}

	public static function TraerUnUsuarioPorId($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, nombre as nombre, mail as mail,password as password, tipo
			as tipo from usuario where id = $id");
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('usuario');
			return $usuarioBuscado;
	}

}
?>