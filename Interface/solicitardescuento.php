<html>
<form action="solicitardescuento.php" method="GET">
		<div>
			<h4>DNI DEL ALUMNO:
			<input type="text" name="Dni"></h4><p>
			
			<h4>DNI PERSONAL AUTORIZADO:
			<input type="text" name="DniPersonal"></h4><p>
			
			<h4>MOTIVO:
			<select type="text" name="Motivo">
				<option value="-----">- - - - -
				<option value="Enfermedad">Enfermedad
				<option value="Razon Economica">Razon Economica
				<option value="Meritos">Meritos
			</select></h4><p>
			
			<h4>TIPO DE DESCUENTO:
			<select type="text" name="TipodeDescuento">
				<option value="-----">- - - - -
				<option value="0.8">20%deDescuento
				<option value="0.5">50%deDescuento
			</select></h4><p>
			
			<button ty="Submit">ENVIAR</button>
		</div>
	</form>
</html>



<?php

@$link = mysql_connect("localhost","root","");
@mysql_select_db("pensionesmatriculas",$link);


@$v1=$_REQUEST['Dni'];
@$v2=$_REQUEST['DniPersonal'];
@$v3=$_REQUEST['Motivo'];
@$v4=$_REQUEST['TipodeDescuento'];


$result = mysql_query("SELECT `idEstudiantes` FROM `estudiantes` WHERE `DNI` = '$v1' ");
$row = mysql_fetch_array($result);
$idest = $row[0];


$result = mysql_query("SELECT `idPersonal` FROM `personal` WHERE `DNI` = '$v2' ");
$row = mysql_fetch_array($result);
$idperso = $row[0];

$m = mysql_query("SELECT MAX(idRegistroSolicitudes) AS max_page FROM registrosolicitudesdescuentos");
$row = mysql_fetch_array($m);
$idsoli = $row["max_page"]+1;

$sql1 = "INSERT INTO `registrosolicitudesdescuentos`(`idRegistroSolicitudes`, `Personal_idPersonal`, `Estudiantes_idEstudiantes`, `Fecha`, `Motivo`, `Descuento`)
 VALUES ('$idsoli','$idperso','$idest','','$v3','$v4')";

mysql_query($sql1);


?>
