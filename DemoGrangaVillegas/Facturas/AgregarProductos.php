<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
            <script type="text/javascript" src="Funciones.js"></script>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
          include ("Databases.php");
           include("ClaseCon.php");
             
              if(isset($_REQUEST['nombre'])){
         
                $nomb=$_REQUEST['nombre'];
                 $cedula=$_REQUEST['cedula'];
                echo $nomb;
                echo $cedula;
                
                 session_start();
                 $_SESSION['nombre']=$nomb;
                 $_SESSION['cedula']=$cedula;
                 
                  
              }
        ?>
       
            
        
          <form   enctype="multipart/form-data">
                <div align="center"><br/>
                    Nombre del Producto: <br/><input value="" type="text" id="producto"  name="nombre"/><br/>
                    Codigo del Producto:<br/><input type="text" id="codigo"   name="codigo"/><br/>
                    <input type="button" value="Buscar" onclick="buscarProducto()" />
                            
                   
                </div>
              </form>  
        
                  <?php
                    if (isset($_REQUEST['metodo'])){
              
                        consulta();
                       
                    }
                    
      function consulta(){

     include ("Databases.php");
     include ("Producto.php");
    // include("ClaseCon.php");
     $producto=" ";
     
            if (isset($_REQUEST['producto']) ||
                  isset($_REQUEST['codigo']) ){
                      
               
                   $producto =$_REQUEST['producto'];
                   
               
                   $codigo =$_REQUEST['codigo'];
                
              
            if(empty($_REQUEST['codigo'])){
               $codigo=0; 
            }
                    //echo $producto;
                    //echo $codigo;
                  
                    
                    
          $con2=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
          mysql_select_db($db,$con2)or die ("Problemas al conectar la bd");
                

           
   // $select="call buscar_Producto('".$producto."','".$codigo."');";
    
     $select="SELECT * FROM productoVenta where nombre='".$producto."'or codigo='".$codigo."';";
    $con =new ClaseCon();

   //$resultado= mysql_query($select,$con2); 
   $resultado = $con->consulta($select);
   //echo 'resullll '.$resultado;
   $listaProductos = array();
   $x=0;
    ?>
    <center>
         <table border="3px" cellpadding="20px">

             <tr>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Precio</th>
             </tr>
   
   <?php
     while($productos=mysql_fetch_array($resultado)){
  
    if ($productos != NULL) {
         $nuevoProducto = new Producto($productos['tipo'], $productos['codigo'],$productos['precio']);
   
     $listaProductos[$x]= $nuevoProducto;
    
     ?>
              <tr>     
                  <td> <?php echo $listaProductos[$x]->getNombre(); ?></td>
                  <td> <?php echo $listaProductos[$x]->getCodigo();  ?></td>
               
                 <td> <?php echo '₡'.number_format($listaProductos[$x]->getPrecio());  ?>
                 <td> <input type="button" value="Agregar" id="<?php echo $listaProductos[$x]->getCodigo()."-".$listaProductos[$x]->getNombre()."-".$listaProductos[$x]->getPrecio()?>"onclick="agregarProducto(this.id);"  > </td>
                 </td>

           </tr>

     
     
      <?php
      
    $x++;
    
    }else{
        echo "Problemas al obtener datos"; 
     
         }
     }
    }
                   
                  
         }//fin del metodo Consults
                 ?>
           </table> 
    </center>
         
    </body>
</html>
