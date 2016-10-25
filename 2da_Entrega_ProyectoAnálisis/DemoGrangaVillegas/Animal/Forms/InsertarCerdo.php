<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../css/estilos.css">
              <link rel="stylesheet" type="text/css" href="../../css/tcal.css" />
              <script type="text/javascript" src="../../Js/tcal.js"></script> 
        <title>Insertar animal</title>
    </head>
    <body>
        <div class="contenedor">
            <?php include '../../Interfaz/header.php'; ?>    
            
            <section class="main">
                
                <div class="formulario">
                    <center>
                    <p id="titulo">Formulario para animal</p><br>

                    <form method="POST" action="../Data/registro.php">
                        
                        <div>
                            <label for="fechaIngreso">Fecha de ingreso</label><br>
                            <input type="date" id="date" name="date" class="tcal" value="<?php echo date("d")."/".date("m")."/".date("Y")?>" placeholder="Utilice el calendario" required /><br><br>
                        </div>                        
                        
                        <div>
                            <label for="nombre">Nombre identificador</label><br>
                            <input type="text" name="nombre" id="nombre" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,20}" placeholder="Nombre, Solo recibe letras" required/><br><br>
                        </div>  
    
                        <div>
                            <label for="raza">Raza</label><br>
                            <input type="text" name="raza" id="raza" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,20}" placeholder="Raza, Solo recibe letras" required/><br><br>
                        </div>   
                        
                         <div>
                            <label for="proposito">Propósito</label><br>
                            <input type="text" name="proposito" id="proposito" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,17}" placeholder="Raza, Solo recibe letras" required/><br><br>
                        </div>    
          
                        <div>
                            <label for="sexo">Sexo</label><br>
                           <select name="sexo">
                                <option value="Macho">Macho</option>
                                <option value="Hembra">Hembra</option>
                            </select><br><br>
                        </div>  
                        
                         <div>
                            <label for="tipo">Tipo de animal</label><br>
                             <select name="tipo">
                                <option value="Porcino">Porcino</option>
                                <option value="Res">Res</option>
                            </select><br><br>
                        </div>    
                        
                        <label class="advertencia">Favor complete todos los espacios, no podrá enviar el formulario si los espacios requeridos están incorrectos o vacíos. La señal en rojo indica que un campo esta incorrecto</label><br><br>
            		<input type="submit" name="insertar" value="Insertar Animal"title="Guardar">
                    </form>
                    </center>
                </div>
            </section>
 
            <?php include '../../Interfaz/aside.php'; ?>
            <?php include '../../Interfaz/footer.php'; ?>
	</div>  
         
    </body>
</html>