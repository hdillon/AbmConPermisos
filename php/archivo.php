<?php
class Archivo{

	public static function SubirArchivo()
	{
		$archivotmp = date("YmdHis") . ".jpg";
		$destino = "imagenes/" . $archivotmp;

		if(move_uploaded_file($_FILES["foto"]["tmp_name"], $destino)){
			$retorno['html'] = "<input type='hidden' id='hdnnombrefoto' value='".$archivotmp."' />";
			return $retorno;
		}
		return FALSE;


	}
}
?>