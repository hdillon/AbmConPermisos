<?php 
	require_once('./lib/nusoap.php'); 
	require_once('../clases/AccesoDatos.php');
	require_once('../clases/alumno.php');
	require_once('../clases/usuario.php');
	require_once("../php/archivo.php");
	
	$server = new nusoap_server(); 

	$server->configureWSDL('WebService Con PDO', 'urn:wsPdo'); 

///**********************************************************************************************************///								
//REGISTRO METODO SIN PARAMETRO DE ENTRADA Y PARAMETRO DE SALIDA 'ARRAY de ARRAYS'


	$server->register('BorrarAlumno',                	
						array(),  
						array('return' => 'xsd:Array'),   
						'urn:wsPdo',                		
						'urn:wsPdo#BorrarAlumno',             
						'rpc',                        		
						'encoded',                    		
						'Borra el alumno que se le pasa por ID'    			
					);


	function BorrarAlumno($id) {
		
		return alumno::BorrarAlumnoPorID($id);
	}


	$server->register('GuardarAlumno',                	
						array(),  
						array('return' => 'xsd:Array'),   
						'urn:wsPdo',                		
						'urn:wsPdo#GuardarAlumno',             
						'rpc',                        		
						'encoded',                    		
						'Guarda el alumno que se le pasa en el array'    			
					);


	function GuardarAlumno($nombre, $legajo, $sexo) {
		
		return alumno::InsertarElAlumno($nombre, $legajo, $sexo);
	}


	$server->register('ModificarAlumno',                	
						array(),  
						array('return' => 'xsd:Array'),   
						'urn:wsPdo',                		
						'urn:wsPdo#ModificarAlumno',             
						'rpc',                        		
						'encoded',                    		
						'Modifica el alumno que se le pasa en el array'    			
					);


	function ModificarAlumno($id, $nombre, $legajo, $sexo) {
		
		return alumno::ModificarAlumnoParametros($id, $nombre, $legajo, $sexo);
	}

	$server->register('TraerUnAlumno',                	
						array(),  
						array('return' => 'xsd:Array'),   
						'urn:wsPdo',                		
						'urn:wsPdo#TraerUnAlumno',             
						'rpc',                        		
						'encoded',                    		
						'Trae el alumno con el id que se le pasa en el array'    			
					);

	function TraerUnAlumno($id)
	{
		return alumno::TraerUnAlumno($id);
	}

	$server->register('SubirArchivo',                	
						array(),  
						array('return' => 'xsd:Array'),   
						'urn:wsPdo',                		
						'urn:wsPdo#SubirArchivo',             
						'rpc',                        		
						'encoded',                    		
						'Sube el archivo que se le pasa en el array'    			
					);

	function SubirArchivo($nombreFoto)
	{
		return Archivo::SubirArchivo($nombreFoto);
	}

	

	
	

///**********************************************************************************************************///								

	$HTTP_RAW_POST_DATA = file_get_contents("php://input");	
	$server->service($HTTP_RAW_POST_DATA);
