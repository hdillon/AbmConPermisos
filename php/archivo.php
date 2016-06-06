<?php
class Archivo{

	public static function SubirArchivo($nombreFoto)
	{
		$archivotmp = $nombreFoto . ".jpg";
		$destino = "imagenes/" . $archivotmp;
		$uploadOk = 1;

		if (file_exists($destino)) {
    	unlink($destino);
		}

		if(move_uploaded_file($_FILES["foto"]["tmp_name"], $destino)){
			$retorno['html'] = "<input type='hidden' id='hdnnombrefoto' value='".$archivotmp."' />";
			return $retorno;
		}
		return FALSE;


	}
}
?>