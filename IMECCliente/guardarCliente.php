<?php

require('conexion.php');

$nombreC = $POST['nombre'];
$cedulaC = $POST['cedula'];
$telefonoC = $POST['telefono'];
$correoC = $POST['correo'];
$direccionC = $POST['direccion'];

$query = "INSERT INTO CLIENTE values('nombre','cedula','telefono','correo','direccion');";

$resultado = $mysqli->query($query);

?>

<html>
    
    <head>
        
        <title> Guardar Cliente</title>
        
        
    </head>
    
    <body>
        
    <center>
        
        <?php
        if($resultado>0)
        ?>
        <h1>Cliente guardado</h1>
        <?php}else{?>
        <h1>Error al guardar usuarui</h1>
        <?php}?>
        
        <a href="index.php">Regresar</a>
    </center>
    </body>
</html>