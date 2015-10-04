<?php
error_reporting(0);
$ci_estu=$_POST['ci_estu'];

$con = mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('celina',$con)or die(mysql_error());

$result = mysql_query("SELECT * FROM canaima_registro WHERE ci_estu='$ci_estu'");
$row = mysql_fetch_row($result);

$ci_prof = $row[0];

$result2 = mysql_query("SELECT * FROM profesor WHERE ci_prof = $ci_prof");
$row2 = mysql_fetch_row($result2);

$result3 = mysql_query("SELECT * FROM estudiante WHERE cedula = $ci_estu");
$row3 = mysql_fetch_row($result3);

$serial_equipo = $row[2];

$result4 = mysql_query("SELECT * FROM reporte_canaima WHERE serial_equipo='$serial_equipo'");
$row4 = mysql_fetch_row($result4);

if ($row > 1 and $row > 1){

echo '
<table>
<tr>
	<td>Profesor Asignador: </td><td>'.$row2[1].' '.$row2[2].'</td>
</tr>
<tr>
	<td>Estudiante Asignado: </td><td>'.$row3[2].' '.$row3[3].'</td>
</tr>
<tr>
	<td>Serial: </td><td>'.$row[2].'</td>
</tr>
<tr>
	<td>Modelo</td><td>'.$row[3].'</td>
</tr>
<tr>
	<td>Estado</td><td>'.$row[4].'</td>
</tr>
<tr>
	<td>Fecha de Registro</td><td>'.$row[5].'</td>
</tr>
<tr>
	<td>Ultimo Resporte: </td><td>'.$row4[4].'</td>
</tr>
<tr>
	<td>Des. Resporte: </td><td>'.$row4[6].'</td>
</tr>
</table>

';

}else{echo "<br><br>No se han encontrado estudiantes asignados";}