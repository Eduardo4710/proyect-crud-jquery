<?php
require_once('connection.php');
//Se obtiene los datos enviados desde el controlador

$nombre = $_POST['nombre'] ? $_POST['nombre'] : '';
$sexo = $_POST['sexo'] ? $_POST['sexo'] : '';
$imagen = $_FILES['file_to_upload']['tmp_name'];
$imgContent = addslashes(file_get_contents($imagen));
//Procesos a la base de datos                   
$query = "CALL `sp_insert_user`('$nombre','$sexo','$imgContent')";
//Procesos a la base de datos
$afect_fila = query_bd($query);
//Verifica si el proceso fue exitoso
if ($afect_fila > 0) {
    echo ('Se guardo con éxito');
} else {
	echo (',Se Produjo un Error');
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