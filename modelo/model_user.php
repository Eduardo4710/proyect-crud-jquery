
<?php
require_once('connection.php');
//Se obtiene la acción que se desea realizar



if(isset($accion))
{
	$accion = $_POST['accion'] ? $_POST['accion'] : '';

switch ($accion) {
	case 'select':
		
		
		
	break;

	case 'save':
		break;
	case 'update':
		//Se obtiene los datos enviados desde el controlador
		$id = $_POST['id'] ? $_POST['id'] : '';
		$nombre = $_POST['nombre'] ? $_POST['nombre'] : '';
		$apePaterno = $_POST['apePaterno'] ? $_POST['apePaterno'] : '';
		$apeMaterno = $_POST['apeMaterno'] ? $_POST['apeMaterno'] : '';
		$descripcion = $_POST['descripcion'] ? $_POST['descripcion'] : '';
		$dirrecion = $_POST['dirrecion'] ? $_POST['dirrecion'] : '';
		$contrasena = $_POST['contrasena'] ? $_POST['contrasena'] : '';
		$telefono = $_POST['telefono'] ? $_POST['telefono'] : '';
		$estado = $_POST['estado'] ? $_POST['estado'] : '';
		$categoria = $_POST['categoria'] ? $_POST['categoria'] : '';
		$usuario = $_POST['eusuario'] ? $_POST['eusuario'] : '';
		$nombreImg = $_POST['nombreImg'] ? $_POST['nombreImg'] : '';
		$imagen = basename($_FILES['file_to_upload']['name']);

		//Si no hay imagen
		if ($imagen != "") {
			//Procesos que sube la imagen al servidor
			$verifica = sube_archivo();
			//Verifica si se ha subido la imagen o archivo	
			if ($verifica == 'true') {
				//Procesos a la base de datos
				echo ('Se subió el archivo con éxito');
				$query = "CALL `actualizarTrabajador`(
				 $id,
				'$nombre',
				'$apePaterno',
				'$apeMaterno',
				'$contrasena',
				'$descripcion',
				'$dirrecion',
				'$estado',
				'$telefono',
				'$imagen',
				 $categoria,
				'$usuario')";
				$afect_fila = query_bd($query);

				//Verifica si el proceso fue exitoso
				if ($afect_fila > 0) {
					echo ('Se modifico con éxito');
				} else {
					echo (', No se hizo cambios');
				}
			} else {
				echo ('Se produjo un error al subir archivo');
			}
		} else {
			//Proceso de actualización sin imagen
			$query = "CALL `actualizarTrabajador`(
				 $id,
				'$nombre',
				'$apePaterno',
				'$apeMaterno',
				'$contrasena',
				'$descripcion',
				'$dirrecion',
				'$estado',
				'$telefono',
				' ',
				$categoria,
				'$usuario')";
			$afect_fila = query_bd($query);

			//Verifica si el proceso fue exitoso
			if ($afect_fila > 0) {
				echo (' Se modifico con éxito');
			} else {
				echo (' No se hizo cambios');
			}
		}
		break;

       case 'edi_ajax':

		//Proceso que selecciona los registros de la tabla
		$sql = "SELECT * FROM `registrousuario`";

		$mysql = abrir_conexion();
		$datos = $mysql->query($sql);
		$mysql->close();
		$json = array();

		//Almacena los registros en el arreglo 
		while ($row = $datos->fetch_assoc()) {
			$json[] = $row;
		}
		//Muestra los datos en formato Json
		echo json_encode($json);

		break;
	case 'eliminar':
		//Muestra los datos en formato Json
		$id = $_POST['id'] ? $_POST['id'] : '';
		//Preceso que elimina el registro en la BD
		$query = "CALL eliminarUser ($id)";
		$afect_fila = query_bd($query);
		//Verifica si el proceso fue exitoso
		if ($afect_fila > 0) {
			echo (' Se eliminó con éxito');
		} else {
			echo (' No se elimino');
		}
		break;

	default:
		echo "La opcion no esta disponible";
		break;
}
}
function sube_archivo()
{
	if ($_FILES) {
		//La ruta de guardado de la imagen
		$target_dir = "../img/";
		//Obtiene el nombre del archivo
		$target_file = $target_dir . basename($_FILES["file_to_upload"]["name"]);
		//Proceso que guarda la imagen en la ruta especificado

		$finfo = new finfo(FILEINFO_MIME_TYPE);
		$fileContents = file_get_contents($_FILES["file_to_upload"]["tmp_name"]);
		$mimeType = $finfo->buffer($fileContents);

		/*Se devuelve un valor verdadero o falso 
		segun el grado de exito de la imagen
		*/

		if (move_uploaded_file($_FILES["file_to_upload"]["tmp_name"], $target_file)) {
			return ('true');
		} else {
			return ('false');
		}
	}
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