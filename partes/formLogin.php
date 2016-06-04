<?php
session_start();
?>
<link href="css/estilos.css" rel="stylesheet" type="text/css">
<link href="css/animaciones.css" rel="stylesheet" type="text/css">

 
  <?php 
    if(!isset($_SESSION['usuario']))//Si está logeado NO MUESTRO el form login
    {

      if(isset($_COOKIE['cookieusuario']))
      {
        $arraycookie = json_decode($_COOKIE['cookieusuario'], true);//resupero el array con los datos de la cookie para meterlo en el form
      }
  ?>
    
    <div class="Frm animated bounceInLeft">
      <form class=""  onsubmit="validarLogin();return false;">
        <label>Login</label><br><br>
        <input type="text" id="correo" name="email" placeholder="Ingrese su email" value="<?php  if(isset($arraycookie)){echo $arraycookie['mail'];}?>"><br>
        <input type="password" id="clave" minlength="4" placeholder="clave" required="" value="<?php  if(isset($arraycookie)){echo $arraycookie['password'];}?>"><br>
        <input type="checkbox" id="recordarme" checked> Recordame </input><br><br>
        <button type="submit" class="button" id="login">Login</button>
      </form>
    </div>

    <?php
  }
  else
{?>

  <button class="button-red"onclick="deslogear()">Desloguear</button>
<?php
}

    ?>

 
    
  
