<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ingreso Granja Fam Villegas</title>
        <link rel="stylesheet" href="../css/estilos.css">
        <link rel="stylesheet" type="text/css" href="../css/tcal.css" />
        <script type="text/javascript" src="../Js/tcal.js"></script> 
    </head>
    <body style="background:white">
         <section class="main">
                
                <div class="formulario" >
                    <form enctype="multipart/form-data"  action="Verificar.php" method="post" name="form">
                        <center>
                            <p id="titulo">Ingresar a Granja Fam Villegas</p><br><br/>
                            <div>
                                <label for="nombre">Nombre *</label><br>
                                <input type = "text" name="nombre" size = "30" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð\S,.'-]{2,32}" placeholder="Nombre, Solo recibe letras sin espacios " required><br>
                            </div><br>

                            <div>
                                <label for="nombre">Contraseña</label><br/><br/>
                                <input type="password" id="codigo"   name="codigo"/><br/><br/><br/>
                            </div>

                            <input type="submit" value="Ingresar"/>
                        </center>
                   </form> 
                </div>
         </section>
        <?php
       
        ?>
    </body>
</html>
