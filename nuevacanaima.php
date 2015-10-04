<?php

$con = mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('celina',$con)or die(mysql_error());

//Datos generales

$user = $_POST['ci_prof'];

if (isset($_POST['ci_prof'])){
	$result = mysql_query("SELECT * FROM usuario WHERE usuario='$user'");
	$row = mysql_fetch_row($result);
	$ci_prof = $row[1];
}


//Datos para canaima
$serial_equipo = $_POST['serial_equipo'];
$modelo = $_POST['modelo'];
$estado_equipo = $_POST['estado_equipo']; 

//Datos para estudiante
$nombre_estudiante = $_POST['nombre_estudiante'];
$apellido_estudiante = $_POST['apellido_estudiante'];
$cedula_estudiante = $_POST['cedula_estudiante'];
$sexo = $_POST['sexo'];
$nivel = $_POST['nivel'];
$nombre_estudiante2 = $nombre_estudiante.' '.$apellido_estudiante;

//Datos para representante
$ci_repre = $_POST['ci_repre'];
$nombre_repre = $_POST['nombre_repre'];
$apellido_repre = $_POST['apellido_repre'];
$nombre_repre2 = $nombre_repre.' '.$apellido_repre;
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];



if (isset($_POST['enviar'])) {
	$sql="INSERT INTO canaima_registro(ci_prof,ci_estu,serial_equipo,modelo,estado_equipo,fecha_registro) VALUES ('$ci_prof','$cedula_estudiante','$serial_equipo','$modelo','$estado_equipo',NOW())";
	mysql_query($sql) or die(mysql_error());

	$sql2 = "INSERT INTO estudiante(ci_repre,nombre,apellido,cedula,sexo,nivel_estudio,fecha_registro) VALUES ('$ci_repre','$nombre_estudiante','$apellido_estudiante','$cedula_estudiante','$sexo','$nivel',NOW())";
	mysql_query($sql2) or die (mysql_error());

	$sql3 = "INSERT INTO datos_repre(ci_repre,nombre,apellido,direccion,telefono) VALUES('$ci_repre','$nombre_repre','$apellido_repre','$direccion','$telefono')";
	mysql_query($sql3) or die (mysql_error());

 	$sql4 = "INSERT INTO final(ci_estu,nombre_estu,genero,nombre_repre,ci_repre,telefono,serial_equipo,estado) VALUES ('$cedula_estudiante','$nombre_estudiante2','$sexo','$nombre_repre2','$ci_repre','$telefono','$serial_equipo','$estado_equipo')";
    mysql_query($sql4) or die (mysql_error());
 } 
        
?>