<?php
include ('./Conexion.php');



           if (isset($_GET['id']) && !empty($_GET['id']))
            {



            $con=mysql_connect($host,$user,$pass) or die ("problemas al conectar");
            mysql_select_db($db,$con)or die ("Problemas al conectar la bd");


            $id=$_GET['id'];


            //('Juan','cedula','87789001','juan@hotmail.com','200 mts sur del parque Guapiles');


            $resultado=mysql_query("call eliminar_Animal('$id');",$con);
          
             try { 
                   
                    echo 'Eliminado';
                
                }catch (Exception $e){
                     echo'Error';
                }
           
                //header('Location: BuscarAnimal.php');
                echo "Animal eliminado exitosamente";
                echo "<a href='http://localhost:5000/DemoGrangaVillegas/Animal/Forms/BuscarAnimal.php'>Aceptar</a>";
                
            
         
             }else{

                 echo "Problemas al Eliminar Animal"; 

             }
 
 ?>

