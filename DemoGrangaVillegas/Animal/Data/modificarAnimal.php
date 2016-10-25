<?php

include ('./Conexion.php');

require ('../../Data/ClaseCon.php');




if (isset($_POST['nombre']) && !empty($_POST['nombre'])&&
    isset($_POST['raza']) && !empty($_POST['raza']))
{

        
    
//$con=mysql_connect($host,$user,$pass) or die ("problemas al conectar");
//mysql_select_db($db,$con)or die ("Problemas al conectar la bd");


    $nombre = $_POST['nombre'];
    $proposito = $_POST['proposito'];
    $ingreso=$_POST['fingreso'];
    $sexo=$_POST['sexo'];
    $raza=$_POST['raza'];
    $tipo=$_POST['tipoAnimal'];
    $id=$_POST['id'];
    
      $clasecon= new ClaseCon();
      $consulta="call actualizar_Animal('$ingreso','$sexo','$tipo','$id','$proposito','$nombre','$raza');";
      
      $resultado=$clasecon->consulta($consulta);

//('Juan','cedula','87789001','juan@hotmail.com','200 mts sur del parque Guapiles');
//actualizar_Animal`(fechaIngresoA ,sexoA ,tipoA,codgioA,propositoA ,nombreIdentificadorA ,razaA)
//'06-04-2016',0,5,'Landar','Porcino','Produccion','C003-Verde');
//mysql_query("call actualizar_Animal('$ingreso','$sexo','$tipo','$id','$proposito','$nombre','$raza');",$con);
//header('Location: BuscarAnimal.php');
 echo 'Animal Atualizado exitosamente  ';
  echo "<a href='http://localhost:5000/DemoGrangaVillegas/Animal/Forms/BuscarAnimal.php'>Aceptar </a>";
 }else{
     
     echo "Problemas al actualizar";
 }

?>