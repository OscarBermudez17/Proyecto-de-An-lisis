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
                header("Location:../dominio/VerProductosMantenimiento.php");
      
     }
     
     
    public function insertarProducto()
    {
          
        
    $codigo = 0;
    
   
        $sq="insert into medicamento values('".$codigo."','".$_POST[nombre]."','".$_POST[descripcion]."');";
        $rw=mysql_query(conectar::con().$sq);
        $result = mysql_query($sq);
        
        echo $result;

        header("Location:../dominio/VerProductosMantenimiento.php");
        
    }
   
            
    
    
    public function eliminarProducto()
    {
        
        
        
        
        echo '<script>

if(confirm("Esta seguro"))
document.location.href="si.html";
else
document.location.href="no.html";

</script>';
        
        
        
        $id = $_GET[id];
        $sqr="call eliminarMedicamento('".$id."');";
        $rwr=mysql_query(conectar::con().$sqr);
        $result = mysql_query($sqr);

        echo $result;

        header("Location:../dominio/VerProductosMantenimiento.php");
       
    }
    
    public function modificarProducto()
    {
        
        
          $sqr = "call modificarMedicamento('".$_POST[codigo]."','".$_POST[nombre]."','".$_POST[descripcion]."');";
        $rwr = mysql_query(conectar::con().$sqr);
        $result = mysql_query($sqr);

        echo $sqr;
        echo $result;
        
      header("Location:../dominio/VerProductosMantenimiento.php");
    }
    }

?>

        
        


