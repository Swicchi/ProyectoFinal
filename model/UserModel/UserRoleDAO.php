<?php
require_once "model/conexionDB.php";
require 'model/UserModel/userRole.php';
class UserRoleDAO extends conexionDB{
function listarUserRole() {
        //conexion a la base de datos
        $this->conectar();
         $sql="SELECT * FROM  userrole;";
         $result= $this->consulta($sql);
        
         while($row= $this->fetch_array($result)){
             $userrole=new userRole();
             $userrole->setId($row['id_userrole']);
             $userrole->setName($row['name']);
             $data[]=$userrole;
            }
     
        $this->disconnect();
        return $data;
  }
  

  //conexion a la base de datos
  
}