<html>
	<head>
		<link href="css/estilo.css" rel="stylesheet" type="text/css">
		<meta charset='utf-8'>
		<title>Minerva</title>	
	</head>
	<body>
	<?php
	session_start();
	?>

	<?php
	$con = mysql_connect('localhost','root','') or die (mysql_error());
	mysql_select_db('celina',$con) or die (mysql_error());
	if(isset($_POST["login"])){
 
if(!empty($_POST['usuario']) && !empty($_POST['clave'])) {
 $usuario=$_POST['usuario'];
 $clave=$_POST['clave'];
 
$query =mysql_query("SELECT * FROM usuario WHERE usuario='".$usuario."' AND clave='".$clave."'");
 
$numrows=mysql_num_rows($query);
 if($numrows!=0)
{
 while($row=mysql_fetch_assoc($query))
 {
 $dbusuario=$row['usuario'];
 $dbclave=$row['clave'];
 $dbcedula=$row['ci_prof'];
 }
 

if($usuario == $dbusuario && $clave == $dbclave)
 
{
 
 $_SESSION['session_username']=$usuario;
 $_SESSION['session_password']=$clave;
 $_SESSION['session_dbcedula']=$dbcedula;
 
/* Redirect browser */
 header("Location: intropage.php");
 }
 } else {
 
$message = "Nombre de usuario ó contraseña invalida!";
 }
 
} else {
 $message = "Todos los campos son requeridos!";
}
}
?>
 
 <div class="container mlogin">
 <div id="login">
 <h1>Logueo</h1>
<form name="loginform" id="loginform" action="index.php" method="POST">
 <p>
 <label for="user_login">Nombre De Usuario<br />
 <input type="text" name="usuario" id="usuario" class="input" value="" size="20" /></label>
 </p>
 <p>
 <label for="user_pass">Contraseña<br />
 <input type="password" name="clave" id="password" class="input" value="" size="20" /></label>
 </p>
 <p class="submit">
 <input type="submit" name="login" class="button" value="Entrar" />
 </p>
</form>
 
</div>
 
</div>
 
 
	</body>
</html>