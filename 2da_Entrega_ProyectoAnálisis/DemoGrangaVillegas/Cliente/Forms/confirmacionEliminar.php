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
        <?php
        
        ?>
        
        <form method="Post" action="../Data/eliminar.php">
            <input type="hidden" value="" <?php echo''.$_GET['id']?> name="id" />
            <input type="submit" value="Continuar"/>
            <input type="button" onclick="" value="Cancelar"/>
        </form>
    </body>
</html>
