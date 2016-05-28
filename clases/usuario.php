<?php
require_once('AccesoDatos.php');
/*class alumno
{
	public $id;
	public $nombre;
 	public $legajo;
  	public $sexo;
  	public function BorrarAlumno()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from alumno 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }
	 
	 public static function BorrarAlumnoPorAnio($legajo)
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from calumno 				
				WHERE legajo=:legajo");	
				$consulta->bindValue(':legajo',$legajo, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	 }
	public function ModificarAlumno()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update alumno 
				set titel='$this->titulo',
				interpret='$this->cantante',
				jahr='$this->año'
				WHERE id='$this->id'");
			return $consulta->execute();
	 }
	 public function ModificarCdParametros()
	 {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update cds 
				set titel=:titulo,
				interpret=:cantante,
				jahr=:anio
				WHERE id=:id");
			$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);
			$consulta->bindValue(':titulo',$this->titulo, PDO::PARAM_INT);
			$consulta->bindValue(':anio', $this->año, PDO::PARAM_STR);
			$consulta->bindValue(':cantante', $this->cantante, PDO::PARAM_STR);
			return $consulta->execute();
	 }
  	public function mostrarDatos()
	{
	  	return "Metodo mostar:".$this->nombre."  ".$this->legajo."  ".$this->sexo;
	}
	 public function InsertarElAlumno()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into alumno (nombre,legajo,sexo)values('$this->nombre','$this->legajo','$this->sexo')");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
				
	 }
	 public function InsertarElAlumnoParametros()
	 {
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into cds (nombre,legajo,sexo)values(:nombre,:legajo,:sexo)");
				$consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_INT);
				$consulta->bindValue(':legajo', $this->legajo, PDO::PARAM_STR);
				$consulta->bindValue(':sexo', $this->sexo, PDO::PARAM_STR);
				$consulta->execute();		
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
	 }
	 
  	public static function TraerTodoLosAlumnos()
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id,nombre as nombre, legajo as legajo,sexo as sexo from alumno");
			$consulta->execute();			
			return $consulta->fetchAll(PDO::FETCH_CLASS, "alumno");		
	}
	public static function TraerUnAlumno($id) 
	{
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("select id, nombre as nombre, legajo as legajo,sexo as sexo from alumno where id = $id");
			$consulta->execute();
			$cdBuscado= $consulta->fetchObject('alumno');
			return $cdBuscado;				
			
	}
		
	
	
}*/

?>