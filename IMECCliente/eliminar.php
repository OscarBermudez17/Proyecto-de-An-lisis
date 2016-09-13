<?php

require('conexion.php');

$id = $_GET['cedula'];

$query = "Delete from cliente where cedula = '$cedula'";

$resultado = $mysqli->query($query);
?>

<html>
    
    <head></head>
    
    <body>
        
    <center>
        
        <?php
        
        if($resultado>0){?>
            
        <h1>Usuario Eliminado</h1>
        
        <?php }else{?>
        
        <h1>Error al eliminar</h1>
            
        <?php } ?>
        <p></p>
        <a href="index.php">Regresar</a>
    </center>
    </body>
</html>