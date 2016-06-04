<?php
session_start();//PRIMER LINEA DE MI PHP, SINO NO VA A FUNCIONAR!
if(isset($_SESSION['usuario']))//verifico que esté logeado
{
    if($_SESSION['tipo'] == "admin")
    {
?>
<link href="css/animaciones.css" rel="stylesheet">
<link href="css/estilos.css" rel="stylesheet">

    <div class="Frm animated bounceInLeft">

      <form onsubmit="GuardarAlumno();return false">
        <label>Alumno</label><br><br>
        <input type="text"   id="nombre" title="Se necesita un nombre de alumno" placeholder="Nombre"><br>
        <input type="text"   id="legajo" title="Se necesita un nro de legajo"  placeholder="Legajo"><br>
         <input type="radio" name="sexo" id="m" value="M" checked="checked"> Masculino<br>
        <input type="radio" name="sexo" id="f" value="F"> Femenino<br>
        <input type="hidden" readonly id="idAlumno" value=""><br>
        <button type="submit" class="button">Guardar </button>
      </form>

    </div> 


<?php
    }
    else
    {
        echo "<h1>Su usuario no posee permisos para esta acción</h1>";
    }
}    
else
{
    echo "<h1>Debe iniciar sesion</h1>";
}
?>