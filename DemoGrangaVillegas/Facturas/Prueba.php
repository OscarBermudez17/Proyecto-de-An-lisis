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
         <?php echo "<a href='http://localhost:5000/PhpFactura/Funciones/?cedulaCliente=".$listaCliente[$x]->getCedula()."&nombreC=".$listaCliente[$x]->getNombre()."'>".$listaCliente[$x]->getNombre()."</a>"?> >
        <?php
          
        // put your code here
         if (isset($_REQUEST["nombre"]) ||
              isset($_REQUEST["cedula"]) ){
             $cedula=$_REQUEST['cedula'];
             $nombre=$_REQUEST['nombre'];
             echo $nombre +" "+$cedula;
         }
         
         
         
        ?>
          <?php  
//-----------------------OBTENER LISTA DE DEUDAS DE CLIENTE-------------------------------------------------------------------------------
   
       
   // if (isset($_POST['cedula']) ){
      if (isset($_REQUEST['nombre']) ||
              isset($_REQUEST['cedula']) ){
  
     $cedulaCliente=$_GET['cedulaCliente'];
   echo "<h1>";
  echo $_GET['nombreC'];
  echo "</h1>";  
  $con2=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
  mysql_select_db($db,$con2)or die ("Problemas al conectar la bd");
  
  $selectDeudas="call buscar_deudas('".$cedulaCliente."');";
   
   $resultadoDeudas= mysql_query($selectDeudas,$con2); 
   $listaFacturas = array();
   $x=0;
         
   ?>
          <table border="3px" cellpadding="20px">

             <tr>
                    <th>Fecha de compra</th>
                    <th>Credito</th>
                    <th>Fecha actual</th>
             </tr>
             
             
  <?php
         
  $total=0;
   while($factura=mysql_fetch_array($resultadoDeudas)){
  
    if ($factura !=NULL) {
         $nuevaFactura = new Factura($factura['fecha'], $factura['total']);
   
     $listaFactura[$x]=$nuevaFactura;
     $total= $total+$nuevaFactura->getTotal();
    
    ?>
          
           <tr>     
               <td> <?php echo $listaFactura[$x]->getFecha(); ?></td>
               <td> <?php echo $listaFactura[$x]->getTotal();  ?></td>
               
                 <td> <?php echo date("d-m-Y");  ?>
                 </td>

           </tr>

            
  
    <?php
    $x++;
    
    
    }else{
        echo "Problemas al obtener datos"; 
     
         }
     }
           
  
  //---------------------------------------------------------------------------------------------------------------
      
         }?>
</table> 
      
        <h1><?php echo "Total de deuda:,".$total;  ?>;</h1>
               

    
                   
          
        <form   method="post" action="FormFactura.php">
            <input type="hidden" name="nombre" value="<?=$_GET['nombreC'] ;?>" /> 
            <input type="hidden" name="cedula" value="<?= $cedulaCliente;?>" />
             <input type="submit" value="Seguir transacion"/>
          
            
        </form>
    </body>
</html>
