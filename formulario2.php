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
<?php
	if(isset($_GET)){
		if($_GET['error']==1){
			echo "favor de corregir los datos del formulario";
		}
	}

?>
	<body>
		<p>Por favor ingrese los siguientes datos</p>
		<form name="alta" action "alta.php" method="post">
			<label for="nombre">Nombre:</label>
			<input type="text" name="nombre" value="<?php echo $resultado['nombre']; ?>"><br/>
			<label for="apaterno">Apellido Paterno:</label>
			<input type="text" name="apaterno" value="<?php echo $resultado['apaterno']; ?>"><br/>
			<label for="amaterno">Apellido Materno:</label>
			<input type="text" name="amaterno" value="<?php echo $resultado['amaterno']; ?>"><br/>
			<label for="correoe">Correo Electronico:</label>
			<input type="text" name="correoe" value="<?php echo $resultado['correoe']; ?>"><br/>
			<input type="hidden" name="id" value="<?php echo $id;?>">
			<input type="submit" value="Submit">
		</form>
	</body>
</html>
