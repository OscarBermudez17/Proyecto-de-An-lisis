<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <title> Agregar cliente </title>
    <body>
        
        <form name= "Agregarusuario" action = "guardarCliente.php" method="POST">
           
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
            <input type="submit" name="submit" value="Agregar cliente"/><input type="reset"> 
             <br>
            <input type="button" name="button" value="Buscar cliente"/>
            
            
        </form>
        
        
    </body>
</html>
