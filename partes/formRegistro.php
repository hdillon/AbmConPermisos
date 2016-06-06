<link href="css/estilos.css" rel="stylesheet" type="text/css">
<link href="css/animaciones.css" rel="stylesheet" type="text/css">

    <div class="Frm animated bounceInLeft">
      <form class=""  onsubmit="GuardarUsuario();return false">
        <label>Registro</label><br><br>
        <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre" value=""><br>
        <input type="text" id="correo" name="email" placeholder="Ingrese su email" value=""><br>
        <input type="password" id="clave" minlength="4" placeholder="Ingrese su clave" required="" value=""><br>
        <input type="password" id="clave2" minlength="4" placeholder="Repita su clave" required="" value=""><br>
        <input type="radio" name="tipo" id="a" value="a" checked="checked"> Admin<br>
        <input type="radio" name="tipo" id="u" value="u"> User<br>
        <input type="file" name="foto" id="foto" onchange="subirFoto()"><br>
        <input type="hidden" readonly id="idUsuario" value=""><br>
        <button type="submit" class="button" id="login">Registrarse</button>
      </form>
    </div>
