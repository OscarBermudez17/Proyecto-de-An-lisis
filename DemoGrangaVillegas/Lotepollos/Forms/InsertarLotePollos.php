<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lotes de pollos</title>
       <link rel="stylesheet" type="text/css" href="../../css/tcal.css"/>
       <script type="text/javascript" src="../../Js/tcal.js"></script> 
       
    </head>
    <body>
        <div class="contenedor">
            <?php  include '../../Interfaz/header.php';?>    
            
            <section class="main">
                <div class="formulario">
                    
                    <center>
                    <p id="titulo">Formulario para lote de pollos </p><br/>
                    <label class="advertencia">Favor complete todos los espacios, no podrá enviar el formulario si los espacios requeridos están incorrectos o vacíos. La señal en rojo indica que un campo esta incorrecto</label><br/><br/>
                    
                    <form action="../Data/GuardarLotePollos.php" method="post" name="form" enctype="multipart/form-data">
                        <div>
                            <label for="cantidad">Cantidad de pollos </label><br/>
                            <input type="number" max="50" min="10" name="cantidad" id="cantidad" required /><br/><br/>
                        </div>
                        
                        <div>
                            <label for="numlote">Número de lote</label><br/>
                            <input type="number" max="5" min="1" name="numlote" id="numlote" required /><br/><br/>
                        </div> 
                        
                        <div>
                            <label for="nombre">Fecha de ingreso</label><br/>
                            <input type="date" id="date" name="date" class="tcal" value="<?php echo date("d")."/".date("m")."/".date("Y")?>" placeholder="Utilice el calendario" required /><br/><br/>
                        </div>
            
                        <input type="submit" value="Agregar animales"/>
                    </form>
                    </center>
                </div>
                <?php
                    include ('./VerLotePollos.php');
                ?> 
                 
            </section>
            
            

              <?php include '../../Interfaz/aside.php'; ?>
            <?php include '../../Interfaz/footer.php'; ?>
            
	</div> 
    </body>
</html>
