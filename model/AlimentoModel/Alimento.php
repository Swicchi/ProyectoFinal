<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Alimento  {
    private $id;
    private $alimentoName;
    function setId($id){
        $this->id=$id;
    }
    function setName($alimentoName){
        $this->alimentoName=$alimentoName;
    }
    function getId(){
        return $this->id;
    }
    function getName(){
        return $this->alimentoName;
    }
}