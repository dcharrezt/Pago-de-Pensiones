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
				<option value="-----">- - - - -
				<option value="Matricula">Matricula
				<option value="Constancia">Constancia
				<option value="Pension">Pensiones
			</select></h4><p>
			
			<h4>MONTO:
			<input type="text" name="Monto"></h4><p>			
			
			<!--<h4>Carrera:
						<select>
							<option value="-----">- - - - -
							<option value="ComputerScience">Ciencia de la computacion
							<option value="Medicina">Medicina
							<option value="Civil">Civil
						</select>
			</h4></p>
			<h4>Mes a pagar:
						<select>
							<option value="-----">- - - - -
							<option value="enero">Enero
							<option value="febrero">Febrero
							<option value="marzo">Marzo
							<option value="abrir">Abrir
							<option value="mayo">Mayo
							<option value="junio">Junio
							<option value="julio">Julio
							<option value="agosto">Agosto
							<option value="setiembre">Setiembre
							<option value="octubre">Octubre
							<option value="noviembre">Noviembre
							<option value="diciembre">Diciembre
						</select>
					</h4></p>-->
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

$m = mysql_query("SELECT MAX(idPagos) AS max_page FROM pagos");
$row = mysql_fetch_array($m);
$idpago = $row["max_page"]+1;


//esto es para obtener el id de solicitud de descuento pero no me funciona el select 

$result = mysql_query("SELECT `idEstudiantes` FROM `estudiantes` WHERE `DNI` = '$v1' ");
$row = mysql_fetch_array($result);
$idest = $row[0];
//Obtengo el ID al cual le pertenece el DNI


//Con ese DNI busco si es que tiene un descuento
$result = mysql_query("SELECT `idRegistroSolicitudes` FROM `registrosolicitudesdescuentos`
WHERE `Estudiantes_idEstudiantes` = '$idest' ");
$row = mysql_fetch_array($result);
$id_descuento = $row[0];




//FALTARIA UN IF PARA VER SI TIENE O NO DESCUENTO Y PARA INGRESARLO EN NULL SERIA ASI 

$sql1 = "INSERT INTO `pagos`(`idPagos`, `idBancos`,`TipoDePago`, `Monto`) 
VALUES ('$idpago',$v2,'$v3','$v4')";


//PARA PONERLO SIN NULL PRIMERO TIENES QUE LLENAR DIRECCION PERSONAL TIPODESOLICITUD Y RECION LO DESCOMENTAS 
//Y COMENTAS EL DE ARRIBA
//$sql1 = "INSERT INTO `pagos`(`idPagos`, `idBancos`,`RegistroSolicitudesDescuentos_idRegistroSolicitudes`,`TipoDePago`, `Monto`) 
//VALUES ('$idpago',$v2,'$id_descuento','$v3','$v4')";



mysql_query($sql1);

 //Faltaria comprobar si el monto ingresado es igual al monto con descuento y decirle que falta o sobra plata

 echo "<script>alert('OK HAS PAGADO TU CODIGODEPAGO ES: ".$idpago." LO NECESITARAS PARA MATRICULARTE');</script>";


?>

