<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Productos </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=divice-width, user-scalable=no, initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0"/>
        <script src="prefix.js"></script>
        <script src="../../Js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="../../Js/jquery.maskedinput-1.2.2.js" type="text/javascript"></script>
        <link rel="stylesheet" href="../../css/estilos.css">

        <link rel="stylesheet" type="text/css" href="../../css/tcal.css" />
        <script type="text/javascript" src="../../Js/tcal.js"></script> 
        <script type="text/javascript" src="../../Js/mensajesAlerta.js"></script> 
    </head>
    <body>
        <div class="contenedor">
            <?php include '../../Interfaz/header.php'; ?>   
            <section class="main"> 
                <div class="formulario">

                    <center>

                        <?php
                        //../../css/estilos.css
                        header("Content-type: text/html; charset=utf-8");
                        error_reporting(0);

                        include('../data/conexion.php');
                        include('../../Data/ClaseCon.php');

                        $con = new ClaseCon();

                        $consulta = "Select * from productoVenta;";

                        //$link = mysql_query(conectar::con().$consulta);
                        // $result = mysql_query("Select * from productoVenta;". $link); 
                        // $link=$con->consulta($consulta);
                        $result = $con->consulta($consulta);
                        echo "Productos de venta";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        echo "<br>";
                        ?>
                        <table>

                            <tr>
                                <td>Código</td>
                                <td>Fecha</td>
                                <td>Tipo producto</td>
                                <td>Nombre producto</td>
                                <td>Precio producto</td>
                                <td>Modificar</td>
                                <td>Eliminar</td>
                            </tr> 

<?php
setlocale(LC_MONETARY, "es_ES");
while ($row = mysql_fetch_row($result)) {
    ?>
                                <tr>
                                    <td><?php echo "$row[0]" ?></td>
                                    <td><?php echo "$row[1]" ?></td>
                                    <td><?php echo "$row[2]" ?></td>
                                    <td><?php echo "$row[3]" ?></td>
                                    <td><?php echo '₡' . number_format($row[4]); ?></td>



                                    <td>
                                        <a href="modificarProducto.php?id=<?php echo $row[0]; ?>">Modificar</a>
                                    </td>
                                    <td>
                                        <input type="button" onclick="Confirmar('../negocio/controlEliminarProducto.php?id=<?php echo $row[0]; ?>', 'http://localhost:5000/DemoGrangaVillegas/Producto/./negocio/controlVerProducto.php')" value="Elminar" />
                                       <!-- <a href="../negocio/controlEliminarProducto.php?id=<?php //echo $row[0]; ?>">Eliminar</a>-->
                                    </td>
                                </tr>

    <?php
}
?>

                        </table>



                        <a><br><br>Agregar producto</a>
                        <form id="vProducto" name="vProducto" method="POST" action="../negocio/controlAgregarProducto.php">
                            <br>
                            <br>
                            <!--  <label>Código</label>
                              <input type="text" name="codigo" id="anuncio" size="7" maxlength="7"  placeholder="P-00000">-->
                            <br>
                            <br>
                            <label>Fecha</label><br>
                            <input type="date" id="date" name="fecha" class="tcal" value="<?php echo date("d") . "/" . date("m") . "/" . date("Y") ?>" id="anuncio" size="25" maxlength="25" required placeholder="Utilice el calendario">
                            <br>
                            <br>
                            <label>Tipo de producto</label><br>
                            <input type="text" name="tipo" id="anuncio" size="25" maxlength="25"  pattern="[a-zA-ZáéíóúñÁÉÍÓÚÑ]{2,20}" placeholder="Tipo de producto, Solo recibe letras"  required >
                            <br>
                            <a href="imecProducto.php"></a>
                            <br>
                            <label>Nombre de producto</label><br>
                            <input type="text" name="nombre" id="nombre" size="25" maxlength="25" pattern="{2,20}" required placeholder=" Nombre de producto,Tipo de producto, Solo recibe letras">
                            <br>
                            <br>
                            <label>Precio de producto</label><br>
                            <input type="text" name="precio" id="precio" size="25" maxlength="25"  pattern="[0-9]{2,10}" required placeholder="Ingrese precio de producto">
                            <br>
                            <br>


                            <input type="submit" name="agregar" id="agregar" value="Agregar producto nuevo">

                            <input type="reset" name="limpiar" id="limpiar" value="Limpiar">



                        </form>

                        <script>
                            // Metodo para aplicar mascaras        
                            jQuery(function ($) {
                                $("#date").mask("99/99/9999");
                            });
                        </script>
                    </center>
                </div>

            </section>
<?php include '../../Interfaz/aside.php'; ?>
<?php include '../../Interfaz/footer.php'; ?>
        </div>



    </body>
</html>
