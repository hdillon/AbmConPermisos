
<link href="css/animaciones.css" rel="stylesheet">
<link href="css/estilos.css" rel="stylesheet">

    <div class="Frm animated bounceInUp">

      <form onsubmit="GuardarAlumno();return false">
        <label>Alumno</label><br><br>
        <input type="text"   id="nombre" title="Se necesita un nombre de alumno" placeholder="Nombre"><br>
        <input type="text"   id="legajo" title="Se necesita un nro de legajo"  placeholder="Legajo"><br>
        <input type="text"   id="sexo"  ><br>
        <input type="hidden" readonly id="idAlumno"><br>
        <button type="submit" class="button">Guardar </button>
      </form>

    </div> 

