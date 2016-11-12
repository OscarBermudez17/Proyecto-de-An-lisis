<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ClaseCon
 *
 * @author Jimmy
 */
class ClaseCon {
    
    function  consulta($consulta){
    
        include  ('Valor.php');
     
     $dataValores = new Valor();


//echo 'Consultas ----->>  '.$consulta;
$con=mysql_connect($dataValores->getHost(),$dataValores->getUser(),$dataValores->getPass()) or die ("problemas al conectar");
 mysql_select_db($dataValores->getDb(),$con)or die ("Problemas al conectar la bd");

 $reutado=mysql_query($consulta,$con);
 //echo 'Result     '.$reutado;
 mysql_close($con);
return $reutado;  

} 
}
