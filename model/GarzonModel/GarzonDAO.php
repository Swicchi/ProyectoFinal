<?php

require_once "model/conexionDB.php";
require 'model/GarzonModel/Garzon.php';


class GarzonDAO extends conexionDB {

    function addGarzon(Garzon $garzon) {
        $this->conectar();
        $consulta = $this->consulta("INSERT INTO `garzon`( `rut`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `sueldo`, `direccion`, `telefono`,`id_user`)  VALUES ( '" . $garzon->getRut() . "' , '" . $garzon->getNombre() . "', '" . $garzon->getApellidoP() . "', '" . $garzon->getApellidoM() . "', " . $garzon->getSueldo() . ", '" . $garzon->getDireccion() . "', " . $garzon->getTelefono() . ", " . $garzon->getUser()->getId() . "  ) ");
        $this->disconnect();
        return $consulta;
    }

    function listarGarzones() {
        $this->conectar();
        $sql = "SELECT * FROM garzon ;";
        $result = $this->consulta($sql);
        if ($this->count_filas($result) > 0) {
            while ($row = $this->fetch_assoc($result)) {
                $garzon = new Garzon();
                $garzon->setId($row['id_garzon']);
                $garzon->setRut($row['rut']);
                $garzon->setNombre($row['nombre']);
                $garzon->setApellidoP($row['apellidoPaterno']);
                $garzon->setApellidoM($row['apellidoMaterno']);
                $garzon->setSueldo($row['sueldo']);
                $garzon->setTelefono($row['telefono']);
                $garzon->setDireccion($row['direccion']);
                $garzon->setUser($this->getUser($row['id_user']));
                $data[] = $garzon;
            }
            $this->disconnect();
            return $data;
        } else { return''; }
    }
     function getUser($id) {
        $this->conectar();
        $query = "SELECT * FROM `user` WHERE `id_user` = '".$id."'";
        $result = $this->consulta($query);
        $tsArray = $this->fetch_assoc($result);
            $user= new User();
             $user->setId($tsArray['id_user']);
             $user->setName($tsArray['user']);
             $user->setUserPass($tsArray['password']);
             $this->disconnect();
        return $user;
    }

    function deleteGarzon(Garzon $garzon) {
        $this->conectar();
        $consulta = $this->consulta("DELETE FROM `garzon` WHERE id_garzon ='" . $garzon->getId() . "'");
        $this->disconnect();
        return $consulta;
    }
    function getGarzon(Garzon $garzon) {
        $this->conectar();
        $query = "SELECT * FROM `garzon`  WHERE `id_garzon` = '" . $garzon->getId() . "'";
        $result = $this->consulta($query);
        $tsArray = $this->fetch_assoc($result);
        $garzon->setId($tsArray['id_garzon']);
        $garzon->setRut($tsArray['rut']);
        $garzon->setNombre($tsArray['nombre']);
        $garzon->setApellidoP($tsArray['apellidoPaterno']);
        $garzon->setApellidoM($tsArray['apellidoMaterno']);
        $garzon->setSueldo($tsArray['sueldo']);
        $garzon->setTelefono($tsArray['telefono']);
        $garzon->setDireccion($tsArray['direccion']);
        $garzon->setUser($this->getUser($tsArray['id_user']));
        $this->disconnect();
        return $garzon;
    }

    //conexion a la base de datos
    function editGarzon(Garzon $garzon) {
        $this->conectar();
        $query = "UPDATE `garzon` SET "
                . "`rut`='" . $garzon->getRut() . "',`nombre`='" . $garzon->getNombre() . "',`apellidoPaterno`='" . $garzon->getApellidoP() . "',"
                . "`apellidoMaterno`='" . $garzon->getApellidoM() . "'"
                . ",`id_user`=" . $garzon->getUser()->getId() . ","
                . "`telefono`=" . $garzon->getTelefono() . ","
                . "`sueldo`=" . $garzon->getSueldo() . ","
                . "`direccion`='" . $garzon->getDireccion() . "' WHERE `id_garzon` = " . $garzon->getId();
        $consulta= $this->consulta($query);
        $this->disconnect();
        return $consulta;
    }

}
