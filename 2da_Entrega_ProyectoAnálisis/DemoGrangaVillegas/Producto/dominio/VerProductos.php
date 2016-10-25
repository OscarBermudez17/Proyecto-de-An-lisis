 <!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Productos </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=divice-width, user-scalable=no, initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0"/>
        <script src="prefix.js"></script>
        <link rel="stylesheet" href="../../css/estilos.css">
        
              <link rel="stylesheet" type="text/css" href="../../css/tcal.css" />
              <script type="text/javascript" src="../../Js/tcal.js"></script> 
    </head>
    <body>
         <div class="contenedor">
            <?php  include '../../Interfaz/header.php'; ?>   
              <section class="main"> 
                <div class="formulario">
                
             <center>
        
        <?php
       //../../css/estilos.css
        header("Content-type: text/html; charset=utf-8");
        error_reporting(0);
        
        include('../data/conexion.php');
        
        
        $consulta="Select * from productoVenta;";
        $link = mysql_query(conectar::con().$consulta);
        
        $result = mysql_query("Select * from productoVenta;". $link); 
        echo "Productos de venta";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
         
        
        ?>
        <table border = '1'>
        <tr><td>Código</td><td>Fecha</td><td>Tipo producto</td><td>Nombre producto</td><td>Precio producto</td><td>Modificar</td><td>Eliminar</td></tr> 
    <?php
        while ($row = mysql_fetch_row($result)){ 
        
           
        ?>
            <tr>
                <td><?php echo "$row[0]" ?></td>
                <td><?php echo "$row[1]" ?></td>
                <td><?php echo "$row[2]" ?></td>
                <td><?php echo "$row[3]" ?></td>
                <td><?php echo "$row[4]" ?></td>
                <td>
                    <a href="modificarProducto.php?id=<?php echo $row[0];?>">Modificar</a>
                </td>modificarProducto
                <td>
                    <a href="../negocio/controlEliminarProducto.php?id=<?php echo $row[0];?>">Eliminar</a>
                </td>
            </tr>
    
        <?php
     
        } 
        
        
        ?>
        </table>
        
        
        
        <a><br><br>Agregar producto</a>
        <form id="vProducto" name="vProducto" method="POST" action="../negocio/controlAgregarProducto.php">
           <br>
           <br>
         <!--  <label>Código</label>
           <input type="text" name="codigo" id="anuncio" size="7" maxlength="7"  placeholder="P-00000">-->
           <br>
           <br>
           <label>Fecha</label>
           <input type="date" id="date" name="fecha" class="tcal" value="<?php echo date("d")."/".date("m")."/".date("Y")?>" id="anuncio" size="25" maxlength="25" required placeholder="Utilice el calendario">
           <br>
           <br>
           <label>Tipo de producto</label>
           <input type="text" name="tipo" id="anuncio" size="25" maxlength="25" required placeholder="Ingrese tipo de producto">
           <br>
           <a href="imecProducto.php"></a>
           <br>
           <label>Nombre de producto</label>
           <input type="text" name="nombre" id="nombre" size="25" maxlength="25" required placeholder="Ingrese nombre de producto">
           <br>
           <br>
           <label>Precio de producto</label>
           <input type="text" name="precio" id="precio" size="25" maxlength="25" required placeholder="Ingrese precio de producto">
           <br>
           <br>
           <table>
               <tr>
               <td>
               <input type="submit" name="agregar" id="agregar" value="Agregar producto nuevo">
               </td>
               <td>
               <input type="reset" name="limpiar" id="limpiar" value="Limpiar">
               </td>
               </tr>
           </table>
           
          
        </form>
        
             </center>
                </div>
              
             </section>
             <?php include '../../Interfaz/aside.php'; ?>
            <?php include '../../Interfaz/footer.php'; ?>
         </div>
     
        
        
    </body>
</html>
