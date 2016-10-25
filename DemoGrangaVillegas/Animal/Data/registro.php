<?php

include ('./Conexion.php');
require ('../../Data/ClaseCon.php');


if (isset($_POST['date']) && !empty($_POST['date']) && isset($_POST['nombre'])) {


    $ingreso = $_POST["date"];
    $sexo = $_POST['sexo'];
    $nombre = $_POST["nombre"];
    $raza = $_POST["raza"];
    $proposito = $_POST["proposito"];
    $tipo = $_POST['tipo'];

    $numeroGenerado = mt_rand(10000, 99999);
    $id_animal = 'A';
    $id_animal = $id_animal . substr($tipo, 0, 1);
    echo 'tipo 2 ' . $tipo;
    $id_animal = $id_animal . $numeroGenerado;

    $con = mysql_connect($host, $user, $pass) or die("problemas al conectar");
    mysql_select_db($db, $con)or die("Problemas al conectar la bd");

    $consulta="call insertar_Animal('" . $ingreso . "','" . $sexo . "','" . $tipo . "','" . $id_animal . "','" . $proposito . "','" . $nombre . "','" . $raza . "');";
    $claseCon = new ClaseCon();
    $claseCon->consulta($consulta);
//call insertar_Animal('08-07-2000','Macho','Porcino','AP00001','carne','barraco blanco','landar');
   // mysql_query("call insertar_Animal('" . $ingreso . "','" . $sexo . "','" . $tipo . "','" . $id_animal . "','" . $proposito . "','" . $nombre . "','" . $raza . "');", $con);

    echo "Datos insertados correctamente";


    echo "<a href='http://localhost:5000/DemoGrangaVillegas/Animal/Forms/BuscarAnimal.php'>Aceptar </a>";
} else {
    echo "Problemas al insertar datos";
}
?>