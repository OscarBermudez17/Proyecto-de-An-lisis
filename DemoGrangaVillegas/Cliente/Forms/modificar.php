
<html>
    <head>
        <meta charset="UTF-8">
        <title> Actualizar cliente</title>
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
<?php
 
include('../Data/Database.php');
include ('../Domino/Cliente.php');
include ('../../Data/ClaseCon.php');
     
            if (isset($_GET['cedula']) ){
 
               
                $cedula=$_GET['cedula'];
               
                    
                $con=mysql_connect($host,$user,$pw) or die ("problemas al conectar");
                mysql_select_db($db,$con)or die ("Problemas al conectar la bd");

                $conClase= new ClaseCon();
             
                $selectClientes="select * from cliente where cedula = '$cedula'";
  
               // $resultadoClientes= mysql_query($selectClientes,$con); 
                $resultadoClientes=$conClase->consulta($selectClientes);
                $listaCliente = array();
                $x=0;
              
           while($cliente=mysql_fetch_array($resultadoClientes)){
  
                if ($cliente !=NULL) {
                 $nuevoCliente = new Cliente($cliente['nombre'],$cliente['primerAp'],$cliente['segundoAp'] ,$cliente['cedula'],$cliente['telefono'],$cliente['correo'],$cliente['direccion']);
                    $listaCliente[$x]=$nuevoCliente;
      

?>


        <div align="center">
            <form name= "ModificarUsuario" action = "../Data/modificarCliente.php" method="POST">
           
            <label>Nombre </label>
            <input type = "text" name="nombre" size = "30" value="<?php echo $listaCliente[$x]->getNombre()?> " pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð\S,.'-]{2,32}" placeholder="Nombre, Solo recibe letras sin espacios " required><br>
            
            <label>Primer apellido </label>
            <input type = "text" name="primerAp" size = "30" value="<?php echo $listaCliente[$x]->getPrimerAp()?>" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}" placeholder="Apellido, Solo recibe letras sin espacios " required><br>
            
            <label>Segundo apellido </label>
            <input type = "text" name="segundoAp" size = "30" value="<?php echo $listaCliente[$x]->getSegundoAp()?>" pattern="[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,64}" placeholder="Apellido, Solo recibe letras sin espacios " required><br>
            
            <br><label>Cédula</label>
            <input type = "text" name="cedula" size = "30" value="<?php echo $listaCliente[$x]->getCedula();?>" readonly><br>
            
            <br><label>Número de teléfono</label>
            <input type = "text" name="telefono" size = "30" value=" <?php echo $listaCliente[$x]->getTelefono();?>" pattern="[1-9]{8}" placeholder="Ejemplo: 87654321" required><br>
            
            <br><label>Correo electrónico</label>
            <input type = "text" name="correo" size = "30" value="<?php echo $listaCliente[$x]->getCorreo();?>" placeholder="Ejemplo: user@granjafamvillegas.com"><br>
            
            <br><label>Dirección</label>
            <input type = "text" name="direccion" size = "30" value="<?php echo $listaCliente[$x]->getDireccion();?>" placeholder="Ejemplo: 100 mts sur , casa de color verde ..."><br>
            
            <br>
            <input type="submit"  value="Modificar cliente"/>
            <input type="reset"> 
             <br>
            
            
        </form>  
            </div>
    <?php
   
    }else{
        echo "Problemas al obtener datos"; 
     
         }
     }
  }
     ?>
               </div>
             </section>
            <?php include '../../Interfaz/aside.php'; ?>
            <?php include '../../Interfaz/footer.php'; ?>
	</div> 
   </body>
</html>