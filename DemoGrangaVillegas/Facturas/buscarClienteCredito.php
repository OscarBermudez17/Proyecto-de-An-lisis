<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
    <center> 
         <script type="text/javascript" src="Funciones.js"></script>
        <title>Buscar cliente </title>
        
   
    
    <body>
        
        <form   enctype="multipart/form-data">
                <div align="center"><br/>
                    Nombre: <br/><input type="text" id="nombre" value="jimmy"  name="nombre"/><br/>
           
                    Cedula:<br/><input type="text" id="cedula" name="cedula"/><br/>
      
                
           <input type="button" value="Buscar" onclick="buscarCliente();"/>
                   

                </div>
            </form>  
        <h1> Cliente Buscado </h1>
         
         <?php
          $_SESSION['tipo']="";
         include("ClaseCon.php");
        
           $nombreFinal;
           $cedulaFinal;
        
            
        if (isset($_REQUEST['tipo'])){
      
             session_start();
      $_SESSION['tipo']  =  $_REQUEST['tipo'];
      echo  $_SESSION['tipo'];
        }
                if (isset($_REQUEST['metodo'])){
                  
                  $metodo=$_REQUEST['metodo'];
                  if($metodo=="BuscarCliente"){
                     BuscarCliente(); 
                  }
                   if($metodo=="ListaDeudas"){
                     ListaDeudas(); 
                  }
                }
     ///Metodo busca al cliente que ingrese el usuario
              function BuscarCliente(){
             require '../Mascaras.php';
             include ("Databases.php");
             include ("Cliente.php"); 
             
              if (isset($_REQUEST['nombre']) ||
              isset($_REQUEST['cedula']) ){
         
                $nomb=$_REQUEST['nombre'];
                $cedula=$_REQUEST['cedula'];
                $con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
                mysql_select_db($db,$con)or die ("Problemas al conectar la bd");

 //$select="call buscar_deudas('".$_POST['nombre']."', '".$_POST['cedula']."');";
 
$nombre=$_REQUEST['nombre'];


//-----------------------OBTENER LISTA DE CLIENTES-------------------------------------------------------------------------------
   $con =new ClaseCon();

   //$resultado= mysql_query($select,$con2); 

  // $selectClientes="call buscar_Clientes('".$nombre."','".$cedula."');";
          // $select="SELECT * FROM productoVenta where nombre='".$producto."'or codigo='".$codigo."';";
   $selectClientes="SELECT nombre, cedula, telefono FROM  `cliente` WHERE nombre ='".$nombre ."'OR cedula='".$cedula."';";
   //$resultadoClientes= mysql_query($selectClientes,$con); 
   $resultadoClientes = $con->consulta($selectClientes);
   $listaCliente = array();
   $x=0;
   ?>
        <table border="3px" cellpadding="20px" id="tabla">

             <tr>
                    <th>Nombre</th>
                    <th>Cedula</th>
                    <th>Telefono</th>
                    <th>Deudas</th>
             </tr>
             
             
  <?php
   while($cliente=mysql_fetch_array($resultadoClientes)){
  
    if ($cliente !=NULL) {
          $nuevoCliente = new Cliente($cliente['nombre'], $cliente['cedula'],$cliente['telefono']);
          $listaCliente[$x]=$nuevoCliente;
      
    ?>
          
           <tr>  
             
              
               <td> <?php echo $listaCliente[$x]->getNombre();?> </td>
               <td> <?php echo mask($listaCliente[$x]->getCedula(), '#-####-####');?> </td>
               <td> <?php echo mask($listaCliente[$x]->getTelefono(),'##-##-##-##');?></td>
              <td> <input type="button" value="Reporte de Deudas" id="<?php echo $listaCliente[$x]->getNombre()."-".$listaCliente[$x]->getCedula()?>"onclick="buscarDeudas(this.id);"  > </td>
            
               
           </tr>
                 
            
       
    <?php
    $x++;
   
    }else{
        echo "Problemas al obtener datos"; 
     
         }
     }
           
  }
   
              }
              //Fin del Metodo Buscar cliente
?>
</table> 
         <?php  
//-----------------------OBTENER LISTA DE DEUDAS DE CLIENTE-------------------------------------------------------------------------------
   
     function ListaDeudas(){ 
                  //$GLOBALS['total'];

               // include ("Databases.php");
                include ("Factura.php");
               $totalDeuda=0; 
               $cedulaCliente=$_REQUEST['cedula'];
               $cedulaFinal=$_REQUEST['cedula'];
               $nombreFinal=$_REQUEST['nombre'];
               
               echo "<h1>";
               echo 'Nombre: '.$nombreFinal;
               echo ' ';
               echo 'Cedula: '.$cedulaCliente;
               echo "</h1>";  
           
      $_SESSION['nombre']  = $nombreFinal;
      $_SESSION['cedula']  = $cedulaCliente;

         // $con2=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
         // mysql_select_db($db,$con2)or die ("Problemas al conectar la bd");
  
        //  $selectDeudas="call buscar_deudas('".$cedulaCliente."');";
           $con =new ClaseCon();
   $selectDeudas="SELECT f.fecha, c.saldo, c.fechaSiguientePago FROM factura f INNER JOIN cuentasPorCobrar c WHERE c.id_factura = f.id_factura AND f.cedula_cliente ='".$cedulaCliente ."';";
 $resultadoDeudas = $con->consulta($selectDeudas);
//  $resultadoDeudas= mysql_query($selectDeudas,$con2); 
   $listaFacturas = array();
   $x=0;
   ?>
          <table border="3px" cellpadding="20px">

             <tr>
                    <th>Fecha de compra</th>
                    <th>Credito</th>
                    <th>Fecha del siguiente pago</th>
             </tr>
             
             
  <?php
  
   while($factura=mysql_fetch_array($resultadoDeudas)){
  
    if ($factura !=NULL) {
         $nuevaFactura = new Factura($factura['fecha'], $factura['saldo'],$factura['fechaSiguientePago']);
   
     $listaFactura[$x]=$nuevaFactura;
  $totalDeuda=$totalDeuda+$listaFactura[$x]->getTotal();
    
    ?>
          
           <tr>     
               <td> <?php echo $listaFactura[$x]->getFecha(); ?></td>
               <td> <?php echo '₡'.number_format($listaFactura[$x]->getTotal());  ?></td>
               
               <td> <?php echo  $listaFactura[$x]->getSuiguientePago();  ?>
                 </td>

           </tr>

            
  
    <?php
    $x++;
    
    }else{
        echo "Problemas al obtener datos"; 
     
         }
     }
           
     
  //-- Fin del Metodo Lista deudas
       echo "<h1>";
               echo 'Total de deuda: ';
               echo $totalDeuda;
               echo "</h1>";
   
      ?>
</table> 
      
        
        
        
          <form enctype="multipart/form-data">
         <input type="hidden" id="nombreFinal"  value="<?php echo $nombreFinal?>" />
         <input type="hidden" id="cedulaFinal"  value="<?php echo $cedulaFinal?>" /> 
         
         <input type="button"  onclick="Facturar();" value="Seguir transacion"/>
          <input type="button"  onclick="refrescar();" value="Negar Transacción"/>
       
            
              </form>
    <?php
          }
  
      ?>
    
              
        </center>
       </head>
    </body>
</html>