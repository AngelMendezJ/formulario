<?php
include 'conexion.php';
$id = $_GET['id'];
//var_dump($id);
$query = "select nombre, apaterno, amaterno, correoe from usuarios where id=".$id;
$ejecucion = pg_query($con,$query);
$resultado = pg_fetch_assoc($ejecucion);

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<p>El siguiente registro sera eliminado</p>
		<table>
			<tr>
				<th>Nombre</th>
				<th>Apellido Paterno</th>
				<th>Apellido Materno</th>
				<th>Correo Electronico</th>
			</tr>
			<tr>
				<td><?= $resultado['nombre']; ?></td>
				<td><?= $resultado['apaterno']; ?></td>
				<td><?= $resultado['amaterno']; ?></td>
				<td><?= $resultado['correoe']; ?></td>
			</tr>
		</table>
		<form name="eliminar" action="borrar.php" method="post">
		<input type="hidden" name="id" value="<?php echo $id;?>">
			<input type="submit" value="Eliminar">
	</body>
</html>
