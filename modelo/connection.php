<?php
//Función que reaiza la conexión a la BD
function abrir_conexion(){	
	$host="localhost";
	$usuario="root";
	$contra="";
	$base="bd_datosusuario";

	$link = new mysqli($host,$usuario,$contra,$base);
	return $link;
}

?>