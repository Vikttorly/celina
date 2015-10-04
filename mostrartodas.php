<?php

$espacio = '';

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset='utf-8'>
	<link href='css/estilo.css' rel='stylesheet' type='text/css'>
	<title>Mostrando resultados</title>
</head>
<body>

<center>

<?php

$con = mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('celina',$con)or die(mysql_error());

	//Definiendo el total de los listados.

	$sql2 = mysql_query("SELECT * FROM final WHERE 1");
	$row2 = mysql_fetch_row($sql2);


	$num2 = 0;
	$var2 = 0;
	while ($row2 = mysql_fetch_row($sql2)) {
		
		while($var2 == $num2) {

			$list2 = $var2 + 28;
			$listado2 = $list2 / 28;

			$sql2 = mysql_query("SELECT * FROM final limit $num2,28");

	$var2 = $var2 + 28;

		}
		$num2 = $num2 +1;
}

	//Mostrar los resultados

	$sql1 = mysql_query("SELECT * FROM final WHERE 1");
	$row = mysql_fetch_row($sql1);

	$num = 0;
	$var = 0;
	while ($row = mysql_fetch_row($sql1)) {
		
		while($var == $num) {

			$list = $var + 28;
			$listado = $list / 28;

			$sql2 = mysql_query("SELECT * FROM final limit $num,28");
			echo '
	<table>
	<tr><td>ESTADO: GUÁRICO</td><td>MUNICIPIO: MIRANDA</td><td>PARROQUIA: CALABOZO</td><td></td></tr>
	<tr><td>PLANTEL: LICEO CELINA ACOSTA DE VIANA</td><td>CODIGO DEA: OD11591208</td><td>TLF PLANTEL: 02469960686</td><td>CORREO: angelu-27@hotmail.com</td></tr>
	<tr><td>DIRECTOR(A): ALI VILERA</td><td>CI: 6624570</td><td>TLF DIRECTOR: 0424-3332374</td><td>CORREO:</td></tr>
	<tr><td>DOCENTE: CARIDAD LIMA</td><td>CI: 10265350</td><td>TLF DOCENTE: 0414-4506549</td><td>CORREO:</td></tr>
	</table>
	<h4 align="center">LISTADO Nº '.$listado.'/'.$listado2.' DE ESTUDIANTES REZAGADOS</h4>
	';
			echo "<table border='1'>"; 
			echo "<tr><td>ID</td><td>Cédula escolar</td><td>Nombre estudiante</td><td>Género</td><td>Representante</td><td>CI Represetante</td><td>Telefono</td><td>Serial</td><td>Estado</td></tr>"; 
			while ($row = mysql_fetch_row($sql2)){ 
       		echo "<tr><td>$espacio$row[0]$espacio</td><td>$espacio$row[1]$espacio</td><td>$espacio$row[2]$espacio</td><td>$espacio$row[3]$espacio</td><td>$espacio$row[4]$espacio</td><td>$espacio$row[5]$espacio</td><td>$espacio$row[6]$espacio</td><td>$espacio$row[7]$espacio</td><td>$espacio$row[8]$espacio</td></tr>"; 
			} 
	echo "</table><br><br>";

	$var = $var + 28;

		}
		
		$num = $num +1;
}



/*
	

*/ 

/*
$content = ob_get_clean();
require_once('pdf/html2pdf.class.php');
$pdf = new html2pdf('l','a4','fr','UTF-8');
$pdf->writeHTML($content);
$pdf->pdf->IncludeJS('print(TRUE)');
$pdf->output('resultado.pdf');
*/

?>
<input class='imprimir' type="button" name="imprimir" value="Imprimir" onclick="window.print();">
</center>
</body>
</html>


