<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Medicamentos existentes</title>
         <meta name="description" content="">
        <meta name="viewport" content="width=divice-width, user-scalable=no, initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0"/>
        <script src="prefix.js"></script>
        <script src="../../Js/mensajesAlerta.js" type="text/javascript"></script>
        <link rel="stylesheet" href="../../css/estilos.css">
    </head>
    <body>
        
         <div class="contenedor">
         <?php  include '../../Interfaz/header.php'; ?> 
        <?php
       
        header("Content-type: text/html; charset=utf-8");
        error_reporting(0);
       
        include('../data/conexion.php');
        
        $consulta="Select * from medicamento;";
        $link = mysql_query(conectar::con().$consulta);
        
        $result = mysql_query("Select * from medicamento;". $link); 
       // echo "Medicamentos ";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
         
        
        ?>
         
        
        <section class="main">
              <div class="formulario">
                
                    <center>
                        
                        
                    
        <table border = '1'>
        <tr><td>Código medicamento</td><td>Nombre</td><td>Descripción</td><td>Modificar</td><td>Eliminar</td></tr> 
    <?php
        while ($row = mysql_fetch_row($result)){ 
        
           
        ?>
            <tr>
                <td><?php echo "$row[0]" ?></td>
                <td><?php echo "$row[1]" ?></td>
                <td><?php echo "$row[2]" ?></td>
                <td>
                    <a href="modificarProductoMantenimiento.php?id=<?php echo $row[0];?>">Modificar</a>
                </td>
                <td>
     <input type="button" onclick="Confirmar('../negocio/controlEliminarProductoMantenimiento.php?id=<?php echo $row[0];?>', 'http://localhost:5000/DemoGrangaVillegas/Medicamento/Dominio/VerProductosMantenimiento.php')" value="Elminar" />

                    
                </td>
            </tr>
    
        <?php
        
         } 
        
        
        ?>
        </table>
        
        
        
        <a><br><br>Agregar medicamento</a>
        <form id="mProducto" name="mProducto" method="POST" action="../negocio/controlAgregarProductoMantenimiento.php">
           <br>
           <br>
           <label>Nombre de medicamento</label>
           <input type="text" name="nombre" id="nombre" size="40" maxlength="40" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð\S ,.'-]{2,64}"  required placeholder="Nombre de medicamento">
           <br>
           <br>
           <label>Descripción del producto</label>
           <input type="text" name="descripcion" id="descripcion" size="50" maxlength="50" required placeholder="Ingrese descripción del producto">
           <br>
           <br>
           <table>
               <tr>
               <td>
               <input type="submit" name="agregar" id="agregar" value="Agregar medicamento">
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
        <?php  include '../../Interfaz/aside.php'; ?>  
        <?php  include '../../Interfaz/footer.php'; ?>  
    </div>
        
        
    </body>
</html>
