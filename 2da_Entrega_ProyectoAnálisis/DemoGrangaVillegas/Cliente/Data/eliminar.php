
<html>
    
    <head></head>
    
    <body>
        
    <center>
        <?php
       //include ('./Database.php');
    //   require '../../Data/DataConsultaBase.php';
       require '../../Data/ClaseCon.php';



           if (isset($_GET['cedula']) && !empty($_GET['cedula']))
            {



            //$con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
           // mysql_select_db($db,$con)or die ("Problemas al conectar la bd");


            $cedula=$_GET['cedula'];
            echo 'CEDULAAAAAAAAAAAAAA '.$cedula;
            $stringSql="call eliminar_Cliente($cedula);";
            $claseCon = new ClaseCon(); 
            //('Juan','cedula','87789001','juan@hotmail.com','200 mts sur del parque Guapiles');

            //$resultado=mysql_query("call eliminar_Cliente($cedula);",$con);
            //$resultado=consulta($stringSql);
            $resultado=$claseCon->consulta($stringSql);
            if($resultado!=null){
                 if(($r=mysql_fetch_array($resultado))!=null){
                    //$r=mysql_fetch_array($resultado);
                  echo '<center>'; 
                     echo'--> '.$r['resultado'];
       
                   echo "<br/> <a href='http://localhost:5000/DemoGrangaVillegas/Cliente/Forms/verClientes.php'>Aceptar </a>";
                 echo '</center>'; 
                   
                 }else{
               
                echo '<center>'; 
                echo'Cliente eliminado exitosamente;';// header('Location: index.php');
                echo "<a href='http://localhost:5000/DemoGrangaVillegas/Cliente/Forms/verClientes.php'>Aceptar</a>";
                echo '</center>'; 
                 }
            }
             echo "<br/> <a href='http://localhost:5000/DemoGrangaVillegas/Cliente/Forms/verClientes.php'>Aceptar </a>";
             }else{

                 echo "Problemas al eliminar datos"; 

             }
 
 ?>
    </center>
    </body>
</html>