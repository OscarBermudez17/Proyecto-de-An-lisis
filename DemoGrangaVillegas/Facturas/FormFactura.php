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
        <link rel="stylesheet" href="../css/estilos.css">
        <script type="text/javascript" src="Funciones.js"></script>

    <div class="contenedor">
       <?php  include '../Interfaz/header.php'; ?>
        <section class="main">
            <div class="formulario">
                <center>
                    <center>

                        <h1>Granja familia villegas</h1>
                        <h1> Telefono: 24-78-78-78</h1>
                        <h1>Dirrecion: Santa Rita Rio Cuarto</h1>
                    </center>

                    </head>
                    <body>


                        <form action="Funciones.js" method="post" name="tipodePago"  enctype="multipart/form-data">
                            <div align="center"><br/>
                                <input type="radio" name="group1" value="credito" onclick='Factura()'/> Credito<br/>

                                <input type="radio" name="group1" value="contado" onclick='Factura()'/> Contado<br/>
                                <input type="hidden" id="tipoFactura" value="1"/> Contado<br/>
                            </div>
                        </form>  
                        <?php
                        
                        $_SESSION['nombre'] = 'Anonimo';
                        
                        $_SESSION['cedula'] = '11';
                        ?>

                        <div id="encabezado">    

                            <center>
                                Cliente:  <input type="text" id="nombreFCliente" value="<?php echo $_SESSION['nombre']; ?>"/>
                                Cedula:  <input type="text" id="cedulaFCliente" value="<?php echo $_SESSION['cedula']; ?>"/>
                                Fecha:  <input type="text" id="fechaFactura" value="<?php echo date("d") . "/" . date("m") . "/" . date("Y"); ?>"/>
                            </center>
                        </div> 
                        <div id="txtHint">    
                        </div> 
                        <!-- <div id="txtHint">    
                        </div> -->

                        </div>

                        <div id="tablaFactura">
                            <center>
                                <table class="tb1Data" border="2">
                                    <thead >
                                        <tr>
                                            <th>Codigo </th>
                                            <th>Nombre </th>
                                            <th>Precio </th>
                                            <th>Cantidad </th>
                                            <th>subtotal</th>
                                            <th>Accion </th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbDetalle">

                                    </tbody>
                                </table>

                        </div>

                </center>
                <center>
                    <input type="hidden" value="Registrar Factura" id="registrar" onclick="GuardarFactura()">
                </center>
                <?php
                if (isset($_REQUEST['lista'])) {

                    $lista = $_REQUEST['lista'];
                    echo 'Llega aqui';
                    echo $lista[0];
                }
                ?>



            </div>
        </section> 
        <?php include '../Interfaz/aside.php'; ?>
        <?php include '../Interfaz/footer.php'; ?>
    </div>
</center>
</body>
</html>
