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
				$mensaje=$_GET['mensaje']; //variable pasada desde busqueda.php
				echo "<p>$mensaje</p>";
			?>
			<div class="boton" id="Pagar"><span>Pagar Pension</span></div>
			<div class="boton" id="Matricula"><span>Nueva Matricula</span></div>
		</div>
		<div id="Paga">
			<h3>PAGAR</h3>
			<!-- ************************************************************** -->
			<!-- ********AQUI IRA EL FORMULARIO DE PAGA DE PENSION************* -->
			<!-- ************************************************************** -->
		</div>
	</body>
</html>