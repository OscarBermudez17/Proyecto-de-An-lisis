  <?php
  require('conexion.php');
        
       $query = "SELECT nombre,cedula,telefono, correo,direccion FROM cliente"; 
        
       $resultado= $mysqli->query($query); 
               
        
        ?>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Cliente</title>
    </head>
    <body>
      
    <center><h1>Clientes</h1></center>  
    
    <a href ="agregarCliente.php">Agregar cliente</a>
    <p></p>
    
    <table border = 1 width ="80%">
        
        <thead>
            <tr>
                
                <td><b>Nombre</b></td>
                <td><b>Cédula</b></td>
                <td><b>Teléfono</b></td>
                <td><b>correo</b></td>
                <td><b>dirección</b></td>
                <td><b></b></td>
                <td><b></b></td>
                
            </tr>
             </thead>
        
             <tbody>
    <?php
    while($row=$resultado->fetch_assoc()){?>{
       
             
        <tr>
            
        <td><?php echo $row[nombre];?>
        </td>
        
        <td><?php echo $row[cedula];?>
        </td>
        
        <td><?php echo $row[telefono];?>
        </td>
        
        <td><?php echo $row[correo];?>
        </td>
        
        <td><?php echo $row[direccion];?>
        </td>
        
        </tr>
   
         <td>
    <a href ="modificar.php?id= <?php echo $row['cedula'];?>">Modificar</a>
    </td>
        
        <td>
    <a href ="eliminar.php?id= <?php echo $row['cedula'];?>">Eliminar</a>
    </td>
        
     
     <?php } ?>
</tbody>
</table>
    </body>
</html>
