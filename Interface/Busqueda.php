<?php
	$mensaje = "Luis"; //ejemplo de como pasar las variables de php a php
	$valor= 500; //esta variable guardara el pago que debe de hacer el alumno para q se autogenere despues
	header("Location:existe.php?mensaje=".$mensaje."&var=".$valor);
?>