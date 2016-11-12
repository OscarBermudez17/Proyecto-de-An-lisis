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
         <div id="Registrar">
        
    </div> 
        <?php
        
        include ("ListaFactura.php");
       
        include("ClaseCon.php");
        include ('./Databases.php');
          
            
            
         
         if (isset($_REQUEST['lista'])){
                $lista= array();
                $lista=$_REQUEST['lista'];
                $lista.=',';
                $var;
                $tipoFactura=$_REQUEST['tipoFactura'];
                               $nombre=$_REQUEST['nombre'];
                               $cedula=$_REQUEST['cedula'];
                          $totalFactura=$_REQUEST['totalFactura'];
                 $con =new ClaseCon();
                 
                //  $fecha=date("d")."/".date("m")."/".date("Y");
                $fecha=$_REQUEST['fecha'];
    //$select="insert into detalle values('".$producto."','".$codigo."');";
   
   //$resultado= mysql_query($select,$con2);
             
               $cont=1;
               $precio;
               $cantidad;
               $codigo;
               $var='';
               $codigoFactura;
              
              //echo "tama="+count($lista);
               $selectFactura="call insertar_factura('".$fecha."',".$totalFactura.",".$cedula.");";
               $resulFactura=$con->consulta($selectFactura);
               
               unset($con);
               
                  
                 

                 
               while($r=mysql_fetch_array($resulFactura)){
                    $codigoFactura=$r['id'];
               }
             
               
                for($i=0;$i<strlen($lista);$i++) {
                    
                   // echo $lista{$i}; 
                    if($lista{$i} != ','){
                        $var.=$lista{$i};
                        
                   // echo 'var en i=  '.$lista{$i}.' ';
                    }else
                    {
                      echo 'var en i else =  '.$lista{$i}.' ';
                       // echo 'else  ';
                       // echo 'cont='.$cont;
                         // echo 'var='.$var.'  ';
                       echo 'cont=  '.$cont;
                        if($cont ==1){
                            $codigo=$var;
                             $var='';
                            // echo 'codigo '.$codigo;
                        }
                        if($cont ==2){
                            $precio=$var;
                             $var='';
                           //  echo 'Precio '.$precio;
                        }
                        if($cont ==3){
                            $cantidad=$var;
                           // echo 'Cantidad '.$cantidad;
                             $var='';
                     $con2=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
                  mysql_select_db($db,$con2)or die ("Problemas al conectar la bd");
                 $num=0;                                                         //(0,cantidad,codigoFactura,codigoArticulo, precio
                 $sqlDetalle= "insert into detalle values( ".$num .",".$cantidad.",".$codigoFactura.",'".$codigo."',".$precio.");";
                    // echo "codigo=".$codigo.'-'."precio=".$precio.'-cantidad='.$cantidad.'-Total='.$totalFactura ;
                      mysql_query($sqlDetalle,$con2);
                     
                           
                        }
                        
                          $cont= $cont+1;
                         
                    }
                    if($cont == 4){
                            $cont=1;
                            $codigo='';
                            $precio='';
                            $cantidad='';
                        }
                     
             
     }
     
          if(strcmp ($tipoFactura , "2" ) == 0){
                          $con2=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
                  mysql_select_db($db,$con2)or die ("Problemas al conectar la bd");
                 $num=0;
                 $estado=1;
                                                  //0,codigoFactura , fechaSigPago,saldo,estado
                 $fechaSiguientePago=generarFecha($fecha);
              
                 $sqlCredito= "insert into cuentasPorCobrar values( ".$num .",".$codigoFactura.",'".$fechaSiguientePago."',".$totalFactura.",".$estado.");";
                    // echo "codigo=".$codigo.'-'."precio=".$precio.'-cantidad='.$cantidad.'-Total='.$totalFactura ;
                      mysql_query($sqlCredito,$con2);
                           
                       }  else {
                          //  echo 'Credito';
                       }
               
                
              }
          function generarFecha($fechaActual){
                            
                                    $fecha=explode("/", $fechaActual);
                                    $dias= (int)$fecha[1];
                                    $mes=(int)$fecha[0];
                                    
                                    $dias=$dias+15;
                                    
                                    if($dias>29){
                                        $dias=$dias-29;
                                        $mes=$mes+1;
                                     
                                    }else{
                                   
                                        
                                    }
                            return $mes.'/'.$dias.'/'.$fecha[2];
                            
                        }
        ?>
    </body>
</html>
