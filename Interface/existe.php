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
				$valor=@$_GET['var'];
				echo "<p>$mensaje</p>";
			?>
			<div class="boton" id="Pagar"><span>Pagar Pension</span></div>
			<div class="boton" id="Matricula"><span>Nueva Matricula</span></div>
		</div>
		<div id="Paga">
			<h3>PAGAR</h3>
			<?php
				$valor=$_GET['var'];
				echo "<p>$valor</p>";
			?>
			<h4>Carrera:
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
					</h4></p>
			<button ty="Submit">ENVIAR</button>
		</div>
	</body>
</html>