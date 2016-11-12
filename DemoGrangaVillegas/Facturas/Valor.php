<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Valor
 *
 * @author Jimmy
 */
class Valor {
   
  
  
  private  $user;
 private $pass ;
 private $db ;
 private $host;
   
   
  public function  Valor(){
     
   $this-> user = "ucrgrupo3";
    $this->pass = "Rtva#Grupo#3";
   $this->db = "ucrgrupo3";
   $this->host="68.178.217.14"; 
                
  }
          
  
  function getUser() {
      return $this->user;
  }

  function getPass() {
      return $this->pass;
  }

  function getDb() {
      return $this->db;
  }

  function getHost() {
      return $this->host;
  }

  function setUser($user) {
      $this->user = $user;
  }

  function setPass($pass) {
      $this->pass = $pass;
  }

  function setDb($db) {
      $this->db = $db;
  }

  function setHost($host) {
      $this->host = $host;
  }



   
}


