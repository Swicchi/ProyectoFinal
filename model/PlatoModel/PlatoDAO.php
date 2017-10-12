<?php
require "model/conexionDB.php";
require 'model/PlatoModel/Plato.php';
class UserDAO extends conexionDB{

  function addPlato(Plato $plato){
       $this->conectar();
       $consulta = $this->consulta("INSERT INTO `plato`( `nombre`, `precio`, `id_tipoplato`) VALUES ('".$plato->getName()."','".$plato->getUserPass()."',".$plato->getRol().") ");
        $this->disconnect();
       return $consulta;
  }
  function listarUsuarios(){
   
      $this->conectar();
         $sql="SELECT * FROM plato NATURAL JOIN tipoplato;";
         $result= $this->consulta($sql);
           if ($this->count_filas($result) > 0) { 
         while($row=$this->fetch_assoc($result)){
             $data[]=$row;
            }
        $this->disconnect();
      
        return $data;
        }else{
            return '';
        }
    

  }
  function  deleteUser($id){
      $this->conectar();
      $consulta = $this->consulta("DELETE FROM `plato` WHERE id_plato ='$id'");
      $this->disconnect();
      return $consulta;
      
  }
   function getUser($id) {
        $this->conectar();
        $query = "SELECT * FROM `plato` NATURAL JOIN `tipoplato` WHERE `id_plato` = '$id'";
        $query = $this->consulta($query);
        $tsArray = $this->fetch_assoc($query);
        return $tsArray;
    }
  //conexion a la base de datos
   function editUser(Plato $plato) {
        $this->conectar();
        $query = "UPDATE `plato` SET "
                . "`nombre`='".$plato->getName()."',`precio`='".$plato->getUserPass()."',`id_tipoplato`=".$plato->getRol()." WHERE `id_plato` = ".$plato->getId();
        $this->consulta($query);
        $this->disconnect();
    }
}