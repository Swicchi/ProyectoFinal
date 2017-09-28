<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User  {
    private $id;
    private $userName;
    private $userPass;
    private $id_role;
    function setId($id){
        $this->id=$id;
    }
    function setName($userName){
        $this->userName=$userName;
    }
    function getId(){
        return $this->id;
    }
    function getName(){
        return $this->userName;
    } 
    function setUserPass($userPass){
        $this->userPass=$userPass;
    }
    function getUserPass(){
        return $this->userPass;
    }
    function setRol($id_role){
        $this->id_role=$id_role;
    }
    function getRol(){
        return $this->id_role;
    }
}