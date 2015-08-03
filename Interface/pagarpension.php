<?php

@$link = mysql_connect("localhost","root","");
@mysql_select_db("pensionesmatriculas",$link);

@$v1=$_REQUEST['Dni'];
@$v2=$_REQUEST['CodigodeBanco'];
@$v3=$_REQUEST['IDCarrera'];
@$v4=$_REQUEST['Monto'];
@$v5=$_REQUEST['Mes'];

@$PagoPension = 500;

$m = mysql_query("SELECT MAX(idPagos) AS max_page FROM pagos");
$row = mysql_fetch_array($m);
$idpago = $row["max_page"]+1;

$m = mysql_query("SELECT MAX(idPensiones) AS max_page FROM pensiones");
$row = mysql_fetch_array($m);
$idpension = $row["max_page"]+1;

//Obtengo el ID al cual le pertenece el DNI
$result = mysql_query("SELECT `idEstudiantes` FROM `estudiantes` WHERE `DNI` = '$v1' ");
$row = mysql_fetch_array($result);
$idest = $row[0];
if($idest == 0)
{
	echo "<script>alert('NO ESTAS REGISTRADO CON ESE DNI TIENES QUE REGISTRARTE');</script>";
}

else
{

//SACAR EL IDMATRICULA CON EL ID Estudiantes_idEstudiantes y IDMATRICULA
$result = mysql_query("SELECT `idMatriculas` FROM `matriculas` 
WHERE `Estudiantes_idEstudiantes` = '$idest' and `Carrera_idCarrera` = '$v3' ");

$row = mysql_fetch_array($result);
$idmatri = $row[0];

if($idmatri==0)
{
	echo "<script>alert('LA CARRERA NO COINCIDE CON LA CARRERA MATRICULADA');</script>";
}

else
{


//Faltaria verificar si la carrera seleccionada es la misma


$cantidad_estudiantes = mysql_query("SELECT COUNT(Estudiantes_idEstudiantes) AS veces FROM matriculas 
								WHERE `Estudiantes_idEstudiantes` = '$idest'");
				
$row = mysql_fetch_array($cantidad_estudiantes);
$veces = $row[0];



//Con ese DNI busco si es que tiene un descuento
$result = mysql_query("SELECT `idRegistroSolicitudes` FROM `registrosolicitudesdescuentos`
WHERE `Estudiantes_idEstudiantes` = '$idest' ");
$row = mysql_fetch_array($result);
$id_descuento = $row[0];


if ($id_descuento != 0 )
{

//tienes un descuento en pension si o si alcualizo el monto
  $result = mysql_query("SELECT `Descuento` FROM `registrosolicitudesdescuentos` 
  WHERE `idRegistroSolicitudes`= '$id_descuento' ");
  $row = mysql_fetch_array($result);
  $descuento = $row[0];
  @$temp_pago;
  $pensiondescontada = $PagoPension*$descuento;
  //AQUI ACTUALIZAR SI TIENE SOLICITUD DE DESCUENTO Y TIENE MAS DE 2 MATRICULAS POR CARRERA
  
  if($veces >= 2)
  {
	$pensiondescontada = $pensiondescontada - 20;
	echo "<script>alert('USTED TIENE 20 SOLES DE DESCUENTO POR LLEVAR MAS DE 2 CARRERAS');</script>";
  }
  
  //UNA COMPROBACION SI EL MONTO INGRESADO CORRESPONDE CON EL MONTO CON DESCUENTO
  if($v4 == $pensiondescontada )
  {
	 $sql1 = "INSERT INTO `pagos`(`idPagos`, `idEstudiante`, `idBancos`, `RegistroSolicitudesDescuentos_idRegistroSolicitudes`, `TipoDePago`, `Monto`) 
     VALUES ('$idpago','$idest','$v2','$id_descuento','Pension','$pensiondescontada')";
	 echo "<script>alert('EL PAGO SE REALIZO CORRECTAMENTE');</script>";
  }
  else
  {
	echo "<script>alert('EL PAGO DE ".$v4." soles NO CONCUERDA CON SU PAGO DESCONTADO:".$pensiondescontada."');</script>";
  }  
}

else
{
	if($veces >= 2)
	{
	    $PagoPension = $PagoPension - 20;
	    echo "<script>alert('USTED TIENE 20 SOLES DE DESCUENTO POR LLEVAR MAS DE 2 CARRERAS');</script>";
	}
	if($v4 == $PagoPension )
	{
	    $sql1 = "INSERT INTO `pagos`(`idPagos`,`idEstudiante`, `idBancos`,`TipoDePago`, `Monto`) 
		VALUES ('$idpago','$idest',$v2,'Pension','$PagoPension')";
		echo "<script>alert('EL PAGO SE REALIZO CORRECTAMENTE');</script>";
	}
	else
	{
		echo "<script>alert('EL PAGO DE ".$v4." soles NO CONCUERDA CON EL ESTIPULADO:".$PagoPension."');</script>";
	}
	
	
}

@mysql_query($sql1);
$sql2 = "INSERT INTO `pensiones`(`idPensiones`, `idCarrera`, `Matriculas_idMatriculas`, `Pagos_idPagos`, `Mes`)
 VALUES ('$idpension','$v3','$idmatri','$idpago','$v5')";

@mysql_query($sql2);

// echo "<script>alert('OK HAS PAGADO TU CODIGODEPAGO ES: ".$idpago." LO NECESITARAS PARA MATRICULARTE');</script>";
}
}
?>
			
			