<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Buscar animal</title>
        
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
                 echo "<a href='http://localhost:5000/DemoGrangaVillegas/Animal/Forms/InsertarCerdo.php'>Agregar animal</a>";
                 ?>
                    <p id="titulo">Buscar animales</p><br>
        
        
        
                                   <?php
       
                                              include ("../Data/Conexion.php");
                                              include ("../Dominio/Animal.php");
                                              include ('../../Data/ClaseCon.php');

                                              $con=mysql_connect($host,$user,$pass) or die ("problemas al conectar");
                                              mysql_select_db($db,$con)or die ("Problemas al conectar la bd");

 //-----------------------OBTENER LISTA PARA COMBOS-------------------------------------------------------------------------------
                                        $selectBusqueda="select distinct tipo from animal;";
                                        $resultado= mysql_query($selectBusqueda,$con);
                                        $listaTipo = array();
                                        $x=0;  
                                        
                                  ?>
                                        
                                <form method="POST" action="BuscarAnimal.php">
                                        <select name="TipoAnimal"> 
                           
                                 <?php
                                    while($valor=mysql_fetch_array($resultado)){
                                            
                                        if ($valor !=NULL) {
                                        $listaTipo[$x]=$valor['tipo'];          
                                 ?>
                                        <option value="<?=$listaTipo[$x]?>" > <?=$listaTipo[$x]?></option>    
                                 <?php
                                    $x++;
                                    }else{
                                        echo "Problemas al obtener datos"; 
                                         }
                                     }
//---------------------------------------------------------------------------------------------------------------
                                ?>            
                                 </select>
                                 <input type="submit" value="Ver"/>
                                </form>
                                        
<!-- ################################################################################################################## -->                                        
                                        
                                        <?php
  
                                          
                                                try {
                                                    if(isset($_POST['TipoAnimal'])){
                                                        $tipo=$_POST['TipoAnimal']; 
                                                    }else{
                                                        $tipo='Res';
                                                    }
                                                    
                                               
                                                  } 
                                                catch (ErrorException $e)
                                                {
                                                      echo 'No se ha buscado nada';
                                                }

                                                echo '<h1>';
                                                echo 'Resultado de busqueda por animal de tipo = '.$tipo;
                                                echo '</h1>';
                                                try {

                                                $con2=mysql_connect($host,$user,$pass) or die ("problemas al conectar");
                                                mysql_select_db($db,$con2)or die ("Problemas al conectar la bd");


 //-----------------------OBTENER LISTA DE ANIMALES-------------------------------------------------------------------------------
                                        $selectAnimales="call buscar_animales('".$tipo."','');";

                                        $resultadoAnimales= mysql_query($selectAnimales,$con); 

                                        $listaAnimales= array();
                                        $x=0;
                                    ?>
                                    <div align="center">
                                          <table border="3px" cellpadding="20px">

                                             <tr>
                                                    <th>Nombre identificador</th>
                                                    <th>Tipo de animal</th>
                                                    <th>Raza del animal</th>
                                                    <th>Sexo</th>
                                                    <th>Fecha de ingreso</th>
                                                    <th>Propósito</th>
                                                    <th>Identificador</th>

                                             </tr>
                                  <?php
                                   while($animal=mysql_fetch_array($resultadoAnimales)){

                                    if ($animal !=NULL) {
                                          $nuevoAnimal = new Animal($animal['nombreIdentificador'], $animal['fechaIngreso'],$animal['codigo'],$animal['tipo'],$animal['proposito'],$animal['sexo'],$animal['raza']);
                                          $listaAnimales[$x]=$nuevoAnimal;
                                    ?>
                                           <tr>     
                                               <td> <?php echo $listaAnimales[$x]->getNombreIdentificador()?></td>
                                               <td> <?php echo $listaAnimales[$x]->getTipoAnimal();?></td>
                                               <td> <?php echo $listaAnimales[$x]->getRaza();?></td>
                                               <td> <?php echo $listaAnimales[$x]->getSexo()?></td>
                                               <td> <?php echo $listaAnimales[$x]->getFechaIngreso();?></td>
                                               <td> <?php echo $listaAnimales[$x]->getProposito();?></td>
                                               <td> <?php echo $listaAnimales[$x]->getIdAnimal();?></td>
                                               <td> <a href="EditarAnimal.php?id=<?php echo $listaAnimales[$x]->getIdAnimal();?>">Editar</a></td>
                                               <td> <a href="../Data/EliminarAnimal.php?id=<?php echo $listaAnimales[$x]->getIdAnimal();?>">Eliminar</a></td>
                                           </tr>
                                    <?php
                                    $x++;
                                    }else{
                                        echo "Problemas al obtener datos"; 
                                         }
                                     }
                                  //---------------------------------------------------------------------------------------------------------------
                                ?>
                            </table> 
                                  </div>
                                  <?php
                                    }  catch (Exception $e){
                                        echo 'No se ha seleccionado ningun cliente';
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
