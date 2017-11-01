<?php
require_once "model/conexionDB.php";
require 'model/PlatoModel/TipoPlato.php';
class TipoPlatoDAO extends conexionDB{
function listarTipoPlato() {
        //conexion a la base de datos
         $this->conectar();
         $sql="SELECT * FROM  tipoplato;";
         $result= $this->consulta($sql);
        
         while($row= $this->fetch_array($result)){
             $tipoplato= new TipoPlato();
             $tipoplato->setId($row['id_tipoplato']);
             $tipoplato->setName($row['nombre_tipo']);
             $data[]=$tipoplato;
            }
     
        $this->disconnect();
        return $data;
  }
  

  //conexion a la base de datos
  
}