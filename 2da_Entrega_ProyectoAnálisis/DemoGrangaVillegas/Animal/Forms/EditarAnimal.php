<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar animal</title>
        
        <meta name="description" content="">
        <meta name="viewport" content="width=divice-width, user-scalable=no, initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0"/>
        <script src="prefix.js"></script>
        <link rel="stylesheet" href="../../css/estilos.css">
    </head>
    <body>
      
            <div class="contenedor">
            <?php include '../../Interfaz/header.php'; ?>    
            
            <section class="main">
                 <div class="formulario">
                
             <center>
        <?php

            include('../Data/Conexion.php');
            include ('../Dominio/Animal.php');
     
            if (isset($_GET['id']) && !empty($_GET['id'])){
 
               
                $id=$_GET['id'];
               
                   echo 'ID --> '.$id; 
                $con=mysql_connect($host,$user,$pass) or die ("problemas al conectar");
                mysql_select_db($db,$con)or die ("Problemas al conectar la bd");

             
                $selectAnimales="select * from animal where codigo ='$id';";
  
                $resultadoAnimales= mysql_query($selectAnimales,$con); 
   
                $listaAnimales = array();
                $x=0;
              
           while($animal=mysql_fetch_array($resultadoAnimales)){
  
                if ($animal !=NULL) {
                 $nuevoAnimal = new Animal($animal['nombreIdentificador'],$animal['fechaIngreso'],$animal['codigo'],$animal['tipo'],$animal['proposito'],$animal['sexo'],$animal['raza']);
                    $listaAnimales[$x]=$nuevoAnimal;
      

?>

        
        <div align="center">
        
            <form method="POST" action="../Data/modificarAnimal.php">
            
            <br><h3>Formulario actualización de animal</h3><br>
            
            Nombre identificador<br><input type="text" name="nombre"  value="<?php echo $listaAnimales[$x]->getNombreIdentificador() ?>" id="nombre" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,20}" placeholder="Nombre, Solo recibe letras" required /><br>
            Fecha de ingreso<br><input type="date" name="fingreso" value="<?php echo $listaAnimales[$x]->getFechaIngreso() ?>" readonly/><br>
            Sexo<br><input type="text" name="sexo"  value="<?php echo $listaAnimales[$x]->getSexo()?>" readonly/><br>
            Raza<br><input type="text" name="raza" value="<?php echo $listaAnimales[$x]->getRaza() ?>" id="raza" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,20}" placeholder="Raza, Solo recibe letras" required/><br>
            Propósito del animal<br><input type="text" name="proposito" value="<?php echo $listaAnimales[$x]->getProposito() ?>" id="proposito" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,17}" placeholder="Raza, Solo recibe letras" required/><br><br>
            Tipo de animal<br><input type="text" name="tipoAnimal" value="<?php echo $listaAnimales[$x]->getTipoAnimal() ?>" readonly/><br><br>
            Identificador<br><input type="text" name="id"  value="<?php echo $listaAnimales[$x]->getIdAnimal() ?>" readonly/><br><br>
                
            <input type="submit" name="insertar" value="Editar Animal" title="Actualizar"/>
        </form>   
            </div>
        <?php
   
    }else{
        echo "Problemas al obtener datos"; 
     
         }
     }
  }
     ?>
             </center>
                 </div>
           </section>
 
            <?php include '../../Interfaz/aside.php'; ?>
            <?php include '../../Interfaz/footer.php'; ?>
	</div>   
    </body>
</html>
