<html>

	<?php

	//conexion a la base de datos (servidor,usuario,password)
	$link=mysql_connect("localhost","root","");

	//(nombre de la base de datos, $enlace)
	mysql_select_db("pensionesmatriculas",$link);

	//capturando datos

	$idMatriculas = $_REQUEST['idmatricula'];

	//Eliminando en la base de datos

	$result = mysql_query("DELETE from matriculas where idmatriculas = '$idMatriculas'");

?>
</body>
</html>