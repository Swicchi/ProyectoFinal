<?php
require_once "model/conexionDB.php";
require 'model/UserModel/User.php';
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
           if ($this->count_filas($result) > 0) { 
         while($row=$this->fetch_assoc($result)){
             $user= new User();
             $user->setId($row['id_user']);
             $user->setName($row['user']);
             $userrole= new userRole();
             $userrole->setId($row['id_userrole']);
             $userrole->setName($row['name']);
             $user->setRol($userrole);
             $user->setUserPass($row['password']);
             $data[]=$user;
            }
        $this->disconnect();
      
        return $data;
        }else{
            return '';
        }
    

  }
  function  deleteUser(User $user){
      $this->conectar();
      $consulta = $this->consulta("DELETE FROM `user` WHERE id_user ='".$user->getId()."'");
      $this->disconnect();
      return $consulta;
      
  }
   function getUser(User $user) {
        $this->conectar();
        $query = "SELECT * FROM `user` NATURAL JOIN `userrole` WHERE `id_user` = '".$user->getId()."'";
        $result = $this->consulta($query);
        $tsArray = $this->fetch_assoc($result);
         
             $user->setId($tsArray['id_user']);
             $user->setName($tsArray['user']);
             $userrole= new userRole();
             $userrole->setId($tsArray['id_userrole']);
             $userrole->setName($tsArray['name']);
             $user->setRol($userrole);
             $user->setUserPass($tsArray['password']);
             $this->disconnect();
        return $user;
    }
  //conexion a la base de datos
   function editUser(User $user) {
        $this->conectar();
        $query = "UPDATE `user` SET "
                . "`user`='".$user->getName()."',`password`='".$user->getUserPass()."',`id_userrole`=".$user->getRol()." WHERE `id_user` = ".$user->getId();
       $consulta= $this->consulta($query);
        $this->disconnect();
        return $consulta;
    }
     function getLoginUser(User $user) {
        $this->conectar();
        $query = "SELECT * FROM `user` NATURAL JOIN `userrole` WHERE `user` = '".$user->getName()."' and password  = '".$user->getUserPass()."'";
        $result = $this->consulta($query);
         if ($this->count_filas($result) == 1) { 
        $tsArray = $this->fetch_assoc($result);
         
             $user->setId($tsArray['id_user']);
             $user->setName($tsArray['user']);
             $userrole= new userRole();
             $userrole->setId($tsArray['id_userrole']);
             $userrole->setName($tsArray['name']);
             $user->setRol($userrole);
             $user->setUserPass($tsArray['password']);
             
        return $user;
         } else {
         return '';    
         }
    }
}