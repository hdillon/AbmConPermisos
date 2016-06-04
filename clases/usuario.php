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

	public function ModificarUsuarioParametros()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update usuario 
				set nombre=:nombre,
				mail=:mail,
				password=:password,
				tipo=:tipo
				WHERE id=:id");
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
			$consulta->bindValue(':mail', $this->mail, PDO::PARAM_STR);
			$consulta->bindValue(':password', $this->password, PDO::PARAM_STR);
			$consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);
			return $consulta->execute();
	 }

	 public function InsertarElUsuario()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuario (nombre,mail,password,tipo)values('$this->nombre','$this->mail','$this->password','$this->tipo')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				
	 }

}
?>