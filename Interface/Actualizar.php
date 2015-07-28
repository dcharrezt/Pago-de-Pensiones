<?php

$link = mysql_connect("localhost", "root","");
mysql_select_db("PensionesMatriculas",$link);

$v1 = @$_REQUEST['DNI'];

$result = mysql_query("select * from Estudiantes where DNI like '".$v1."' ");
$nacimiento = mysql_query("select * from Estudiantes INNER JOIN LugarNacimiento ON Estudiantes.LugarNacimiento_idLugarNacimiento = LugarNacimiento.idLugarNacimiento
                                                where DNI like '".$v1."' ");
$direccion = mysql_query("select * from Estudiantes INNER JOIN Direccion ON Estudiantes.Direccion_idDireccion = Direccion.idDireccion
                                                where DNI like '".$v1."' ");
                                               
$row = mysql_fetch_array($result);
$rowNacimiento = mysql_fetch_array($nacimiento);
$rowDireccion = mysql_fetch_array($direccion);

$numero=mysql_num_rows($result);
if  ($numero==0)
{
	echo "My first PHP script!";
}
else{

echo '<!DOCTYPE html>

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
						<input type="text" name="ApellidoPaterno" placeholder="Apellido Paterno" value =  "'.$row["ApellidoPaterno"].'">	
					Apellido Materno:
						<input type="text" name="ApellidoMaterno" placeholder="Apellido Materno" value = "'.$row["Apellido Materno"].'">
					</h4></p
					
					<h4>Nombres:
						<input type="text" name="Nombres" placeholder="Nombres" value = "'.$row["Nombres"].'">
					Fecha de Nacimiento
						<input type="Date" name="FechaDeNacimiento">
					</h4></p>
					
					<h4>Grupo Sanguineo:
						<select>
						        <option select = "selected"> '.$row["Grupo_Sang"].' </option>
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
						<input type="text" name="DepartamentoNacimiento" placeholder="Departamento" value = "'.$rowNacimiento["Departamento"].'">
					Provincia:
						<input type="text" name="ProvinciaNacimiento" placeholder="Provincia" value = "'.$rowNacimiento["Provincia"].'">
					</p>Distrito:
						<input type="text" name="DistritoNacimiento" placeholder="Distrito" value = "'.$rowNacimiento["Distrito"].'">
					</h4></p>
					
					<h3>Telefono:</h3>
					<h4>Fijo o Celular:
						<input type="text" name="Telefono" placeholder="Telefono" value = "'.$row["Telefono"].'">
					</h4></p>
					
					<h3>Dirección:</h3></p>
					<h4>
			
				
						</p>Distrito:
							<input type="text" name="DistritoDireccion" placeholder="Distrito" value = "'.$rowDireccion["Departamento"].'">
						Nº:
							<input type="text" name="DireccionNumero" placeholder="Nº" value = "'.$rowDireccion["Numero"].'">
						</p>Manzana:
							<input type="text" name="DireccionManzana" placeholder="Manzana" value = "'.$rowDireccion["Manzana"].'">
						Lote:
							<input type="text" name="DireccionLote" placeholder="Lote" value = "'.$rowDireccion["Lote"].'">
					</h4></p>
			</form>
		</div id="Formulario2">
		<div>
		
		</div>
	</body>
</html> ';
}

?>




