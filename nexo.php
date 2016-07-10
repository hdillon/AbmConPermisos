<?php
session_start();//PRIMER LINEA DE MI PHP, SINO NO VA A FUNCIONAR!
require_once('./SERVIDOR/lib/nusoap.php');
require_once("clases/AccesoDatos.php");
require_once("clases/alumno.php");
require_once("clases/usuario.php");
require_once("php/archivo.php");

//Primero creo el client y valido que no de error:
$host = 'http://localhost:80/AbmConPermisos/SERVIDOR/ws.php';
$client = new nusoap_client($host . '?wsdl');

$err = $client->getError();
if ($err) {
	echo '<h2>ERROR EN LA CONSTRUCCION DEL WS:</h2><pre>' . $err . '</pre>';
	die();
}

$queHago=$_POST['queHacer'];

switch ($queHago) {
	case 'MostrarGrilla':
			include("partes/formGrilla.php");
		break;
	case 'MostrarLogin':
			include("partes/formLogin.php");
		break;
	case 'MostrarRegistro':
			include("partes/formRegistro.php");
		break;
	case 'MostrarFormAlta':
			include("partes/formAlumno.php");
		break;
	case 'MostrarPerfil':
			include("partes/perfilUsuario.php");
		break;
	case 'BorrarAlumno':
			$id = $_POST['id'];

			$resultado = $client->call('BorrarAlumno', array($id));

		if ($client->fault) {
			echo '<h2>ERROR AL INVOCAR METODO:</h2><pre>';
			print_r($cds);
			echo '</pre>';
		} else {
			$err = $client->getError();
			if ($err) {
				echo '<h2>ERROR EN EL CLIENTE:</h2><pre>' . $err . '</pre>';
			} 
			else {
				echo $resultado;
			}
		}
		break;
	case 'GuardarAlumno':
			$nombre=$_POST['nombre'];
			$legajo=$_POST['legajo'];
			$sexo=$_POST['sexo'];
			if(isset($_POST['id']) && $_POST['id'] != ""){//Si viene el id es una modificación, sino es un alta
				$id=$_POST['id'];
				$resultado = $client->call('ModificarAlumno', array($id, $nombre, $legajo, $sexo));
			}else
				$resultado = $client->call('GuardarAlumno', array($nombre, $legajo, $sexo));

			if ($client->fault) {
			echo '<h2>ERROR AL INVOCAR METODO:</h2><pre>';
			print_r($cds);
			echo '</pre>';
			} else {
				$err = $client->getError();
				if ($err) {
					echo '<h2>ERROR EN EL CLIENTE:</h2><pre>' . $err . '</pre>';
				} 
				else {
					echo $resultado;
				}
			}
			echo $resultado;

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
			$id = $_POST['id'];	

			$alu = $client->call('TraerUnAlumno', array($id));

		if ($client->fault) {
			echo '<h2>ERROR AL INVOCAR METODO:</h2><pre>';
			print_r($cds);
			echo '</pre>';
		} else {
			$err = $client->getError();
			if ($err) {
				echo '<h2>ERROR EN EL CLIENTE:</h2><pre>' . $err . '</pre>';
			} 
			else {
				echo json_encode($alu);
			}
		}


		break;
	case 'TraerUsuario':
			$usu = usuario::TraerUnUsuarioPorId($_POST['id']);		
			echo json_encode($usu) ;

		break;
	case 'Subirfotos':
		$result = Archivo::SubirArchivo($_POST['mail']);
		echo json_encode($result);

		/*
		$nombreFoto = $_POST['mail'];

		$resultado = $client->call('SubirArchivo', array($nombreFoto));

		var_dump($resultado);
		if ($client->fault) {
			echo '<h2>ERROR AL INVOCAR METODO:</h2><pre>';
			echo '</pre>';
		} else {
			$err = $client->getError();
			if ($err) {
				echo '<h2>ERROR EN EL CLIENTE:</h2><pre>' . $err . '</pre>';
			} 
			else {
				echo json_encode($resultado);
			}
		}
		*/
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