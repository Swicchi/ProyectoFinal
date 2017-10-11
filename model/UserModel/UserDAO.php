<?php
require "model/conexionDB.php";
require 'model/UserModel/user.php';
class UserDAO extends conexionDB{

  function addUSer(User $user){
       $this->conectar();
       $consulta = $this->consulta("INSERT INTO `user`( `user`, `password`, `id_userrole`) VALUES ('".$user->getName()."','".$user->getUserPass()."',".$user->getRol().") ");
        $this->disconnect();
       return $consulta;
  }
  function listarUsuarios(){
   
      $this->conectar();
         $sql="SELECT * FROM user NATURAL JOIN userrole;";
         $result= $this->consulta($sql);
         while($row=$this->fetch_assoc($result)){
             $data[]=$row;
            }
        $this->disconnect();
        return $data;
    

  }
  function  deleteUser($id){
      $this->conectar();
      $consulta = $this->consulta("DELETE FROM `user` WHERE id_user ='$id'");
      $this->disconnect();
      return $consulta;
      
  }
   function getUser($id) {
        $this->conectar();
        $query = "SELECT * FROM `user` NATURAL JOIN `userrole` WHERE `id_user` = '$id'";
        $query = $this->consulta($query);
        $tsArray = $this->fetch_assoc($query);
        return $tsArray;
    }
  //conexion a la base de datos
   function editUser(User $user) {
        $this->conectar();
        $query = "UPDATE `user` SET "
                . "`user`='".$user->getName()."',`password`='".$user->getUserPass()."',`id_userrole`=".$user->getRol()." WHERE `id_user` = ".$user->getId();
        $this->consulta($query);
        $this->disconnect();
    }
}