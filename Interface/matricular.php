<?php
//conexion con la Base de datos(Servidor,usuario,password)
@$link = mysql_connect("localhost","root","");

//nombre de la base de datos,$enlace

@mysql_select_db("pensionesmatriculas",$link);

//capturando datos

@$PagoMatricula = 100;

@$idsede=$_REQUEST['NomCiudad'];
@$idcar=$_REQUEST['NomCarrera'];
@$idturno=$_REQUEST['Horarios'];


@$DNI=$_REQUEST['DNI'];

@$monto=$_REQUEST['Monto'];


//Ingresar NomCiudad en sede
@$sql1 = "INSERT INTO carrera(`idCarrera`, `Nombre`, `Duracion`) 
VALUES ('$idcar','$v2','')";

@$sql2 = "INSERT INTO sede(`idSede`, `Departamento`, `Ciudad`, `Direccion`, `Telefono`)
VALUES('$idsede', '', '$v1', '', '')";

@$sql3 = "INSERT INTO turno(`idTurno`, `Dias`, `Horario`) 
VALUES ('$idturno','','$v6')";


//FALTA EN EL HTML ALGO COMO PARA PREGUNTAR SI EL ALUMNO TIENE DESCUENTO Y COLOQUE EL IDDESOLICITUDDE DESCUENTO PARA LA TABLA DE PAGO Y CON ESO SE INGRESA NORMAL

mysql_query($sql1);
mysql_query($sql2);
mysql_query($sql3);

$m = mysql_query("SELECT MAX(idMatriculas) AS max_page FROM matriculas");
$row = mysql_fetch_array($m);
$idmatri = $row["max_page"]+1;

//Obtengo el id de estudiante con el dni
$result = mysql_query("SELECT `idEstudiantes` FROM `estudiantes` WHERE `DNI` = '$DNI' ");
$row = mysql_fetch_array($result);
$idest = $row[0];


$boleano = False;
$temp = mysql_query("SELECT `idPagos`,`TipoDePago` FROM `pagos` WHERE `idEstudiante` = '$idest' ");

 while ($row = mysql_fetch_array($temp))
 {
	$idpago = $row[0];
	$tipodepago = $row[1];
	//verifico que ha pagado matricula
	if($tipodepago == "Matricula")
	{
	    $boleano = True;
		break;
	}
				
}

	
if($boleano == True )
{
	$sql4 = "INSERT INTO `matriculas`(`idMatriculas`, `Estudiantes_idEstudiantes`, `Sede_idSede`, `Carrera_idCarrera`, `Turno_idTurno`, `FechaMatricula`, `Pago_idPago`)
	VALUES ('$idmatri','$idest','$idsede','$idcar','$idturno','','$idpago')";	
	mysql_query($sql4);
	echo "<script>alert('USTED SE MATRICULO CORRECTAMENTE');</script>";
}
else
{
    echo "<script>alert('NO TIENE NINGUN MONTO DE PAGO MATRICULO PRIMERO PAGUE PARA MATRICULARSE');</script>";
}
	
	
	
?>