<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Plato  {
    private $id;
    private $nombre;
    private $precio;
    private $id_tipo;
    private $ingredientes;
    private $image;
    private $noingredientes;
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getPrecio() {
        return $this->precio;
    }

    function getId_tipo() {
        return $this->id_tipo;
    }

    function getIngredientes() {
        return $this->ingredientes;
    }
     function getnoIngredientes() {
        return $this->noingredientes;
    }
  function getImage() {
        return $this->image;
    }

    function setImage($image) {
        $this->image = $image;
    }
    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setPrecio($precio) {
        $this->precio = $precio;
    }

    function setId_tipo($id_tipo) {
        $this->id_tipo = $id_tipo;
    }

    function setIngredientes($ingredientes) {
        $this->ingredientes = $ingredientes;
    }
    function setnoIngredientes($noingredientes) {
        $this->noingredientes = $noingredientes;
    }



}