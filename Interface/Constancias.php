<?php

$link = mysql_connect("localhost", "root","");
mysql_select_db("PensionesMatriculas",$link);

$v1 = @$_REQUEST['DNI'];

$result = mysql_query("SELECT * from Estudiantes where DNI like '".$v1."' ");
$carreras = mysql_query ( " SELECT * from (SELECT * from Estudiantes INNER JOIN Matriculas ON Estudiantes.idEstudiantes = Matriculas.Estudiantes_idEstudiantes 
                                                WHERE DNI like '".$v1."' ) as X INNER JOIN Carrera ON X.Carrera_idCarrera = Carrera.idCarrera  ");
$pagos = mysql_query (" SELECT * from (SELECT * from (SELECT idMatriculas from Estudiantes INNER JOIN Matriculas ON Estudiantes.idEstudiantes = Matriculas.Estudiantes_idEstudiantes      
                                             WHERE DNI like '".$v1."') as X INNER JOIN Pensiones ON X.idMatriculas = Pensiones.Matriculas_idMatriculas ) as Z INNER JOIN Pagos ON Z.Pagos_idPagos = Pagos.idPagos ");
                                       
$nombres = mysql_fetch_array($result);

$numeroCarreras = mysql_num_rows($carreras);
$numeroPagos = mysql_num_rows($pagos);

                /*DARLE FORMATO*/
echo '      '.$nombres["ApellidoPaterno"].'	
                '.$nombres["Apellido Materno"].'
                '.$nombres["Nombres"].' 
                ';
                
if ( $numeroCarreras == 0)
{
        echo "EL DNI INGRESADO NO TIENE CARRERAS !";
}
else
{
        for ($i=0; $i<$numeroCarreras; $i++)
        {
                $infoCarreras = mysql_fetch_array($carreras);
                echo ''.$infoCarreras["Nombre"].'';
                for($j=0; $j<$numeroPagos; $j++)
                {
                        $infoPagos = mysql_fetch_array($pagos);
                        echo '  '.$infoPagos["Mes"].'
                                     '.$infoPagos["Monto"].'        ';
                }
        }
}

?>
