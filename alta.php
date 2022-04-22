<?php
//Recibir datos del formulario y asignarlo a variables, despues imprimirlos
//var_dump($_POST);
include 'conexion.php';
//$insercion = pq_query("Insert into usuarios values()");
$nombre = $_POST["nombre"];
$apaterno = $_POST["apaterno"];
$amaterno = $_POST["amaterno"];
$correoe = $_POST["correoe"];
/*echo "Hola ".$nombre." ".$apaterno." ".$amaterno;
echo "<br />"; 
echo "Tu correo es: ".$correoe;*/
if(preg_match('[a-z áéíóúüñ]{2,50}/ig', $nombre)){
	echo "Es un nombre valido";
} else {
	echo "No es un nombre valido";
	//header('Location: formulario2.php?error=1');
}
if(filter_var($correoe,FILTER_VALIDATE_EMAIL)){
	echo "es un correo valido";
} else {
	//echo "No es un correo valido";
	header('Location: formulario2.php?error=1');
}

$insercion = "insert into usuarios (nombre,apaterno,amaterno,correoe) values ('$nombre','$apaterno','$amaterno','$correoe')";
$query = pg_query($con,$insercion);
//var_dump($query);
if($query){
	echo"Se guardo el registro en la base de datos";
	echo "<br />"
	echo "<a href='formulario.html'>Regresa al formulario</a>'";
} else {
	echo "Hubo un error";
}
pg_close($con);
?>
