<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Mesa  {
    private $id;
    private $asientos;
    private $codigo;
    private $numero;
    private $garzon;
    function getId() {
        return $this->id;
    }

    function getAsientos() {
        return $this->asientos;
    }

    function getCodigo() {
        return $this->codigo;
    }

    function getNumero() {
        return $this->numero;
    }

    function getGarzon() {
        return $this->garzon;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setAsientos($asientos) {
        $this->asientos = $asientos;
    }

    function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setGarzon($garzon) {
        $this->garzon = $garzon;
    }


}