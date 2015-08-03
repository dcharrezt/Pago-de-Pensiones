<?php

$link = mysql_connect("localhost", "root","");
mysql_select_db("pensionesmatriculas",$link);

$v1 = @$_REQUEST['DNI'];

$result = mysql_query("SELECT * from estudiantes where DNI like '".$v1."' ");
$carreras = mysql_query ( " SELECT * from (SELECT * from estudiantes INNER JOIN matriculas ON estudiantes.idEstudiantes = matriculas.Estudiantes_idEstudiantes 
                                                WHERE DNI like '".$v1."' ) as X INNER JOIN carrera ON X.Carrera_idCarrera = carrera.idCarrera  ");
$pagos = mysql_query (" SELECT * from (SELECT * from (SELECT idMatriculas from estudiantes INNER JOIN matriculas ON estudiantes.idEstudiantes = 
                                                matriculas.Estudiantes_idEstudiantes WHERE DNI like '".$v1."') as X INNER JOIN pensiones ON X.idMatriculas = pensiones.Matriculas_idMatriculas ) 
                                                as Z INNER JOIN pagos ON Z.Pagos_idPagos = pagos.idPagos ");
                                       
$nombres = mysql_fetch_array($result);
$numeroCarreras = mysql_num_rows($carreras);
$numeroPagos = mysql_num_rows($pagos);
                
if ( $numeroCarreras == 0)
{
        echo "EL DNI INGRESADO NO TIENE CARRERAS !";
}
else
{                     /*DARLE FORMATO*/
        echo '      '.$nombres["ApellidoPaterno"].'	
                        '.$nombres["Apellido Materno"].'
                        '.$nombres["Nombres"].' 
                        ';
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
