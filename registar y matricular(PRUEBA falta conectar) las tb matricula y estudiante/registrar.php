<?php
//conexion con la Base de datos(Servidor,usuario,password)
@$link = mysql_connect("localhost","root","");

//nombre de la base de datos,$enlace

@mysql_select_db("pensionesmatriculas",$link);

//capturando datos

@$v1=$_REQUEST['NomCiudad'];//Sede
@$v2=$_REQUEST['NomCarrera'];//Carrera

@$v6=$_REQUEST['Horarios'];//Turno
@$v7=$_REQUEST['NombreDeBanco'];//bancos

@$idest=$_REQUEST['Codigo'];
@$idpago=$_REQUEST['CodigoPago'];

$m = mysql_query("SELECT MAX(idSede) AS max_page FROM sede");
$row = mysql_fetch_array($m);
$idsede = $row["max_page"]+1;

$m = mysql_query("SELECT MAX(idCarrera) AS max_page FROM carrera");
$row = mysql_fetch_array($m);
$idcar = $row["max_page"]+1;

$m = mysql_query("SELECT MAX(idTurno) AS max_page FROM turno");
$row = mysql_fetch_array($m);
$idturno = $row["max_page"]+1;

$m = mysql_query("SELECT MAX(idBancos) AS max_page FROM bancos");
$row = mysql_fetch_array($m);
$idbanco = $row["max_page"]+1;

$m = mysql_query("SELECT MAX(idMatriculas) AS max_page FROM matriculas");
$row = mysql_fetch_array($m);
$idmatri = $row["max_page"]+1;

//Ingresar NomCiudad en sede
$sql1 = "INSERT INTO carrera(`idCarrera`, `Nombre`, `Duracion`) VALUES ('$idcar','$v2','')";

$sql2 = "INSERT INTO sede(`idSede`, `Departamento`, `Ciudad`, `Direccion`, `Telefono`)VALUES('$idsede', '', '$v1', '', '')";

$sql3 = "INSERT INTO turno(`idTurno`, `Dias`, `Horario`) VALUES ('$idturno','','$v6')";

$sql4 = "INSERT INTO bancos(`idBancos`, `NombredeBanco`, `NumeroCuenta`) VALUES ('$idbanco','$v7','')";



mysql_query($sql1);
mysql_query($sql2);
mysql_query($sql3);
mysql_query($sql4);

//FALTA LA FECHA EN EL HTML
//NO FUNCIONA PARECE QUE AQUI NO SE LLENA SI NO EN EL PHPADMIN UNA VEZ LLENADOS
$sql5 = "INSERT INTO `matriculas`(`idMatriculas`, `Estudiantes_idEstudiantes`, `Sede_idSede`, `Carrera_idCarrera`, `Turno_idTurno`, `Pagos_idPagos`, `Bancos_idBancos`, `FechaMatricula`) VALUES ('10','10','19','10','10','30','19','10')";
mysql_query($sql5);	

?>