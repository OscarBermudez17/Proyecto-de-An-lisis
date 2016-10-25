<html>
    <head>
        <meta charset="UTF-8">
        <title> Cliente</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=divice-width, user-scalable=no, initial-scale=1.0,maximum-scale=1.0, minimum-scale=1.0"/>
        <script src="prefix.js"></script>
        <link rel="stylesheet" href="../../css/estilos.css">
        
    </head>
    <body>
        <div class="contenedor">
            <?php  include '../../Interfaz/header.php'; ?>    
            
            <section class="main"> 
                <div class="formulario">
                
             <center>
                    <p id="titulo">Buscar clientes</p><br>

                    <a href ="agregarCliente.php">Agregar cliente</a>
                                    <?php
                                    function MiFunction (){
                                        echo 'Mensaje';
                                    }
                                    ?>

                                    <form  method="post" action="verClientes.php"  enctype="multipart/form-data">
                                                <div align="center"><br/>
                                                    Nombre:   
                                                    <br/><input type="text"  name="nombre" width="300px"/>
                                                    <input type="hidden"  name="primerAp" width="300px"/>
                                                    <input type="hidden"  name="segundoAp" width="300px"/><br/>
                                                    
                                                    Cédula:<br/><input type="text" name="cedula"/><br/>
                                                    <input type="submit" value="Buscar"/>
                                                </div>
                                     </form>  

                                    <?php
                                              //include ("../Data/Database.php");
                                              include ("../Domino/Cliente.php");
                                             // require('../../DataConsultas.php');
                                              require '../../Data/ClaseCon.php';
                                              

                                            if (isset($_POST['nombre'])  || isset($_POST['primerAp'])){
                                                $nombre=$_POST['nombre'];
                                                $cedula=(int)$_POST['cedula'];
                                                $primerAp=$_POST['primerAp'];
                                                $segundoAp=$_POST['segundoAp'];
                                            }else{
                                             
                                                $nombre='';
                                                $cedula=0000;
                                                $primerAp='';
                                                $segundoAp='';
                                            }
                                                try {
                                                echo'nombre '.$nombre;
                                                echo'Apellido '.$primerAp;
                                               
                                                
                                              //  $con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
                                               // mysql_select_db($db,$con)or die ("Problemas al conectar la bd");

                                                //$select="call buscar_deudas('".$_POST['nombre']."', '".$_POST['cedula']."');";

                                               // $nombre=$_POST['nombre'];
                                               // $cedula=$_POST['cedula'];

                                              
                                //-----------------------OBTENER LISTA DE CLIENTES-------------------------------------------------------------------------------
                                       //$stringSql="call buscar_Todos_Clientes('".$nombre."','".$primerAp."','".$segundoAp."',".$cedula.");";
                                              //$dConsultaBase= new DataConsultaBD();  
                                        $selectClientes="call buscar_Todos_Clientes('".$nombre."','".$primerAp."','".$segundoAp."',".$cedula.");";

                                      //  $resultadoClientes= mysql_query($selectClientes,$con); 
                                      // $resultadoClientes=consulta($selectClientes);
                                       $con= new ClaseCon();
                                            $resultadoClientes= $con->consulta($selectClientes);
                                      
                                        $listaCliente = array();
                                        $x=0;
                                    ?>
                                    <div align="center">
                                        <table border="3px" cellpadding="20px" >

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
                                   while($cliente=mysql_fetch_array($resultadoClientes)){

                                    if ($cliente !=NULL) {
                                          $nuevoCliente = new Cliente($cliente['nombre'],$cliente['primerAp'],$cliente['segundoAp'], $cliente['cedula'],$cliente['telefono'],$cliente['correo'],$cliente['direccion']);
                                          $listaCliente[$x]=$nuevoCliente;
                                    ?>
                                           <tr>     
                                               <td  WIDTH="300" > <?php echo $listaCliente[$x]->getNombre().' '.$listaCliente[$x]->getPrimerAp().' '.$listaCliente[$x]->getSegundoAp()?></td>
                                               <td> <?php echo $listaCliente[$x]->getCedula();?></td>
                                               <td> <?php echo $listaCliente[$x]->getTelefono();?></td>
                                               <td> <?php echo $listaCliente[$x]->getCorreo();?></td>
                                               <td> <?php echo $listaCliente[$x]->getDireccion();?></td>
                                               <td> <a href="modificar.php?cedula=<?php echo $listaCliente[$x]->getCedula();?>">Editar</a></td>
                                               <td> <a href="../Data/eliminar.php?cedula=<?php echo $listaCliente[$x]->getCedula();?>">Eliminar</a></td>
                                           </tr>
                                    <?php      
                                    $x++;
                                    }else{
                                        echo "Problemas al obtener datos"; 
                                         }
                                     }
                                  //---------------------------------------------------------------------------------------------------------------
                                ?>
                            </table> 
                                  </div>
                                  <?php
                                    }  catch (Exception $e){
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
