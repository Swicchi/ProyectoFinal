<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Bebida  {
    private $id;
    private $bebidaName;
    private $precio;
    private $detalle;
    function setId($id){
        $this->id=$id;
    }
    function setName($bebidaName){
        $this->bebidaName=$bebidaName;
    }
    function getId(){
        return $this->id;
    }
    function getName(){
        return $this->bebidaName;
    }
    function getPrecio() {
        return $this->precio;
    }

    function getDetalle() {
        return $this->detalle;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setDetalle($detalle) {
        $this->detalle = $detalle;
    }


}