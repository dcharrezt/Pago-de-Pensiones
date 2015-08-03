<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="estilos.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
		<script src="logic.js" language="javascript" type="text/javascript"></script>
	</head>
	
	<body background="fondo.jpg">
		<div id="mostrador">
			<h3>Nombre:</h3>
			<?php
			
				@$mensaje=$_GET['mensaje']; //variable pasada desde busqueda.php
				@$valor=@$_GET['var'];
				echo "<p>$mensaje</p>";
			?>
			
			<div class="boton" id="Pagar"><span>Pagar Pension</span></div>
			<div class="boton" id="Matricula"><span>Nueva Matricula</span></div>
		</div>
		
		<form action="existe.php" method="GET">
		<div id="Paga">
			<h3>REGISTRAR PAGO</h3>
			<?php
				@$valor=$_GET['var'];
				echo "<p>$valor</p>";
			?>
			
			
			<h4>DNI DEL ALUMNO:
			<input type="text" name="Dni"></h4><p>
			
			<h4>NOMBRE DEL BANCO:
			<select type="text" name="CodigodeBanco">
				<option value="-----">- - - - -
				<option value="1">Banco de la Nacion
				<option value="2">Banco Central del Peru
				<option value="3">Interbank
			</select></h4><p>

			<h4>TIPO DE PAGO:
			<select type="text" name="TipodePago">
				<option value="- - -">- - - - -
				<option value="Matricula">PagodeMatricula
				<option value="Constancia">PagodeConstancia
				<option value="Administrativo">PagoAdministrativo
				<option value="Solicitud">PagodeSolicitud
			</select></h4><p>
			
			<h4>INGRESE EL MONTO DEL BAUCHER:
			<input type="text" name="Monto"></h4><p>
			<button ty="Submit">ENVIAR</button>
		</div>
	</form>
	</body>
</html>


<?php

@$link = mysql_connect("localhost","root","");
@mysql_select_db("pensionesmatriculas",$link);

@$v1=$_REQUEST['Dni'];
@$v2=$_REQUEST['CodigodeBanco'];
@$v3=$_REQUEST['TipodePago'];
@$v4=$_REQUEST['Monto'];
@$PagoMatricula = 100;
@$PagoAdministrativo = 5;
@$PagoConstancia = 15;
@$PagoSolicitud = 10;



$m = mysql_query("SELECT MAX(idPagos) AS max_page FROM pagos");
$row = mysql_fetch_array($m);
$idpago = $row["max_page"]+1;

//Obtengo el ID al cual le pertenece el DNI
$result = mysql_query("SELECT `idEstudiantes` FROM `estudiantes` WHERE `DNI` = '$v1' ");
$row = mysql_fetch_array($result);
$idest = $row[0];


$cantidad_estudiantes = mysql_query("SELECT COUNT(Estudiantes_idEstudiantes) AS veces FROM matriculas 
								WHERE `Estudiantes_idEstudiantes` = '$idest'");
				
$row = mysql_fetch_array($cantidad_estudiantes);
$veces = $row[0];


if($idest == 0)
{
	echo "<script>alert('NO ESTAS REGISTRADO CON ESE DNI TIENES QUE REGISTRARTE');</script>";
}

else
{
	switch ($v3)
	{
	case "Matricula":
		if($v4 == $PagoMatricula )
		{
			$sql1 = "INSERT INTO `pagos`(`idPagos`,`idEstudiante`, `idBancos`,`TipoDePago`, `Monto`) 
			VALUES ('$idpago','$idest',$v2,'$v3','$PagoMatricula')";
			echo "<script>alert('EL PAGO SE REALIZO CORRECTAMENTE');</script>";
			break;
		}
		echo "<script>alert('EL PAGO DE ".$v4." soles NO CONCUERDA CON EL ESTIPULADO:".$PagoMatricula."');</script>";
		break;
        
    case "Constancia":
		if($v4 == $PagoConstancia )
		{
			$sql1 = "INSERT INTO `pagos`(`idPagos`,`idEstudiante`, `idBancos`,`TipoDePago`, `Monto`) 
			VALUES ('$idpago','$idest',$v2,'$v3','$PagoConstancia')";
			echo "<script>alert('EL PAGO SE REALIZO CORRECTAMENTE');</script>";
			break;
		}
		echo "<script>alert('EL PAGO DE ".$v4." soles NO CONCUERDA CON EL ESTIPULADO:".$PagoConstancia."');</script>";
		break;
        
	case "Solicitud":
		if($v4 == $PagoSolicitud )
		{
			$sql1 = "INSERT INTO `pagos`(`idPagos`,`idEstudiante`, `idBancos`,`TipoDePago`, `Monto`) 
			VALUES ('$idpago','$idest',$v2,'$v3','$PagoSolicitud')";
			echo "<script>alert('EL PAGO SE REALIZO CORRECTAMENTE');</script>";
			break;
		}
		echo "<script>alert('EL PAGO DE ".$v4." soles NO CONCUERDA CON EL ESTIPULADO:".$PagoSolicitud."');</script>";
		break;
        
	case "Administrativo":
		if($v4 == $PagoAdministrativo)
		{
			$sql1 = "INSERT INTO `pagos`(`idPagos`,`idEstudiante`, `idBancos`,`TipoDePago`, `Monto`) 
			VALUES ('$idpago','$idest',$v2,'$v3','$PagoAdministrativo')";
			echo "<script>alert('EL PAGO SE REALIZO CORRECTAMENTE');</script>";
			break;
		}
		echo "<script>alert('EL PAGO DE ".$v4." soles NO CONCUERDA CON EL ESTIPULADO:".$PagoAdministrativo."');</script>";
		break;

	}
	
}

@mysql_query($sql1);

// echo "<script>alert('OK HAS PAGADO TU CODIGODEPAGO ES: ".$idpago." LO NECESITARAS PARA MATRICULARTE');</script>";


?>




