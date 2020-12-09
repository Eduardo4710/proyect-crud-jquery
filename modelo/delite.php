<?php
require_once('connection.php');
//Muestra los datos en formato Json
$id = $_POST['id'] ? $_POST['id'] : '';
echo $id;
//Preceso que elimina el registro en la BD
$query = "CALL eliminarUser ($id)";

$afect_fila = query_bd($query);
//Verifica si el proceso fue exitoso
if ($afect_fila > 0) {
    echo (' Se eliminó con éxito');
} else {
    echo (' No se elimino');
}


function query_bd($sql)
{
	$mysql = abrir_conexion();
	$mysql->query($sql);
	$afe = $mysql->affected_rows;
	$mysql->close();
	$mysql = abrir_conexion();
	return ($afe);
}

?>