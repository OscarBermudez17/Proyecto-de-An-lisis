<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Factura
 *
 * @author Jimmy
 */
class Factura {

private $fecha ; 
private $total ;
private $totaldeDias;
private $fechaActual;
 private $SuiguientePago ; 

public function Factura($fecha,$total,$SuiguientePago) {
    
    $this->fecha=$fecha;
    $this->total=$total;
   $this->SuiguientePago=$SuiguientePago;
   
    
}
function getSuiguientePago() {
    return $this->SuiguientePago;
}

function setSuiguientePago($SuiguientePago) {
    $this->SuiguientePago = $SuiguientePago;
}


function getFecha() {
    return $this->fecha;
}

function getTotal() {
    return $this->total;
}

function getTotaldeDias() {
    return $this->totaldeDias;
}

function getFechaActual() {
    return $this->fechaActual;
}

function setFecha($fecha) {
    $this->fecha = $fecha;
}

function setTotal($total) {
    $this->total = $total;
}

function setTotaldeDias($totaldeDias) {
    $this->totaldeDias = $totaldeDias;
}

function setFechaActual($fechaActual) {
    $this->fechaActual = $fechaActual;
}

 




}
