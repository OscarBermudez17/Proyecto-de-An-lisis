<?php

include ('./Database.php');
require '../../Data/ClaseCon.php';





if (isset($_POST['nombre']) && !empty($_POST['nombre'])&&
    isset($_POST['cedula']) && !empty($_POST['cedula']))
{

        
    
//$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
//mysql_select_db($db,$con)or die ("Problemas al conectar la bd");


$nombre = $_POST['nombre'];
$primerAp=$_POST['primerAp'];
$segundoAp=$_POST['segundoAp'];
$telefono = $_POST['telefono'];
$telefono=intval(preg_replace('/[^0-9]+/', '', $telefono), 10);
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$cedula=$_POST['cedula'];
$cedula=intval(preg_replace('/[^0-9]+/', '', $cedula), 10);
               

$conClase= new ClaseCon();
$consulta="call actualizar_Cliente('$nombre','$primerAp','$segundoAp',$cedula,'$telefono','$correo','$direccion');";
$conClase->consulta($consulta);
//('Juan','cedula','87789001','juan@hotmail.com','200 mts sur del parque Guapiles');

/*mysql_query("call actualizar_Cliente('$nombre','$primerAp','$segundoAp',
$cedula,
'$telefono',
'$correo',
'$direccion');",$con);
//header('Location: confirmacion.php');*/
echo '<center>'; 
echo "Cliente modificado Exitosamente"; 
echo " <H2><a href='http://localhost:5000/DemoGrangaVillegas/Cliente/Forms/verClientes.php'>Aceptar </a> </H2>";
echo '</center>'; 
 }else{
     
     echo "Problemas al insertar datos"; 
     
 }

?>