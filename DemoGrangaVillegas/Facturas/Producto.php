<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Producto
 *
 * @author Jimmy
 */
class Producto {
    
   private $codigo;
   private $nombre;
   private $precio;
   
     public function Producto($codigo,$nombre,$precio){
         $this->codigo=$codigo;
         $this->nombre=$nombre;
         $this->precio=$precio;
     }
     function getCodigo() {
         return $this->codigo;
     }

     function getNombre() {
         return $this->nombre;
     }

     function setCodigo($codigo) {
         $this->codigo = $codigo;
     }

     function setNombre($nombre) {
         $this->nombre = $nombre;
     }
     function getPrecio() {
         return $this->precio;
     }

     function setPrecio($precio) {
         $this->precio = $precio;
     }




}
