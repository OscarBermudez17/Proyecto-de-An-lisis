<?php

include('./Database.php');
require '../../Data/ClaseCon.php';
  
if(isset($_POST['nombre'])&& !empty($_POST['nombre'])
        && isset($_POST['primerAp'])&& !empty($_POST['primerAp'])
        &&isset($_POST['cedula'])&& !empty($_POST['cedula'])){
    
    
    $nombreC = $_POST['nombre'];
    $primerAp=$_POST['primerAp'];
    $segundoAp=$_POST['segundoAp'];
    $cedulaC = $_POST['cedula'];
    $cedulaC=intval(preg_replace('/[^0-9]+/', '', $cedulaC), 10);
    $telefonoC = $_POST['telefono'];
    $telefonoC=intval(preg_replace('/[^0-9]+/', '', $telefonoC), 10);
    $correoC = $_POST['correo'];
    $direccionC = $_POST['direccion'];
    try {
        $conClase = new ClaseCon();
        $consulta="call insertar_Cliente('".$nombreC."','".$primerAp."','".$segundoAp."','".$cedulaC."','".$telefonoC."','".$correoC."','".$direccionC."');";
   // $con=  mysql_connect($host,$user,$pw) or die ("problemas al conectar");;
    //mysql_select_db($db, $con) or die ("problemas al buscar BD");
    
    //mysql_query("call insertar_Cliente('".$nombreC."','".$primerAp."','".$segundoAp."','".$cedulaC."','".$telefonoC."','".$correoC."','".$direccionC."');");
        $conClase->consulta($consulta);
    }  catch (Exception $e){
        
        echo 'Error al insertar';
    }
    
    
  echo '<center>'; 
    echo 'El cliente se ha insertado correctamente';
 echo " <h2><a href='http://localhost:5000/DemoGrangaVillegas/Cliente/Forms/verClientes.php'>Aceptar </a> </h1>";
   // header("Location: index.php");
 echo '</center>'; 
}  else {
    echo 'El nombre o la cedula estan vacios';    
}

?>
