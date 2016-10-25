<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
         <meta name="description" content="">
        <meta name="viewport" content="width=divice-width, user-scalable=no, initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0"/>
        <script src="prefix.js"></script>
        <link rel="stylesheet" href="../../css/estilos.css">
    </head>
    <title> Agregar cliente </title>
    <body>
         <div class="contenedor">
            <?php include '../../Interfaz/header.php'; ?>    
            
            <section class="main"> 
                <div class="formulario">
                    
                      <center>
                    <p id="titulo">Formulario para cliente</p><br>
                <form name= "Agregarusuario" action = "../Data/guardarCliente.php" method="POST">
           
             <div>
                <label for="nombre">Nombre *</label><br>
                <input type = "text" name="nombre"  pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð\S,.'-]{2,32}" placeholder="Nombre, Solo recibe letras sin espacios " required><br>
             </div>
                    <!--[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð\S,.'-]{2,32} -->
             <div>
                <label for="primerAp">Primer apellido *</label><br>
                <input type = "text" name="primerAp" size = "30" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð\S ,.'-]{2,64}" placeholder="Apellido, Solo recibe letras sin espacios " required><br>
             </div>
                    
             <div>
                <label for="segundoAp">Segundo apellido *</label><br>
                <input type = "text" name="segundoAp" size = "30" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð\S ,.'-]{2,64}" placeholder="Apellido, Solo recibe letras sin espacios " required><br>
             </div>
                    
            <div>
                <label for="cedula">Cédula de identidad *</label><br>
                <input type="text" name="cedula" id="cedula" pattern="[1-9]{9}" placeholder="Ejemplo: 115950874"required /><br><br>
            </div> 
            
            <div>
                <label for="numTelefono">Número de teléfono *</label><br>
                <input type = "text" name="telefono" size = "30" pattern="[1-9]{8}" placeholder="Ejemplo: 87654321" required><br>
            </div>
                    
             <div>
                <label for="correo">Correo electrónico</label><br>
                <input type = "email" name="correo" size = "30" placeholder="Ejemplo: user@granjafamvillegas.com"><br>
             </div>
            
             <div>
                <label for="direccion">Dirección</label><br>
                <input type = "text" name="direccion" size = "30"  placeholder="Ejemplo: 100 mts sur , casa de color verde ..."><br>
            </div>
            <br>
            <label class="advertencia">Favor complete todos los espacios con este simbolo ( * ) ,de lo contrario no podrá enviar el formulario si los espacios requeridos están incorrectos o vacíos. La señal en rojo indica que un campo esta incorrecto</label><br><br>
            <input type="submit" name="submit" value="Agregar cliente"/>
            <input type="reset"> 
             <br>
            <input type="button" name="button" value="Buscar cliente"/>
            
            
        </form>
                      </center>
                </div>
               </section>
 
            <?php include '../../Interfaz/aside.php'; ?>
            <?php include '../../Interfaz/footer.php'; ?>
	</div> 
        
    </body>
</html>
