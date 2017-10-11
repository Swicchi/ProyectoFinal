<?php
require "model/conexionDB.php";
require 'model/AlimentoModel/Alimento.php';
class AlimentoDAO extends conexionDB{

  function addAlimento(Alimento $alimento){
       $this->conectar();
       $consulta = $this->consulta("INSERT INTO `alimento`( `nombre`) VALUES ('".$alimento->getName()."') ");
        $this->disconnect();
       return $consulta;
  }
  function listarAlimentos(){
   
      $this->conectar();
         $sql="SELECT * FROM alimento ;";
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
  function  deleteAlimento($id){
      $this->conectar();
      $consulta = $this->consulta("DELETE FROM `alimento` WHERE id_alimento ='$id'");
      $this->disconnect();
      return $consulta;
      
  }
   function getAlimento($id) {
        $this->conectar();
        $query = "SELECT * FROM `alimento`  WHERE `id_alimento` = '$id'";
        $query = $this->consulta($query);
        $tsArray = $this->fetch_assoc($query);
        return $tsArray;
    }
  //conexion a la base de datos
   function editAlimento(Alimento $alimento) {
        $this->conectar();
        $query = "UPDATE `alimento` SET "
                . "`nombre`='".$alimento->getName()."' WHERE `id_alimento` = ".$alimento->getId();
        $this->consulta($query);
        $this->disconnect();
    }
}