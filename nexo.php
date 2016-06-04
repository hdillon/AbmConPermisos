<?php
session_start();//PRIMER LINEA DE MI PHP, SINO NO VA A FUNCIONAR!
require_once("clases/AccesoDatos.php");
require_once("clases/alumno.php");
require_once("clases/usuario.php");
require_once("php/archivo.php");

$queHago=$_POST['queHacer'];

switch ($queHago) {
	case 'MostrarGrilla':
			include("partes/formGrilla.php");
		break;
	case 'MostarLogin':
			include("partes/formLogin.php");
		break;
	case 'MostarRegistro':
			include("partes/formRegistro.php");
		break;
	case 'MostrarFormAlta':
			include("partes/formAlumno.php");
		break;
	case 'MostrarPerfil':
			include("partes/perfilUsuario.php");
		break;
	case 'BorrarAlumno':
			$alu = new alumno();
			$alu->id=$_POST['id'];
			$cantidad=$alu->BorrarAlumno();
			echo $cantidad;

		break;
	case 'GuardarAlumno':
			$alu = new alumno();
			$alu->nombre=$_POST['nombre'];
			$alu->legajo=$_POST['legajo'];
			$alu->sexo=$_POST['sexo'];
			if(isset($_POST['id']) && $_POST['id'] != ""){//Si viene el id es una modificación, sino es un alta
				$alu->id=$_POST['id'];
				$cantidad=$alu->ModificarAlumnoParametros();
			}else
				$cantidad=$alu->InsertarElAlumno();
			echo $cantidad;

		break;

		case 'GuardarUsuario':
			$usu = new usuario();
			$usu->nombre=$_POST['nombre'];
			$usu->mail=$_POST['mail'];
			$usu->password=$_POST['clave'];
			$usu->tipo=$_POST['tipo'];
			$usu->pathfoto='imagenes/' . $_POST['nombreFoto'];
			if(isset($_POST['id']) && $_POST['id'] != ""){//Si viene el id es una modificación, sino es un alta
				$usu->id=$_POST['id'];
				$cantidad=$usu->ModificarUsuarioParametros();
			}else
				$cantidad=$usu->InsertarElUsuario();
			echo $cantidad;

		break;
	case 'TraerAlumno':
			$alu = alumno::TraerUnAlumno($_POST['id']);		
			echo json_encode($alu) ;

		break;
	case 'Subirfotos':
		$result = Archivo::SubirArchivo();
		echo json_encode($result);
	break;
	case 'ValidarSession':
			if(isset($_SESSION['usuario']))
				echo 1;
			else
				echo 0;
		break;
	default:
		# code...
		break;
}


?>