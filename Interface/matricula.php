<?php

//conexion con la Base de datos(Servidor,usuario,password)
@$link = mysql_connect("localhost","root","");

//nombre de la base de datos,$enlace

@mysql_select_db("pensionesmatriculas",$link);


@$v1=$_REQUEST['ApellidoPaterno'];
@$v2=$_REQUEST['ApellidoMaterno'];
@$v3=$_REQUEST['Nombres'];
@$v4=$_REQUEST['FechaDeNacimiento'];
@$v5=$_REQUEST['EstadoCivil'];
@$v6=$_REQUEST['Telefono'];
@$v7=$_REQUEST['Email'];
@$v8=$_REQUEST['DirecciondeDepartamento'];
@$v9=$_REQUEST['Distrito'];
@$v10=$_REQUEST['Manzana'];
@$v11=$_REQUEST['Lote'];
@$v12=$_REQUEST['Numero'];
@$v13=$_REQUEST['NombredeApoderado'];
@$v14=$_REQUEST['DNI'];

$m = mysql_query("SELECT MAX(idDireccion) AS max_page FROM direccion");
$row = mysql_fetch_array($m);
$iddirec = $row["max_page"]+1;

$m = mysql_query("SELECT MAX(idLugarNacimiento) AS max_page FROM lugarnacimiento");
$row = mysql_fetch_array($m);
$idnaci = $row["max_page"]+1;

$m = mysql_query("SELECT MAX(idEstudiantes) AS max_page FROM estudiantes");
$row = mysql_fetch_array($m);
$idest = $row["max_page"]+1;

$m = mysql_query("SELECT MAX(idApoderado) AS max_page FROM apoderados");
$row = mysql_fetch_array($m);
$idapo = $row["max_page"]+1;


$sql1 = "INSERT INTO `direccion`(`idDireccion`, `Dreccion`, `Distrito`, `Numero`, `Departamento`, `Manzana`, `Lote`)
VALUES ('$iddirec','','$v9','$v12','$v8','$v10','$v11')";


$sql2 = "INSERT INTO lugarnacimiento(`idLugarNacimiento`, `Departamento`, `Provincia`, `Distrito`, `Fecha`) 
VALUES ('$idnaci','','','','$v4')";

$sql3 = "INSERT INTO apoderados(`idApoderado`, `Nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `Telefono`, `Celular`)
VALUES ('$idapo','$v13','','','','')";

$sql4 = "INSERT INTO estudiantes(`idEstudiantes`,`Direccion_idDireccion`,`LugarNacimiento_idLugarNacimiento`,`Apoderados_idApoderado`,`Nombres`,`ApellidoPaterno`,`Apellido Materno`,`DNI`,`Email`,`Telefono`,`Celular`,`Grupo_Sang`,`EstadoCivil`,`Foto`)
VALUES('$idest','$iddirec','$idnaci','$idapo','$v3','$v1','$v2','$v14','$v7','$v6','','','$v5','')";

mysql_query($sql1);
mysql_query($sql2);
mysql_query($sql3);
mysql_query($sql4);

//echo '<script>alert("El alumno fue registrado correctamente")</script>';
header('Location:FormularioMatriculas.html');
?>


