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
         <meta name="description" content="">
        <meta name="viewport" content="width=divice-width, user-scalable=no, initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0"/>
        <script src="prefix.js"></script>
        <link rel="stylesheet" href="../css/estilos.css">
    </head>
    <body>
       <header>
          
             <?php  session_start();
             //echo '<h2 style="color: #FFFFFF">';
            // echo 'Usuario:'. $_SESSION["nombre"];
             //echo '</h2>';
             ?>
		<div class="logo"> 
                    <img src="http://localhost:5000/DemoGrangaVillegas/imagenes/logo.png" width="150" alt="">
                    <a href="http://localhost:5000/DemoGrangaVillegas/Inicio.php">Granja Fam Villegas</a>
		</div>
 
                <nav>
                    
                    <a href="http://localhost:5000/DemoGrangaVillegas/Inicio.php">Inicio</a>
                    <a href="#">*Facturación</a>
                    <a href="http://localhost:5000/DemoGrangaVillegas/Lotepollos/InsertarLotePollos.php">Lote de pollos</a>
                    <a href="http://localhost:5000/DemoGrangaVillegas/Cliente/Forms/verClientes.php">Clientes</a>
                    <a href="http://localhost:5000/DemoGrangaVillegas/Animal/Forms/BuscarAnimal.php">Animales</a>
                    <a href="http://localhost:5000/DemoGrangaVillegas/Producto/./negocio/controlVerProducto.php"> Productos</a>
                    <a href="http://localhost:5000/DemoGrangaVillegas/Medicamento/./negocio/controlVerProductoMantenimiento.php"> Medicinas</a>
                </nav>
            </header>
    </body>
</html>
