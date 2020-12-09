<?php
require_once('connection.php');

//Se obtiene los datos enviados desde el controlador
$id = $_POST['id'] ? $_POST['id'] : '';
$nombre = $_POST['enombre'] ? $_POST['enombre'] : '';
$sexo = $_POST['esexo'] ? $_POST['esexo'] : '';
//$imagen = basename($_FILES['file_to_upload']['tmp_name']);
$imagen = $_FILES['file_to_upload']['tmp_name'];


//Si no hay imagen
if ($imagen !="") {
    //Procesos que sube la imagen al servidor
    $imgContent = addslashes(file_get_contents($imagen));   
    //Verifica si se ha subido la imagen o archivo	
  //  if ($imagen == 'true') {
        //Procesos a la base de datos
        echo ('Se subió el archivo con éxito');
        $query = "CALL `actualizarUsuario`( $id,'$nombre','$sexo','$imgContent')";
        $afect_fila = query_bd($query);

        //Verifica si el proceso fue exitoso
    /*    if ($afect_fila > 0) {
            echo ('Se modifico con éxito');
        } else {
            echo (', No se hizo cambios');
        }
    } else {
        echo ('Se produjo un error al subir archivo');
    }*/
} else {
    //Proceso de actualización sin imagen
    $query = "CALL actualizarUsuarioSinImagen ( $id,'$nombre','$sexo')";
    $afect_fila = query_bd($query);
    echo ('Se  modifico  con éxito');
    //Verifica si el proceso fue exitoso
  //  if ($afect_fila > 0) {
    //    echo (' Se modifico con éxito');
  //  } else {
  //      echo (' No se hizo cambios');
   // }
}




//Función que ejecuta peticiones a la BD
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