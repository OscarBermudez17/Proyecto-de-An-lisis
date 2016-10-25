<?php

require_once('../data/conexion.php');

    

              
           $mcodigo= $_GET['id'];
           $consulta = "Select * from productoVenta where codigo='".$mcodigo."';";
           $link = mysql_query(conectar::con().$consulta);
           
           $result = mysql_query("Select * from productoVenta where codigo='".$mcodigo."';".$link);
           $row = mysql_fetch_row($result);
           
           
  


 ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar cliente</title>
    </head>
    
    <body>
        
       
        <a><br><br>Actualizar producto</a>
        <form id="mProducto" name="mProducto" method="POST" action="../negocio/controlModificarProducto.php">
            
           <br>
           <br>
           <label>Código del producto</label>
           <input type="text" name="codigo" id="codigo" size="70" maxlength="80" readonly="readonly" value="<?php echo "$row[0]" ?>">
           <br>
           <br>
           <label>Fecha </label>
           <input type="text" name="fecha" id="fecha" size="70" maxlength="80"  value="<?php echo "$row[1]"?>">
           <br>
           <br>
           <label>Tipo de producto</label>
           <input type="text" name="tipo" id="tipo" size="70" maxlength="80"  value="<?php echo "$row[2]"?>">
           <br>
           <br>
           <label>Nombre de producto</label>
           <input type="text" name="nombre" id="nombre" size="70" maxlength="80"  value="<?php echo "$row[3]"?>">
           <br>
           <br>
           <label>Precio de producto</label>
           <input type="text" name="precio" id="precio" size="70" maxlength="80"  value="<?php echo "$row[4]"?>">
           <br>
           <br>
           <table>
               <tr>
               <td>
           <input type="submit" name="agregar" id="agregar" value="Modificar producto nuevo">
           </td>
           <td>
           <input type="reset" name="limpiar" id="limpiar" value="Limpiar">
           </td>
           </tr>
           </table>
           <br>
           <br>
           
        </form>
        
        
    </body>
    
</html>

  
       
