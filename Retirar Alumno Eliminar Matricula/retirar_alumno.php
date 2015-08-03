<html>

	<?php

	//conexion a la base de datos (servidor,usuario,password)
	$link=mysql_connect("localhost","root","");

	//(nombre de la base de datos, $enlace)
	mysql_select_db("pensionesmatriculas",$link);

	//capturando datos

	$idEstudiante = $_REQUEST['idestudiante'];

	$Direccion = mysql_query("SELECT direccion_iddireccion FROM estudiantes WHERE idestudiantes = '$idEstudiante'");
	$lineaidDireccion = mysql_fetch_array($Direccion);
	$idDireccion = $lineaidDireccion['direccion_iddireccion'];

	$CentroTrabajo = mysql_query("SELECT CentroTrabajo_idCentroTrabajo FROM estudiantes WHERE idestudiantes = '$idEstudiante'");
	$lineaCentroTrabajo = mysql_fetch_array($CentroTrabajo);
	$idCentroTrabajo = $lineaCentroTrabajo['CentroTrabajo_idCentroTrabajo'];

	$LugarNacimiento = mysql_query("SELECT LugarNacimiento_idLugarNacimiento FROM estudiantes WHERE idestudiantes = '$idEstudiante'");
	$lineaLugarNacimiento = mysql_fetch_array($LugarNacimiento);
	$idLugarNacimiento = $lineaLugarNacimiento['LugarNacimiento_idLugarNacimiento'];

	$Apoderados = mysql_query("SELECT Apoderados_idApoderado FROM estudiantes WHERE idestudiantes = '$idEstudiante'");
	$lineaApoderados = mysql_fetch_array($Apoderados);
	$idApoderado = $lineaApoderados['Apoderados_idApoderado'];

 	//Eliminando en la base de datos

	$result = mysql_query("DELETE from estudiantes where idestudiantes = '$idEstudiante'");

	$result = mysql_query("DELETE from direccion where idDireccion = '$idDireccion'");

	$result = mysql_query("DELETE from centrotrabajo where idCentroTrabajo = '$idCentroTrabajo'");

	$result = mysql_query("DELETE from lugarnacimiento where idLugarNacimiento = '$idLugarNacimiento'");

	$result = mysql_query("DELETE from apoderados where idApoderado = '$idApoderado'");
?>
</body>
</html>
