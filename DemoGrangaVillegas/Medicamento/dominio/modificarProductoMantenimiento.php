<?php

require_once('../data/conexion.php');

    

              
           $mcodigo= $_GET['id'];
           $consulta = "Select * from medicamento where id_medicamento='".$mcodigo."';";
           $link = mysql_query(conectar::con().$consulta);
           
           $result = mysql_query("Select * from medicamento where id_medicamento='".$mcodigo."';".$link);
           $row = mysql_fetch_row($result);
           
           
  


 ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar medicamento</title>
    </head>
    
    <body>
        
       
        <a><br><br>Actualizar medicamento</a>
        <form id="mProducto" name="mProducto" method="POST" action="../negocio/controlModificarProductoMedicamento.php">
            
           <br>
           <br>
           <label>Código del medicamento</label>
           <input type="text" name="codigo" id="codigo" size="70" maxlength="80" readonly="readonly" value="<?php echo "$row[0]" ?>">
           <br>
           <br>
           <label>Nombre del medicamento</label>
           <input type="text" name="nombre" id="nombre" size="80" maxlength="80"  value="<?php echo "$row[1]"?>">
           <br>
           <br>
           <label>Descripcion del medicamento</label>
           <input type="text" name="descripcion" id="descripcion" size="80" maxlength="80"  value="<?php echo "$row[2]"?>">
           <br>
           <br>
           <table>
               <tr>
               <td>
           <input type="submit" name="agregar" id="agregar" value="Modificar medicamento">
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

  
       
