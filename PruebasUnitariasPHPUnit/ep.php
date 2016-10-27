		<?php

class Empleado extends PHPUnit_Framework_TestCase{

	public $nombre;
	public $salario;

			public function __construct($nombre,$salario){
			
				$this->nombre=$nombre;
				$this->salario=$salario;

			}

			public function testgetNombre(){
			
				return $this->nombre;
			}

			public function testgetSalario(){
			
			return $this->salario;

			}

}
$NuevoEmpleado= new Empleado("Marcos",200);
echo "Empleado  1<br>";
$res=$NuevoEmpleado->testgetNombre();
echo "$res <br>";
$res=$NuevoEmpleado->testgetSalario();
echo "$res <br>";



?>