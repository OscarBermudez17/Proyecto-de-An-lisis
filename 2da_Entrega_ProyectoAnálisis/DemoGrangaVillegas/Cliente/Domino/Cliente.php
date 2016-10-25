<?php


class Cliente {
    
    private $nombre;
    private $cedula;
    private $telefono;
    private $direccion;
    private $correo;
    private $primerAp;
    private $segundoAp;
    
    
            
    public function Cliente($nombre,$primerAp,$segundoAp,$cedula,$telefono,$correo,$direccion){
        
        $this->nombre=$nombre;
        $this->cedula=$cedula;
        $this->telefono=$telefono;
        $this->correo=$correo;
        $this->direccion=$direccion;
        $this->primerAp=$primerAp;
        $this->segundoAp=$segundoAp;
    }
    
    function getPrimerAp() {
        return $this->primerAp;
    }

    function getSegundoAp() {
        return $this->segundoAp;
    }

    function setPrimerAp($primerAp) {
        $this->primerAp = $primerAp;
    }

    function setSegundoAp($segundoAp) {
        $this->segundoAp = $segundoAp;
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

    function getDireccion() {
        return $this->direccion;
    }

    function getCorreo() {
        return $this->correo;
    }

    function setDireccion($direccion) {
        $this->direccion = $direccion;
    }

    function setCorreo($correo) {
        $this->correo = $correo;
    }


}
