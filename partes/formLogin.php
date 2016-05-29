<?php
session_start();
?>
<link href="css/estilos.css" rel="stylesheet" type="text/css">
<link href="css/animaciones.css" rel="stylesheet" type="text/css">

 
  <?php 
    if(!isset($_SESSION['usuario']))//Si está logeado NO MUESTRO el form login
    {
  ?>
    
    <div class="Frm animated bounceInUp">
      <form class=""  onsubmit="validarLogin();return false;">
        <label>Login</label><br><br>
        <input type="text" id="correo" name="email" placeholder="Ingrese su email" ><br>
        <input type="password" id="clave" minlength="4" placeholder="clave" required=""><br>
        <input type="checkbox" id="recordarme" checked> Recordame </input><br><br>
        <button type="submit" class="button" id="login">Login</button>
      </form>
    </div>

    <?php
  }
  else
{?>

  <button class="button"onclick="deslogear()">Desloguear</button>
<?php
}

    ?>

 
    
  
