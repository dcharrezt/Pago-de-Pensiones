

<?php

@$link = mysql_connect("localhost","root","");
@mysql_select_db("pensionesmatriculas",$link);


@$v1=$_REQUEST['Dni'];
@$v2=$_REQUEST['IDCarreraOrigen'];
@$v3=$_REQUEST['IDCarreraDestino'];

//si esta matriculado en la carrera de Origen

$result = mysql_query("SELECT `idEstudiantes` FROM `estudiantes` WHERE `DNI` = '$v1' ");
$row = mysql_fetch_array($result);
$idest = $row[0];

$boleano =False;

$result = mysql_query("SELECT `Carrera_idCarrera` FROM `matriculas` WHERE `Estudiantes_idEstudiantes`= '$idest'");
while ($row = mysql_fetch_array($result)){
	if($row[0]==$v2)
	{
		$boleano = True;
		break;
	}
}


//HACER UN UPDATE
if($boleano==True)
{
	$sql1 = "UPDATE `matriculas` SET `Carrera_idCarrera` = '$v3'
	WHERE `Estudiantes_idEstudiantes`='$idest' and `Carrera_idCarrera` = '$v2'" ;
	mysql_query($sql1);
	echo "<script>alert('OK TU CARRERA CONCUERDA CON LA MATRICULADA YA SE HA HECHO EL TRASLADO');</script>";
	
}

else
{
	echo "<script>alert('TU NO ESTAS MATRICULADO EN ESA CARRERA POR LO TANTO NO PUEDES MATRICULARTE');</script>";
}

?>
