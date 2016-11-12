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
    <body style="background: white">
        <div class="main">
            <center>
                <?php
                 include ('../Data/Databases.php');
                 include ('../Dominio/LotePollos.php');

                 $con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
                  mysql_select_db($db,$con)or die ("Problemas al conectar la bd");

                  $select="select *from lotepollos";

             $resultado= mysql_query($select,$con); 

        $listaLotes = array();
        $x=0;
        ?>
                <table class="tabla" border="3px" cellpadding="20px">

                     <tr>
                            <th>Fecha inicio del Lote</th>
                            <th>Cantidad de pollos</th>
                            <th>Número de lote</th>
                     </tr>


          <?php
        $Eliminar="Eliminar";

        while($lote=mysql_fetch_array($resultado)){

            if ($lote !=NULL) {

            $nuevolote = new LotePollos($lote['codigo'],$lote['fechaIngreso'],$lote['cantidad'],$lote['numeroLotePollos']);


            $listaLotes[$x]=$nuevolote;
            ?>
                   <!--  <script> alert("Nuevo Lote de pollos ingresado correctamente");</script> -->

                     <tr>     
                       <td> <?php echo $listaLotes[$x]->getFechaIngreso();?></td>
                       <td> <?php echo $listaLotes[$x]->getCantidadPollos();?></td>
                       <td> <?php echo $listaLotes[$x]->getUbicacion();?></td>
                       
                   </tr>
                   <?php

            $x++;
            } 


        }



                ?>
            </table> 
        </center>
        </div>
    </body>
</html>
