<?php 
//session_start();//PRIMER LINEA DE MI PHP, SINO NO VA A FUNCIONAR!
if(isset($_SESSION['usuario']))//Si está logeado muestro la grilla
{
	require_once("clases/AccesoDatos.php");
	require_once("clases/alumno.php");
	$arrayDeAlumnos=alumno::TraerTodoLosAlumnos();

	if($_SESSION['tipo'] == "admin")
	{
 ?>
	<table class="Frm animated bounceInLeft" id="table">
		<thead>
			<tr>
				<th>Editar</th><th>Borrar</th><th>Nombre</th><th>Legajo</th><th>Sexo</th>
			</tr>
		</thead>
		<tbody>

			<?php 

	foreach ($arrayDeAlumnos as $alu) {
		echo"<tr>
				<td><a onclick='EditarAlumno($alu->id)' class='button-orange'> Editar</a></td>
				<td><a onclick='BorrarAlumno($alu->id)' class='button-red'>  Borrar</a></td>
				<td>$alu->nombre</td>
				<td>$alu->legajo</td>
				<td>$alu->sexo</td>
			</tr>   ";
	}
			 ?>
		</tbody>
	</table>
	<?php 
	}
	else//SI NO ES ADMIN MUESTRO LA TABLA PERO SIN LOS BOTONES
	{
	?>
	<table class="Frm animated bounceInLeft" id="table">
		<thead>
			<tr>
				<th>Editar</th><th>Borrar</th><th>Nombre</th><th>Legajo</th><th>Sexo</th>
			</tr>
		</thead>
		<tbody>

			<?php 

	foreach ($arrayDeAlumnos as $alu) {
		echo"<tr>
				<td><a disabled class='button-orange-disabled'> Editar</a></td>
				<td><a disabled class='button-red-disabled'>  Borrar</a></td>
				<td>$alu->nombre</td>
				<td>$alu->legajo</td>
				<td>$alu->sexo</td>
			</tr>   ";
	}
			 ?>
		</tbody>
	</table>

	<?php
	}
	?>

<?php 
}
else
{
	echo "<h1>Debe iniciar sesion</h1>";
} 

?>