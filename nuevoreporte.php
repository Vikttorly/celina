<?php

$con = mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('celina',$con)or die(mysql_error());


$serial_equipo = $_POST['serial_equipo'];
$ci_prof = $_POST['ci_prof'];
$estado_equipo = $_POST['estado_equipo'];
$descipcion_reporte = $_POST['descipcion_reporte'];
$estado_reporte = $_POST['estado_reporte'];


if (isset($_POST['enviar_reporte'])){

	$sql0 = "SELECT * FROM reporte_canaima WHERE serial_equipo='$serial_equipo'";
	$result = mysql_query($sql0) or die (mysql_error());
	$row = mysql_fetch_row($result);
	$db_serial_equipo = $row[2];


	if ($serial_equipo == $db_serial_equipo) {
		$sql01 = "UPDATE reporte_canaima SET estado_equipo='$estado_equipo', estado_reporte='$estado_reporte', caso_reporte='$descipcion_reporte'";
		mysql_query($sql01) or die (mysql_errno());
	}else{
	$sql = "INSERT INTO reporte_canaima(ci_prof,serial_equipo,estado_equipo,fecha_reporte,estado_reporte,caso_reporte) VALUES('$ci_prof','$serial_equipo','$estado_equipo',NOW(),'$estado_equipo','$descipcion_reporte')";
	mysql_query($sql) or die (mysql_error());
	}

	$sql2 = "UPDATE canaima_registro SET estado_equipo='$estado_equipo' WHERE serial_equipo='$serial_equipo'";
	mysql_query($sql2) or die (mysql_error());

	$sql3 = "UPDATE final SET estado='$estado_equipo' WHERE serial_equipo='$serial_equipo'";
	mysql_query($sql3) or die (mysql_error());
}


?>