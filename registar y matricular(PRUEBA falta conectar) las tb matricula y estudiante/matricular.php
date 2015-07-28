<?php

//conexion con la Base de datos(Servidor,usuario,password)
@$link = mysql_connect("localhost","root","");

//nombre de la base de datos,$enlace

@mysql_select_db("pensionesmatriculas",$link);


//capturando datos
@$v1=$_REQUEST['NomCiudad'];//sede
@$v2=$_REQUEST['Carrera'];//carrera
@$v3=$_REQUEST['Horario'];//turno
@$v4=$_REQUEST['ApellidoPaterno'];//alumno
@$v5=$_REQUEST['ApellidoMaterno'];//alumno
@$v6=$_REQUEST['Nombres'];//alumno
@$v7=$_REQUEST['FechaDeNacimiento'];//lugarnacimiento
@$v8=$_REQUEST['TipoSangre'];//;alumno
@$v9=$_REQUEST['DocumentoCivil'];//FALTA DNI
@$v10=$_REQUEST['NumeroDeDocumento'];//FALTA DNI
@$v11=$_REQUEST['EstadoCivil'];//alumno
@$v12=$_REQUEST['DepartamentoNacimiento'];//lugarnacimiento
@$v13=$_REQUEST['ProvinciaNacimiento'];//lugarnacimiento
@$v14=$_REQUEST['DistritoNacimiento'];//lugarnacimiento
@$v15=$_REQUEST['Telefono'];//alumno
@$v16=$_REQUEST['Direccion'];//DIRECCION
@$v17=$_REQUEST['Email'];//alumno
@$v18=$_REQUEST['DireccionExacta'];//OTRO
@$v19=$_REQUEST['DireccionLugar'];//Direccion
@$v20=$_REQUEST['DireccionAsociacion'];//OTRO
@$v21=$_REQUEST['DistritoDireccion'];//Direccion
@$v22=$_REQUEST['DireccionNumero'];//DIRECCION
@$v23=$_REQUEST['DireccionManzana'];//Direccion
@$v24=$_REQUEST['DireccionLote'];//DIRECCION
@$v25=$_REQUEST['ApellidoPaternoEmergencia'];//APODERADOS
@$v26=$_REQUEST['ApellidoMaternoEmergencia'];//APODERADOS
@$v27=$_REQUEST['NombresEmergencia'];//APODERADOS
@$v28=$_REQUEST['TelefonoEmergencia'];//APODERADOS
@$v29=$_REQUEST['NumeroDeDocumento'];//DNI EN ESTUDIANTE



$m = mysql_query("SELECT MAX(idMatriculas) AS max_page FROM matriculas");
$row = mysql_fetch_array($m);
$idmatri = $row["max_page"]+1;

$m = mysql_query("SELECT MAX(idEstudiantes) AS max_page FROM estudiantes");
$row = mysql_fetch_array($m);
$idest = $row["max_page"]+1;

$m = mysql_query("SELECT MAX(idSede) AS max_page FROM sede");
$row = mysql_fetch_array($m);
$idsede = $row["max_page"]+1;

$m = mysql_query("SELECT MAX(idCarrera) AS max_page FROM carrera");
$row = mysql_fetch_array($m);
$idcar = $row["max_page"]+1;

$m = mysql_query("SELECT MAX(idTurno) AS max_page FROM turno");
$row = mysql_fetch_array($m);
$idturno = $row["max_page"]+1;

$m = mysql_query("SELECT MAX(idPagos) AS max_page FROM pagos");
$row = mysql_fetch_array($m);
$idpago = $row["max_page"]+1;

$m = mysql_query("SELECT MAX(idBancos) AS max_page FROM bancos");
$row = mysql_fetch_array($m);
$idbanco = $row["max_page"]+1;

$m = mysql_query("SELECT MAX(idDireccion) AS max_page FROM direccion");
$row = mysql_fetch_array($m);
$iddirec = $row["max_page"]+1;

$m = mysql_query("SELECT MAX(idCentroTrabajo) AS max_page FROM centrotrabajo");
$row = mysql_fetch_array($m);
$idtrab = $row["max_page"]+1;

$m = mysql_query("SELECT MAX(idLugarNacimiento) AS max_page FROM lugarnacimiento");
$row = mysql_fetch_array($m);
$idnaci = $row["max_page"]+1;

$m = mysql_query("SELECT MAX(idApoderado) AS max_page FROM apoderados");
$row = mysql_fetch_array($m);
$idapo = $row["max_page"]+1;



$sql2 = "INSERT INTO carrera(`idCarrera`, `Nombre`, `Duracion`)
VALUES('$idcar','$v2','')";
$sql1 = "INSERT INTO sede(`idSede`, `Departamento`, `Ciudad`, `Direccion`, `Telefono`)
VALUES('$idsede', '', '$v1','','')";
$sql3 = "INSERT INTO turno(`idTurno`, `Dias`, `Horario`)VALUES('$idturno','','$v3')";
$sql5 = "INSERT INTO lugarnacimiento(`idLugarNacimiento`, `Departamento`, `Provincia`, `Distrito`, `Fecha`) 
VALUES ('$idnaci','$v12','$v13','$v14','$v7')";
$sql7 = "INSERT INTO apoderados(`idApoderado`, `Nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `Telefono`, `Celular`)
VALUES ('$idapo','$v27','$v25','$v26','$v28','')";
$sql6 = "INSERT INTO `direccion`(`idDireccion`, `Dreccion`, `Distrito`, `Numero`, `Departamento`, `Manzana`, `Lote`) 
VALUES ('$iddirec','$v18','$v21','$v22','v12','$v23','$v24')";


$sql4 = "INSERT INTO estudiantes(`idEstudiantes`,`Direccion_idDireccion`,`LugarNacimiento_idLugarNacimiento`,`Apoderados_idApoderado`,`Nombres`,`ApellidoPaterno`,`Apellido Materno`,`DNI`,`Email`,`Telefono`,`Celular`,`Grupo_Sang`,`EstadoCivil`,`Foto`)
VALUES('$idest','$iddirec','$idnaci','$idapo','$v6','$v4','$v5','$v29','$v17','$v15','','$v8','$v11','')";


mysql_query($sql1);
mysql_query($sql2);
mysql_query($sql3);
mysql_query($sql5);
mysql_query($sql6);
mysql_query($sql7);


mysql_query($sql4);

?>
