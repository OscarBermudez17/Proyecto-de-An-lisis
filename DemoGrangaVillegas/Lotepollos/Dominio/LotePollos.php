<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose To   private $fechaIngreso;
    private $cantidadPollos;
    private $ubicacion;
    ols | Templates
 * and open the template in the editor.
 */

/**
 * Description of LotePollos
 *
 * @author Jimmy
 */
class LotePollos {
     
    private $fechaIngreso ; 
    private $cantidadPollos ;
    private $ubicacion;
     private $codigo;
    
 
    public function LotePollos($codigo,$fechaIngreso, $cantidadPollos, $ubicacion) {
       $this->  $codigo= $codigo;
        $this->fechaIngreso = $fechaIngreso;
        $this->cantidadPollos = $cantidadPollos;
        $this->ubicacion = $ubicacion;
    }
    
    function getFechaIngreso() {
        return $this->fechaIngreso;
    }

    function getCantidadPollos() {
        return $this->cantidadPollos;
    }

    function getUbicacion() {
        return $this->ubicacion;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function setFechaIngreso($fechaIngreso) {
        $this->fechaIngreso = $fechaIngreso;
    }

    function setCantidadPollos($cantidadPollos) {
        $this->cantidadPollos = $cantidadPollos;
    }

    function setUbicacion($ubicacion) {
        $this->ubicacion = $ubicacion;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }


    
}
