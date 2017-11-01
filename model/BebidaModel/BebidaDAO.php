<?php

require "model/conexionDB.php";
require 'model/BebidaModel/Bebida.php';

class BebidaDAO extends conexionDB {

    function addBebida(Bebida $bebida) {
        $this->conectar();
        $consulta = $this->consulta("INSERT INTO `bebestible`( `nombre`, `detalle`, `precio`)  VALUES ( '" . $bebida->getName() . "' , '" . $bebida->getDetalle() . "', " . $bebida->getPrecio() . " ) ");
        $this->disconnect();
        return $consulta;
    }

    function listarBebidas() {

        $this->conectar();
        $sql = "SELECT * FROM bebestible ;";
        $result = $this->consulta($sql);
        if ($this->count_filas($result) > 0) {

            while ($row = $this->fetch_assoc($result)) {
                $bebida = new Bebida();
                $bebida->setId($row['id_bebestible']);
                $bebida->setDetalle($row['detalle']);
                $bebida->setName($row['nombre']);
                $bebida->setPrecio($row['precio']);
                $data[] = $bebida;
            }
            $this->disconnect();

            return $data;
        } else {
            return'';
        }
    }

    function deleteBebida(Bebida $bebida) {
        $this->conectar();
        $consulta = $this->consulta("DELETE FROM `bebestible` WHERE id_bebestible ='".$bebida->getId()."'");
        $this->disconnect();
        return $consulta;
    }

    function getBebida(Bebida $bebida) {
        $this->conectar();
        $query = "SELECT * FROM `bebestible`  WHERE `id_bebestible` = '".$bebida->getId()."'";
        $result = $this->consulta($query);
        $tsArray = $this->fetch_assoc($result);
        

        $bebida->setId($tsArray['id_bebestible']);
        $bebida->setDetalle($tsArray['detalle']);
        $bebida->setName($tsArray['nombre']);
        $bebida->setPrecio($tsArray['precio']);
        return $bebida;
    }

    //conexion a la base de datos
    function editBebida(Bebida $bebida) {
        $this->conectar();
        $query = "UPDATE `bebestible` SET "
                . "`nombre`='" . $bebida->getName() . "',`precio`=" . $bebida->getPrecio() . ",`detalle`='" . $bebida->getDetalle() . "' WHERE `id_bebestible` = " . $bebida->getId();
        $this->consulta($query);
        $this->disconnect();
    }

}
