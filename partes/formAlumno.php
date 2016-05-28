
<link href="css/animaciones.css" rel="stylesheet">
<link href="css/estilos.css" rel="stylesheet">

    <div class="Frm animated bounceInUp">

      <form class="" onsubmit="GuardarAlumno();return false">
        <label>Alumno</label><br><br>
        <input type="text"   id="nombre" title="Se necesita un nombre de alumno" class="form-control" placeholder="Nombre" required="" autofocus="">
        <input type="text"   id="legajo" title="Se necesita un nro de legajo"  class="form-control" placeholder="Legajo" required="" autofocus="">
        <input type="text"   id="sexo"   title="Se necesita un sexo"    class="form-control" placeholder="Sexo" required="" autofocus="">
        <input readonly   type="hidden"    id="idAlumno">
        <button type="submit">Guardar </button>
      </form>

    </div> 

