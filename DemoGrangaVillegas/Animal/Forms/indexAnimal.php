<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="contenedor">
            <?php include './header.php'; ?>    
            
            <section class="main">  
                <?php
                 echo "<a href='http://localhost:5000/Cliente/BuscarAnimal.php'>¿Deseas buscar un animal?</a>";
                 ?>
                 <br>
                 <?php
                 echo "<a href='http://localhost:5000/DemoGrangaVillegas/Animal/Forms/InsertarCerdo.php'>¿Quieres insertar un nuevo animal ?</a>";
                 ?>
            </section>
 
            <?php include './aside.php'; ?>
            <?php include './footer.php'; ?>
	</div> 
    </body>
</html>
