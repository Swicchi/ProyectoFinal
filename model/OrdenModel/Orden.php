<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Orden  {
    private $numero;
    private $horaCreacion;
    private $horaPreparacion;
    private $horaEntrega;
    private $tipo;
    private $mesa;
    private $estado;
    private $plato;
    private $bebida;
    function getNumero() {
        return $this->numero;
    }

    function getHoraCreacion() {
        return $this->horaCreacion;
    }

    function getHoraPreparacion() {
        return $this->horaPreparacion;
    }

    function getHoraEntrega() {
        return $this->horaEntrega;
    }

    function getTipo() {
        return $this->tipo;
    }

    function getMesa() {
        return $this->mesa;
    }

    function getPlato() {
        return $this->plato;
    }

    function getBebida() {
        return $this->bebida;
    }
 function getEstado() {
        return $this->estado;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }
    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setHoraCreacion($horaCreacion) {
        $this->horaCreacion = $horaCreacion;
    }

    function setHoraPreparacion($horaPreparacion) {
        $this->horaPreparacion = $horaPreparacion;
    }

    function setHoraEntrega($horaEntrega) {
        $this->horaEntrega = $horaEntrega;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setMesa($mesa) {
        $this->mesa = $mesa;
    }

    function setPlato($plato) {
        $this->plato = $plato;
    }

    function setBebida($bebida) {
        $this->bebida = $bebida;
    }




}