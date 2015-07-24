<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="estiloActualizar.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
	</head>
	
	<body background="fondo.jpg">
		<div id="Formulario1">
			<form class="ActualizarDatos">
					<h1>Actualizacion de datos</h1>
					<h4>Sede:
						<select>
							<option value="-----">- - - - -
							<option value="Arequipa">Arequipa
							<option value="Mollendo">Mollendo
							<option value="Camana">Camana
							<option value="Ilo">Ilo
							<option value="Moquegua">Moquegua
						</select>
					</h4></	>
					
					<h4>
					<label for="ApellidoPaterno">Apellido Paterno:</label>
						<input type="text" name="ApellidoPaterno" placeholder="Apellido Paterno">	
					Apellido Materno:
						<input type="text" name="ApellidoMaterno" placeholder="Apellido Materno">
					</h4></p>
					
					<h4>Nombres:
						<input type="text" name="Nombres" placeholder="Nombres">
					Fecha de Nacimiento
						<input type="Date" name="FechaDeNacimiento">
					</h4></p>
					
					<h4>Grupo Sanguineo:
						<select>
							<option value="-----">- - - - -
							<option value="APositivo">A Positivo
							<option value="ANegativo">A Negativo
							<option value="BPositivo">B Positivo
							<option value="BNegativo">B Negativo
							<option value="ABPositivo">AB Positivo
							<option value="ABNegativo">AB Negativo
							<option value="OPositivo">O Positivo
							<option value="ONegativo">O Negativo
						</select>
					</h4></p>
					<h3>Estado Civil:</h3><h4>
						<input type="radio" name="EstadoCivil" value="Soltero">Soltero(a)
						<input type="radio" name="EstadoCivil" value="Casado">Casado
					</h4></p>
					
					<h3>Lugar de Nacimiento:</h3></p>
					<h4>Departamento:
						<input type="text" name="DepartamentoNacimiento" placeholder="Departamento">
					Provincia:
						<input type="text" name="ProvinciaNacimiento" placeholder="Provincia">
					</p>Distrito:
						<input type="text" name="DistritoNacimiento" placeholder="Distrito">
					</h4></p>
					
					<h3>Telefono:</h3>
					<h4>Fijo o Celular:
						<input type="text" name="Telefono" placeholder="Telefono">
					</h4></p>
					
					<h3>Dirección:</h3></p>
					<h4>
						<input type="radio" name="Direccion" value="Av.">Av.
						<input type="radio" name="Direccion" value="Calle">Calle
						<input type="radio" name="Direccion" value="Jiron">Jiron
						<input type="radio" name="Direccion" value="Pasaje">Pasaje
						<input type="radio" name="Direccion" value="Otro">Otro
						<input type="text" name="DireccionExacta">
						</p>
							<input type="radio" name="DireccionLugar" value="Urbanizacion">Urbanización
							<input type="radio" name="DireccionLugar" value="PPJJ">PP.JJ
							<input type="radio" name="DireccionLugar" value="CHab">C.Hab.
							<input type="radio" name="DireccionLugar" value="Otro">Otro
							<input type="text" name="DireccionAsociacion">
						</p>Distrito:
							<input type="text" name="DistritoDireccion" placeholder="Distrito">
						Nº:
							<input type="text" name="DireccionNumero" placeholder="Nº">
						</p>Manzana:
							<input type="text" name="DireccionManzana" placeholder="Manzana">
						Lote:
							<input type="text" name="DireccionLote" placeholder="Lote">
					</h4></p>
			</form>
		</div id="Formulario2">
		<div>
		
		</div>
	</body>
</html>