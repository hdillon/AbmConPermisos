<?php
require_once('AccesoDatos.php');
class usuario
{
	public $id;
	public $nombre;
 	public $mail;
  	public $password;
  	public $tipo;
  	public $pathfoto;

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
			as tipo, pathfoto as pathfoto from usuario where id = $id");
			$consulta->execute();
			$usuarioBuscado= $consulta->fetchObject('usuario');
			return $usuarioBuscado;
	}

	public static function ModificarUsuarioParametros($id, $nombre, $mail, $password, $tipo, $pathFoto)
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update usuario 
				set nombre=:nombre,
				mail=:mail,
				password=:password,
				tipo=:tipo,
				pathfoto=:pathfoto
				WHERE id=:id");
			$consulta->bindValue(':id',$id, PDO::PARAM_INT);
			$consulta->bindValue(':nombre',$nombre, PDO::PARAM_STR);
			$consulta->bindValue(':mail', $mail, PDO::PARAM_STR);
			$consulta->bindValue(':password', $password, PDO::PARAM_STR);
			$consulta->bindValue(':tipo', $tipo, PDO::PARAM_STR);
			$consulta->bindValue(':pathfoto', $pathfoto, PDO::PARAM_STR);
			return $consulta->execute();
	 }

	 public static function InsertarElUsuario($nombre, $mail, $password, $tipo, $pathFoto)
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuario (nombre,mail,password,tipo,pathfoto)values('$nombre', '$mail', '$password', '$tipo', '$pathFoto')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				
	 }

}
?>