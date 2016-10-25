<?php

 //echo 'Llega a la clase conectar <br>';

class conectar{
    
    function con(){
        //echo 'Entra al metodo de conectar con() <br>';
       // echo "Llega el metodo con <br>";
         
         
       /* $user='root';
        $password='1234';
        $db='granja_villegas';
        $port='3306';
        $host='localhost*/
        
         $user='ucrgrupo3';
        $password='Rtva#Grupo#3';
        $db='ucrgrupo3';
        $port='3306';
        $host='68.178.217.14';
        //$strCnx = "host=$host user=$user port= $port password=$password";
    $con = mysql_connect($host,$user,$password) or die("ERROR DE CONEXION  .". mysql_error());    
    
         
    
    mysql_select_db('ucrgrupo3') or die('No se pudo seleccionar la base de datos');
   // echo 'Connected successfully <br>';
    //echo "FIN DE LA CONEXION ".$con."<br>";
    return $con;
        
    }
}

