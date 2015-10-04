<?php
$con = mysql_connect('localhost','root','') or die(mysql_error());
mysql_select_db('celina',$con)or die(mysql_error());

session_start();
if(!isset($_SESSION["session_username"])) {
 header("location:index.php");
 
} 

?>
<html>
<head>
  <title>Bienvenido</title>
  <meta charset='utf-8'>
  <link rel="stylesheet" type="text/css" href="css/estilo2.css">
  <script src="/gnb/js/jquery-1.11.3.js"></script>
</head>
<body>
   <input type="submit" id="mostrar_nueva_canaima" value="Añadir Nueva Canaima"> <input type="submit" id="mostrar_nuevo_reporte" value="Añadir Nuevo Reporte">
   <a href="mostrartodas.php"><input type="button" value="Mostrar registros"></a>
  


<br><br><br><br><br><br>
 <div id="nuevacanaima">
<form action="nuevacanaima.php" method="post">
<input type="hidden" name="ci_prof" value="<?php echo $_SESSION["session_username"]; ?>">
   <table align="center">
     <tr>
       <td><table>
       <h3>Datos de canaima</h3>
      <tr>
        <td>Serial</td><td><input type="text" name="serial_equipo"></td>
      </tr>
      <tr>
        <td>Modelo</td><td><input type="text" name="modelo"</td>
      </tr>
       <tr>
        <td>Estado</td><td><select name="estado_equipo" class="input"><option value="OPERATIVA">OPERATIVA</option><option value="INOPERATIVA">INOPERATIVA</option></select></td>
      </tr>
    </table></td>
       <td><h3>Datos de estudiante</h3>
       <table>
      <tr>
        <td>Nombre</td><td><input type="text" name="nombre_estudiante"</td>
      </tr>
      <tr>
        <td>Apellido</td><td><input type="text" name="apellido_estudiante"</td>
      </tr>    
      <tr>
        <td>Cédula</td><td><input type="text" name="cedula_estudiante"></td>
      </tr>   
      <tr>
        <td>Sexo</td><td><select name="sexo" class="input"><option value="F" >FEMENINO</option><option value="M">MASCULINO</option></select></td>
      </tr>  
      <tr>
        <td>Nivel</td><td><select name="nivel" class="input"><option value="1">1º AÑO</option><option value="2">2º AÑO</option><option value="3">3º AÑO</option>
        <option value="4">4º AÑO</option><option value="5">5º AÑO</option></select></td>
      </tr>                          
    </table>
</td>
       <td> <h3>Datos de representante</h3>
    <table>
      <tr>
        <td>Cédula</td><td><input type="text" name="ci_repre"</td>
      </tr>
      <tr>
        <td>Nombre</td><td><input type="text" name="nombre_repre"</td>
      </tr>
      <tr>
        <td>Apellido</td><td><input type="text" name="apellido_repre"</td>
      </tr>
      <tr>
        <td>Dirección</td><td><textarea name="direccion"></textarea></td>
      </tr>
      <tr>
        <td>Telefono</td><td><input type="text" name="telefono"></td>
      </tr>
    </table>
       </td>
     </tr>
   </table>
  <center><input type="submit" name="enviar"></center>
  </div>
  </form>

<script type="text/javascript">

$("#nuevacanaima").hide();

$(document).ready(function(){
    $("#mostrar_nueva_canaima").on( "click", function() {
      $('#nuevacanaima').show(); //muestro mediante id
     });
    $("#mostrar_nuevo_reporte").on( "click", function() {
      $('#nuevacanaima').hide(); //oculto mediante id
    });
  });
</script>



</td>
<td>

<center>
<div id="nuevoreporte">

<script>
function realizaProceso(ci_estu){
        var parametros = {
                "ci_estu" : ci_estu
        };
        $.ajax({
                data:  parametros,
                url:   'mostrarporcedula.php',
                type:  'post',
                beforeSend: function () {
                        $("#resultado").html("Procesando, espere por favor...");
                },
                success:  function (response) {
                        $("#resultado").html(response);
                }
        });
}
</script>
<table>
  <tr>
    <td>
<div id="verpersonas" align="center">
<br><br>
<input type="text" name="caja_texto" id="valor1" placeholder='Cedula estudiante'> 
 
<input type="button" href="javascript:;" onclick="realizaProceso($('#valor1').val());return false;" value="Buscar" name="porcedula" >
 
<br/>
 
<span id="resultado"></span> 
</div>

  </div>


  <script type="text/javascript">

$("#nuevoreporte").hide();

$(document).ready(function(){
    $("#mostrar_nuevo_reporte").on( "click", function() {
      $('#nuevoreporte').show(); //muestro mediante id
     });
    $("#mostrar_nueva_canaima").on( "click", function() {
      $('#nuevoreporte').hide(); //oculto mediante id
    });
  });
  </script>
</td>
  <td>
    <form action="nuevoreporte.php" method="post">
      <input type="hidden" name="ci_prof" value="<?php echo $_SESSION["session_username"]; ?>">
      <br><br><br><br><br><br>
        <table align="center">
        <h3>Añadir nuevo reporte</h3><br><br>
          <tr>
            <td>Serial: </td><td><input type="text" name="serial_equipo"</td>
          </tr>
          <tr>
            <td>Nuevo estado de equipo: </td><td><select name="estado_equipo"><option value="OPERATIVA">OPERATIVA</option><option value="INOPERATIVA">INOPERATIVA</option></select></td>
          </tr>
           <tr>
            <td>Descripcion de reporte</td><td><textarea name="descipcion_reporte"></textarea></td>
          </tr>
           <tr>
            <td>Estado de reporte: </td><td><select name="estado_reporte"><option value="A">ACTIVO</option><option value="I">INACTIVO</option></select></td>
          </tr>
        </table>
        <input type="submit" name="enviar_reporte">
    </form>
  </td>
  </tr>
</table>
</td>
</tr>
</table>
</center>
</body>
</html>