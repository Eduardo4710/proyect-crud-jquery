<?php


$salida="";
require_once('connection.php');
$mysqli = abrir_conexion();
//Proceso que selecciona los registros de la tabla
$query = "SELECT * FROM registrousuario";

if(isset($_GET['valor']))
{
    $q=$mysqli->real_escape_string($_GET['valor']);
   // $query=" SELECT  id , Nombre FROM    WHERE  Nombre LIKE '%".$q."%'";
     $query= " CALL Search ($q)";
}

$resultado=$mysqli->query($query);			
	 
if(/*!empty($resultado) && */$resultado-> num_rows > 0)
{
//Almacena los registros en el arreglo 
while($fila = $resultado-> fetch_assoc()){				
    $salida.="
        <tr>
<td >".$fila['id']."</td>
<td ><img width ='50' src='data:image/jpg;base64,".base64_encode($fila['Imagen'])."'></td>
<td >".$fila['Nombre']."</td>
<td >".$fila['Sexo']."</td>

<td >".$fila['Fecha']."</td>
<td><button type='button' class='btn btn-success' id='Editar' dataID='".$fila['id']."'   src='".base64_encode($fila['Imagen'])."'     dataNom='".$fila['Nombre']."' dataSexo='".$fila['Sexo']."'  data-toggle='modal' data-target='#editM' data-whatever='@mdo'>Editar</button></td>
<td> <button type=button' class='btn btn-danger' id='eliminar' data='".$fila['id']."' >Eliminar</button></td>
</tr>";
}
}
else{
    $salida.="No hay datos";
}



echo $salida;
$mysqli -> close();



?>