<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Jimmy
 */
class Usuario {
   private $nombre;
   private $contrasena;
   
   public function Usuario($nombre, $contraseña) {
       $this->nombre = $nombre;
       $this->contraseña = $contraseña;
   }
   public function getNombre() {
       return $this->nombre;
   }

  

   public function setNombre($nombre) {
       $this->nombre = $nombre;
   }

   public function getContrasena() {
       return $this->contrasena;
   }

   public function setContrasena($contrasena) {
       $this->contrasena = $contrasena;
   }




}
