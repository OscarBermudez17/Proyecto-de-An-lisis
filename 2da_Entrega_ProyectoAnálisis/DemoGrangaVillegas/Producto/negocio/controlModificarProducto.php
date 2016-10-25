<?php

/**
 * Description of logueo
 *
 * @author michelle
 */
//echo "Llega a logueo<br>";

require_once('../dominio/imecProducto.php');

// echo "Llega a control eliminar";
//echo "Va hacia docentes<br>";
$obj=new imec();
//echo "Va para el metodo de logueo que está en logueoC<br>";
$obj->modificarProducto();
