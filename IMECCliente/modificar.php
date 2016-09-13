<?php

require('conexion.php');

$cedula = $_GET['cedula'];

$query = "select nombre, cedula, direccion from cliente where cedula = '$cedula'";

$resultado = $mysqli->query($query);

?>


<form name= "ModificarUsuario" action = "modificarCliente.php" method="POST">
           
            <label>Nombre completo</label>
            <input type = "text" name="nombre" size = "30"><br>
            
            <br><label>Cédula</label>
            <input type = "text" name="cedula" size = "30"><br>
            
            <br><label>Número de teléfono</label>
            <input type = "text" name="telefono" size = "30"><br>
            
            <br><label>Correo electrónico</label>
            <input type = "text" name="correo" size = "30"><br>
            
            <br><label>Dirección</label>
            <input type = "text" name="direccion" size = "30"><br>
            
            <br>
            <input type="submit" name="submit" value="Modificar cliente"/><input type="reset"> 
             <br>
            
            
        </form>