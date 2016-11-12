<html>
    <head>
        <meta charset="UTF-8">
        <title> Cliente</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=divice-width, user-scalable=no, initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0"/>
        <script src="prefix.js"></script>
        <script src="../../Js/mensajesAlerta.js" type="text/javascript"></script>
        <script src="../../Js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="../../Js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
        <link rel="stylesheet" href="../../css/estilos.css">

    </head>
    <body>
        <div class="contenedor">


            <?php
            //importaciones de archivos necesarios
            include '../../Interfaz/header.php';
            include ("../Domino/Cliente.php");
            require '../../Data/ClaseCon.php';
            require '../../Mascaras.php';
            require '../../Js/mensajesAlerta.js';
            ?>    

            <section class="main"> 
                <div class="formulario">

                    <center>
                        <p id="titulo">Buscar clientes</p><br>

                        <a href ="agregarCliente.php">Agregar cliente</a>
                        <?php

                        function MiFunction() {
                            echo 'Mensaje';
                        }
                        
                        
                        ?>
  <!--****************Form para insertar los parámetros de busqueda de un cliente ya sea por nombre apellidos o cedula **  -->
                        <form  name="busqueCliente" method="post" action="verClientes.php"  enctype="multipart/form-data">
                            <div align="center"><br/>

                                <br/> Nombre:<input type="text"  name="nombre" width="300px"/>

                                Primer apellido:<input type="text"  name="primerAp" width="300px"/><br/>

                                Segundo apellido:<input type="text"  name="segundoAp" width="300px"/>

                                Cédula:<input type="text"  id="cedula" name="cedula"/><br/>

                                <input type="submit" value="Buscar"/>

                            </div>
                        </form> 
<!--****************************************** Fin Form busquedaCliente ****************************************************  -->

                        <script>
                            // Metodo para aplicar mascaras a formularios por llenar.       
                            jQuery(function ($) {
                                $("#cedula").mask("9-9999-9999");
                            });
                        </script>
<!--**********************************************************************************************************************+-->



 <!--****************** Aqui se obtienen los datos ingresados para la busqueda del cliente  ****************************************
 ******************* preguntando con isset($_POST[]) si se han enviado los parámetros    *******************************************************+-->
                        <?php
                        if (isset($_POST['nombre']) || isset($_POST['primerAp'])) {
                            $nombre = $_POST['nombre'];
                            $cedula = $_POST['cedula'];
                            $cedula = intval(preg_replace('/[^0-9]+/', '', $cedula), 10); // esta linea le quita la mascara "-" a la cedula , para que queden solo los numeros
                            $primerAp = $_POST['primerAp'];
                            $segundoAp = $_POST['segundoAp'];

                            // En estos if se valida si el usuario dejó algun parametro vacio
                            // entonces si es asi se le coloca un 'O' esto porque es una busquda por medio de
                            //like. 
                            if ($nombre == null)
                                $nombre = '0';
                            if ($cedula == null)
                                $cedula = '0';
                            if ($primerAp == null)
                                $primerAp = '0';
                            if ($segundoAp == null)
                                $segundoAp = '0';


                            $sql = "select * from  cliente 
                                                    where  nombre like '" . $nombre . "%'  or primerAp like '" . $primerAp . "%' or segundoAp like '" . $segundoAp . "%'  or cedula like '" . $cedula . "%'";
                        } else {
                            $nombre = '';
                            $cedula = 0000000;
                            $primerAp = '';
                            $segundoAp = '';
                            $sql = "select * from  cliente";
                        }


                        //Este if quiere decir que el usuario no ingresó nigún dato , entonces por defecto se hace 
                        //una busqueda de todos los clientes
                        if ($nombre == '0' && $primerAp == '0' && $segundoAp == '0' && $cedula == '0') {
                            $sql = "select * from  cliente";
                        }

                        try {
                            
                            $con = new ClaseCon();
                            $resultadoClientes = $con->consulta($sql);

                            $nombre = null;
                            $cedula = null;
                            $primerAp = null;
                            $segundoAp = null;
                            $listaCliente = array();
                            $x = 0; // llevar la posición del array de clientes , para ir haciendo el get de cada uno
                            ?>

<!--*********************************** Aqui se llena la tabla de clientes entontrados en la busqueda ******************************************** -->
                            <div align="center">
                                <table name="tbClientes" border="3px" cellpadding="20px" >

                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cedula</th>
                                        <th>Telefono</th>
                                        <th>Correo</th>
                                        <th>Direccion</th>
                                        <th>Accion</th>
                                        <th>Accion</th>

                                    </tr>
                                    <?php
                                    while ($cliente = mysql_fetch_array($resultadoClientes)) {

                                        if ($cliente != NULL) {
                                            $nuevoCliente = new Cliente($cliente['nombre'], $cliente['primerAp'], $cliente['segundoAp'], $cliente['cedula'], $cliente['telefono'], $cliente['correo'], $cliente['direccion']);
                                            $listaCliente[$x] = $nuevoCliente;
                                            ?>
                                            <tr>    
                                                <td > <?php echo $listaCliente[$x]->getNombre() . ' ' . $listaCliente[$x]->getPrimerAp() . ' ' . $listaCliente[$x]->getSegundoAp() ?></td>
                                                <td> <?php echo mask($listaCliente[$x]->getCedula(), '#-####-####'); ?>" </td>
                                                <td> <?php echo mask($listaCliente[$x]->getTelefono(), '##-##-##-##'); ?> </td>
                                                <td> <?php echo $listaCliente[$x]->getCorreo(); ?></td>
                                                <td> <?php echo $listaCliente[$x]->getDireccion(); ?></td>
                                                <td> <a href="modificar.php?cedula=<?php echo $listaCliente[$x]->getCedula(); ?>">Editar</a></td>
                                                <td> <input type="button" onclick="Confirmar('../Data/eliminar.php?cedula=<?php echo $listaCliente[$x]->getCedula(); ?>', 'http://localhost:5000/DemoGrangaVillegas/Cliente/Forms/verClientes.php')" value="Elminar" /></td>    
                                            </tr>
                                            <?php
                                            $x++;
                                        } else {
                                            echo "Problemas al obtener datos";
                                        }
                                    }
                                    //---------------------------------------------------------------------------------------------------------------
                                    ?>
                                </table> 

<!--********************************** Fin tbClientes  ************************************************************************************ -->                                
                            </div>
                            <?php
                        } catch (Exception $e) {
                            echo 'No se ha seleccionado ningun cliente';
                        }
                        ?>

                    </center>
                </div>
            </section>

            <?php include '../../Interfaz/aside.php'; ?>
            <?php include '../../Interfaz/footer.php'; ?>
        </div>                        
    </body>
</html>
