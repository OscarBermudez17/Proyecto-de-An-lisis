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
          header('Location:../Inicio.php');
        
       include ('../Logeo/Databases.php');
       include ('../Logeo/Usuario.php');
       
        
    if (isset($_POST['nombre']) && !empty($_POST['nombre'])&&
    isset($_POST['codigo']) && !empty($_POST['codigo'])) {
    
    
                 
       $nombre=  $_POST['nombre'];
       $contrasena=$_POST['codigo'];
      
            try { 
    
            $con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
            mysql_select_db($db,$con)or die ("Problemas al conectar la bd");
              header('Location:../Inicio.php');
        
            $selectUsuario="call buscar_Usuario('".$nombre."','".$contrasena."');";
          
              $usuario= mysql_query($selectUsuario,$con);  
              
            
                if (mysql_num_rows($usuario) <= 0){
                
             header('Location: UsuarioInvalido.php');  
            
                    } 
                    
               $lista = array();
              $x=0;
              
                while($us=mysql_fetch_array($usuario)){
 
               if ($us !=NULL) {
          $nuevoUsuario = new Usuario($us['nombre'], $us['contrasena']);
          $lista[$x]=$nuevoUsuario;
          
          echo $lista[$x]->getNombre();
          
                  
           
          session_start();
           $_SESSION["nombre"]=$lista[0]->getNombre() ;
  
             echo $_SESSION["nombre"];
              
              $x++;
             
            header('Location:../Inicio.php');  
               }else{
                      echo "Problemas al obtener datos"; 
     
                    }
               }
               
           
                   }catch (Exception $ex) {
                         echo 'ERROR';
                   }
     
     }else{
     
               echo "Llene todos los espacios"; 
                header('Location: UsuarioInvalido.php');  
                  }
        ?>
         
        
       
    </body>
</html>
