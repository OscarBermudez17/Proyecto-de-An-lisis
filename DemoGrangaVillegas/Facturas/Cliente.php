<?php


class Cliente {
    private $nombre;
    private $cedula;
    private $telefono;
    
    public function Cliente($nombre,$cedula,$telefono){
        $this->nombre=$nombre;
        $this->cedula=$cedula;
        $this->telefono=$telefono;
        
    }
    function getNombre() {
        return $this->nombre;
    }

    function getCedula() {
        return $this->cedula;
    }

    function getTelefono() {
        return $this->telefono;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    function setTelefono($telefono) {
        $this->telefono = $telefono;
    }


}
