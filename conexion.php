<?php
//conexion al manejador y base de datos
echo "Interntará la conexión";
$con = pg_connect("dbname=formulario user=usuario1 password=hola123 port=5432") or die (pg_last_error());
var_dump($con);
?>
