<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <?php  
        include ('./Databases.php');
        
        if (isset($_POST['cantidad']) && !empty($_POST['cantidad'])&&
    isset($_POST['numlote']) && !empty($_POST['numlote'])
  &&isset($_POST['date']) && !empty($_POST['date']))
{   
            
                 
                  
try { 
    
            $con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
            mysql_select_db($db,$con)or die ("Problemas al conectar la bd");
           $codigo=0;
           
           //insert into lotepollos values (15,1,'09/19/2016',0);
            //$insertar = "INSERT INTO lotePollos VALUES ('".$_POST['cantidad']."', '".$_POST['lote']."'', '".$_POST['fecha']."');";
           mysql_query("insert into lotePollos values ('$_POST[cantidad]','$_POST[numlote]','$_POST[date]',$codigo);",$con);   
           // mysql_query($insertar,$con); 

            echo "Datos insertados correctamente"; 
            header('Location: InsertarLotePollos.php');
                   }catch (Exception $ex) {
                         echo 'ERROR Lote no insertado';
                   }
     
               }else{
     
               echo "Llene todos los espacios"; 
     
                  }
        ?>
    </body>
</html>
