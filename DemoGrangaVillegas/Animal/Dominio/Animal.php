<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Animal
 *
 * @author oscar
 */
class Animal {
   
    private $nombreIdentificador;
    private $fechaIngreso;
    private $idAnimal;
    private $tipoAnimal;
    private $proposito;
    private $sexo;
    private $raza;
    
    public function Animal ($nombreIdentificador,$fechaIngreso,$idAnimal,$tipoAnimal,$proposito,$sexo,$raza){
        
        $this->fechaIngreso=$fechaIngreso;
        $this->idAnimal=$idAnimal;
        $this->nombreIdentificador=$nombreIdentificador;
        $this->proposito=$proposito;
        $this->raza=$raza;
        $this->sexo=$sexo;
        $this->tipoAnimal=$tipoAnimal;
        
    }
    

    function getNombreIdentificador() {
        return $this->nombreIdentificador;
    }

    function getFechaIngreso() {
        return $this->fechaIngreso;
    }

    function getIdAnimal() {
        return $this->idAnimal;
    }

    function getTipoAnimal() {
        return $this->tipoAnimal;
    }

    function getProposito() {
        return $this->proposito;
    }

    function getSexo() {
        return $this->sexo;
    }

    function getRaza() {
        return $this->raza;
    }

    function setNombreIdentificador($nombreIdentificador) {
        $this->nombreIdentificador = $nombreIdentificador;
    }

    function setFechaIngreso($fechaIngreso) {
        $this->fechaIngreso = $fechaIngreso;
    }

    function setIdAnimal($idAnimal) {
        $this->idAnimal = $idAnimal;
    }

    function setTipoAnimal($tipoAnimal) {
        $this->tipoAnimal = $tipoAnimal;
    }

    function setProposito($proposito) {
        $this->proposito = $proposito;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function setRaza($raza) {
        $this->raza = $raza;
    }


    
}
