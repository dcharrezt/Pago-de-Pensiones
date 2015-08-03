<?php
//conexion a la Base de datos (Servidor,usuario,password)
$link = mysql_connect("localhost", "root","");
//(nombre de la base de datos, $enlace)
mysql_select_db("PensionesMatriculas",$link);

$v1 = @$_REQUEST['username'];
$v2 = @$_REQUEST['password'];

$result = mysql_query("select * from Personal where DNI like '".$v1."' AND Password like '".$v2."' ");
$numero=mysql_num_rows($result);
if  ($numero==0)
{
	header("Location:login_0.html");
}
else{
	header("Location:FormularioMatriculas.html");
}

?>
