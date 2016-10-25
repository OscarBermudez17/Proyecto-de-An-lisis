<?php

header("Content-type: text/html; charset=utf-8");
error_reporting(0);

require_once('../data/conexion.php');

/**
 * Description of logueo
 *
 * @author michelle
 */
  //$contrasenia;


class imec {
    
 

 public function verProductos()
    {  
                header("Location:../dominio/VerProductos.php");
      
     }
     
     
    public function insertarProducto()
    {
        require '../../Data/ClaseCon.php';   
        
    $codigo = $_POST[codigo];
    
  $codigo="P342348";
    if(strlen($codigo)<=7){
                
            if(strcmp($codigo[0],'P')==0){
                
       $conClase = new ClaseCon(); 
    $numeroGenerado=mt_rand(10000,99999);
    $id_prodcuto='PX'; 
    $id_prodcuto= $id_prodcuto.$numeroGenerado;
    
       
        $sq="insert into productoVenta values('".$id_prodcuto."','".$_POST[fecha]."','".$_POST[tipo]."','".$_POST[nombre]."','".$_POST[precio]."');";
        $result= $conClase->consulta($sq);
        //$rw=mysql_query(conectar::con().$sq);
       // $result = mysql_query($sq);
        
        echo $result;

        header("Location:../dominio/VerProductos.php");
            }else{
                
               echo '<script type="text/javascript">
                alert("El código debe iniciar con la letra P-");
                window.location.assign("http://localhost:5000/DemoGrangaVillegas/Producto/dominio/VerProductos.php");
                </script>';
            }
    }else{
              echo '<script type="text/javascript">
                alert("Código demasiado largo, debe tener como máximo 7 caracteres");
                window.location.assign("http://localhost:5000/DemoGrangaVillegas/Producto/dominio/VerProductos.php");
                </script>';
                
            }
    
    
        
    }
   
            
    
    
    public function eliminarProductoV()
    {
        $id = $_GET[id];
        $sqr="call eliminarProductoVenta('".$id."');";
        $rwr=mysql_query(conectar::con().$sqr);
        $result = mysql_query($sqr);

        echo $result;

        header("Location:../dominio/VerProductos.php");
       
    }
    
    public function modificarProducto()
    {
        
        
          $sqr = "call modificarProductoVenta('".$_POST[codigo]."','".$_POST[fecha]."','".$_POST[tipo]."','".$_POST[nombre]."','".$_POST[precio]."');";
        $rwr = mysql_query(conectar::con().$sqr);
        $result = mysql_query($sqr);

        echo $sqr;
        echo $result;
        
      header("Location:../dominio/VerProductos.php");
    }
    }

?>

        
        

