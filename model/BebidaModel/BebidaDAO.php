<?php
require "model/conexionDB.php";
require 'model/BebidaModel/Bebida.php';
class BebidaDAO extends conexionDB{

  function addBebida(Bebida $bebida){
       $this->conectar();
       $consulta = $this->consulta("INSERT INTO `bebestible`( `nombre`, `detalle`, `precio`)  VALUES ( '".$bebida->getName()."' , '".$bebida->getDetalle()."', ".$bebida->getPrecio()." ) ");
        $this->disconnect();
       return $consulta;
  }
  function listarBebidas(){
   
      $this->conectar();
         $sql="SELECT * FROM bebestible ;";
         $result= $this->consulta($sql);
         if ($this->count_filas($result) > 0) { 
       
         while($row=$this->fetch_assoc($result)){
             $data[]=$row;
            }
        $this->disconnect();
       
        return $data;
        }else{
            return'';
        }
    

  }
  function  deleteBebida($id){
      $this->conectar();
      $consulta = $this->consulta("DELETE FROM `bebestible` WHERE id_bebestible ='$id'");
      $this->disconnect();
      return $consulta;
      
  }
   function getBebida($id) {
        $this->conectar();
        $query = "SELECT * FROM `bebestible`  WHERE `id_bebestible` = '$id'";
        $query = $this->consulta($query);
        $tsArray = $this->fetch_assoc($query);
        return $tsArray;
    }
  //conexion a la base de datos
   function editBebida(Bebida $bebida) {
        $this->conectar();
        $query = "UPDATE `bebestible` SET "
                . "`nombre`='".$bebida->getName()."',`precio`=".$bebida->getPrecio().",`detalle`='".$bebida->getDetalle()."' WHERE `id_bebestible` = ".$bebida->getId();
        $this->consulta($query);
        $this->disconnect();
    }
}