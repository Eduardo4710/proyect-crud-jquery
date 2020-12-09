<?php


$salida="";
require_once('connection.php');
$mysql = abrir_conexion();
//Proceso que selecciona los registros de la tabla
$sql = "SELECT * FROM registrousuario";


$datos=$mysql->query($sql);			
			 


//Almacena los registros en el arreglo 
while($fila=$datos->fetch_assoc()){				
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

//Muestra los datos en formato Json
echo $salida;
$mysqli -> close();


/*
//Proceso que selecciona los registros de la tabla

$host="localhost";
$usuario="root";
$contra="";
$base="bd_datosusuario";

$mysql = mysqli_query($host,$usuario,$contra,$base);
$sql = "SELECT * FROM registrousuario";


$datos = mysqli_query($mysql,$sql);			
//$mysql->close();			 
//$json=array();	

//Almacena los registros en el arreglo 
while($row=mysqli_fetch_assoc($datos)){				
    $json[]=$row;
}

//Muestra los datos en formato Json
echo json_encode($json);


*/
?>