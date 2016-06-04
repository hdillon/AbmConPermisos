<?php 
session_start();//PRIMER LINEA DE MI PHP, SINO NO VA A FUNCIONAR!
if(isset($_SESSION['usuario']))//Si está logeado muestro la grilla
{
	require_once("clases/AccesoDatos.php");
	require_once("clases/usuario.php");
	$objUsuario=usuario::TraerUnUsuarioPorId($_SESSION['id']);

 ?>
	<table class="Frm animated bounceInLeft" id="table">
		<thead>
			<tr>
				<th>Editar</th><th>Nombre</th><th>Mail</th><th>Password</th><th>Tipo</th>
			</tr>
		</thead>
		<tbody>

			<?php 

		echo"<tr>
				<td><a onclick='Editarusuario($objUsuario->id)' class='button-orange'> Editar</a></td>
				<td>$objUsuario->nombre</td>
				<td>$objUsuario->mail</td>
				<td>$objUsuario->password</td>
				<td>$objUsuario->tipo</td>
			</tr>   ";

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