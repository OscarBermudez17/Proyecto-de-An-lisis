<?php
require_once('../data/conexion.php');




$mcodigo = $_GET['id'];
$consulta = "Select * from productoVenta where codigo='" . $mcodigo . "';";
$link = mysql_query(conectar::con() . $consulta);

$result = mysql_query("Select * from productoVenta where codigo='" . $mcodigo . "';" . $link);
$row = mysql_fetch_row($result);
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Actualizar producto</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=divice-width, user-scalable=no, initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0"/>
        <script src="prefix.js"></script>
        <link rel="stylesheet" href="../../css/estilos.css">
    </head>

    <body>
        <div class="contenedor">
<?php include '../../Interfaz/header.php'; ?>    

            <section class="main"> 
                <div class="formulario">

                    <center>

                        <a><br><br>Actualizar producto</a>
                        <form id="mProducto" name="mProducto" method="POST" action="../negocio/controlModificarProducto.php">

                            <br>
                            <br>
                            <label>Código del producto</label>
                            <input type="text" name="codigo" id="codigo" size="70" maxlength="80" readonly="readonly" value="<?php echo "$row[0]" ?>">
                            <br>
                            <br>
                            <label>Fecha </label>
                            <input type="text" name="fecha" id="fecha" size="70" maxlength="80"   value="<?php echo "$row[1]" ?>"  readonly>
                            <br>
                            <br>
                            <label>Tipo de producto</label>
                            <input type="text" name="tipo" id="tipo" size="70" maxlength="80" pattern="[a-zA-ZáéíóúñÁÉÍÓÚÑ]{2,20}" placeholder="Tipo de producto, Solo recibe letras" required value="<?php echo "$row[2]" ?>">
                            <br>
                            <br>
                            <label>Nombre de producto</label>
                            <input type="text" name="nombre" id="nombre" size="70" maxlength="80"  pattern="{2,20}" placeholder="Nombre de producto, Solo recibe letras" required value="<?php echo "$row[3]" ?>">
                            <br>
                            <br>
                            <label>Precio de producto</label>
                            <input type="text" name="precio" id="precio" size="70" maxlength="80"  pattern="[0-9]{2,9}" placeholder="Nombre, Solo recibe letras" required value="<?php echo "$row[4]" ?>">
                            <br>
                            <br>
                            <table>
                                <tr>
                                    <td>
                                        <input type="submit" name="agregar" id="agregar" value="Modificar producto nuevo">
                                    </td>
                                    <td>
                                        <input type="reset" name="limpiar" id="limpiar" value="Limpiar">
                                    </td>
                                </tr>
                            </table>
                            <br>
                            <br>

                        </form>

                    </center>
                </div>
            </section>

<?php include '../../Interfaz/aside.php'; ?>
<?php include '../../Interfaz/footer.php'; ?>
        </div>                        
    </body>

</html>



