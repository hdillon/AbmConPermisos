<?php 
//session_start();//PRIMER LINEA DE MI PHP, SINO NO VA A FUNCIONAR!
if(isset($_SESSION['usuario']))//Si está logeado muestro la grilla
{
	require_once("clases/AccesoDatos.php");
	require_once("clases/usuario.php");
	$objUsuario=usuario::TraerUnUsuarioPorId($_SESSION['id']);

echo "<div id='mainmenu' class='Frm animated bounceInRight'>
<img src='$objUsuario->pathfoto' width='150px' height='150px'><br><br>
</div>"
 ?>

	
	<table class="Frm animated bounceInLeft" align="center" id="table">
		<thead/>
		<tbody>
			<?php 
		echo"<tr>
			<td>Nombre</td>
			<td>$objUsuario->nombre</td>
			</tr>
			<tr>
			<td>Mail</td>
			<td>$objUsuario->mail</td>
			</tr>
			<tr>
			<td>Password</td>
			<td>$objUsuario->password</td>
			</tr>
			<tr>
			<td>Tipo</td>
			<td>$objUsuario->tipo</td>
			</tr> 
			<tr>
			<td colspan='2'><a onclick='EditarUsuario($objUsuario->id)' class='button-orange2'> Editar</a></td>
			</tr>";
			 ?>
		</tbody>
	</table>

<?php 
}
else
{
	echo "<h1>Debe iniciar sesion</h1>";
} 

?>