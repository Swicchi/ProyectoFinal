<?php
require_once "model/conexionDB.php";
require_once 'model/UserModel/userRole.php';
class UserDAO extends conexionDB{
function getUserRole() {
        //conexion a la base de datos
        $this->conectar();
        $query = $this->consulta("SELECT * FROM `userrole`");
        $userRole = new userRole();
        if ($this->count_filas($query) > 0) { // existe -> datos correctos
            //se llenan los datos en un array
            while ($tsArray = $this->fetch_assoc($query))
                    
                    $userRole->setId($tsArray['id_userrole']);
                    $userRole->setName($tsArray['name']);
                    $data[] = $userRole;

            return $data;
        } else {
            return '';
        }

        $this->disconnect();
  }
  function addUSer(User $user){
       $this->conectar();
       return $this->consulta("INSERT INTO `user`( `user`, `password`, `id_userrole`) VALUES ('".$user->getName()."','".$user->getUserPass()."',".$user->getRol().") ");
      
  }

  //conexion a la base de datos
  
}