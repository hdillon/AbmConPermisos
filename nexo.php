<?php
require_once("clases/AccesoDatos.php");
require_once("clases/alumno.php");
require_once("clases/usuario.php");

$queHago=$_POST['queHacer'];

switch ($queHago) {
	case 'MostrarGrilla':
			include("partes/formGrilla.php");
		break;
	case 'MostarLogin':
			include("partes/formLogin.php");
		break;
	case 'MostrarFormAlta':
			include("partes/formAlumno.php");
		break;
	case 'BorrarAlumno':
			$alu = new alumno();
			$alu->id=$_POST['id'];
			$cantidad=$alu->BorrarAlumno();
			echo $cantidad;

		break;
	case 'GuardarAlumno':
			$alu = new alumno();
			$alu->cantante=$_POST['nombre'];
			$alu->titulo=$_POST['legajo'];
			$alu->año=$_POST['sexo'];
			$cantidad=$alu->InsertarElAlumno();
			echo $cantidad;

		break;
	case 'TraerAlumno':
			$alu = alumno::TraerUnAlumno($_POST['id']);		
			echo json_encode($alu) ;

		break;
	default:
		# code...
		break;
}


?>