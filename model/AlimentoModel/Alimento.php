<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Alimento {

    private $id;
    private $alimentoName;
    private $estado;

    function setId($id) {
        $this->id = $id;
    }

    function setName($alimentoName) {
        $this->alimentoName = $alimentoName;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function getEstado() {
        return $this->estado;
    }

    function getId() {
        return $this->id;
    }

    function getName() {
        return $this->alimentoName;
    }

}
