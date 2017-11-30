<?php

require_once "model/conexionDB.php";
require 'model/MesaModel/Mesa.php';

class MesaDAO extends conexionDB {

    function addMesa(Mesa $mesa) {
        $this->conectar();
        $consulta = $this->consulta("INSERT INTO `mesa`(  `cantidad_asientos`, `codigo`, `numeroMesa`, `id_garzon`)  VALUES ( " . $mesa->getAsientos() . " , '" . $mesa->getCodigo() . "', " . $mesa->getNumero() . ", " . $mesa->getGarzon()->getId() . " ) ");
        $this->disconnect();
        return $consulta;
    }

    function listarMesas() {

        $this->conectar();
        $sql = "SELECT * FROM mesa ;";
        $result = $this->consulta($sql);
        if ($this->count_filas($result) > 0) {

            while ($row = $this->fetch_assoc($result)) {
                $mesa = new Mesa();
                $mesa->setId($row['id_mesa']);
                $mesa->setAsientos($row['cantidad_asientos']);
                $mesa->setCodigo($row['codigo']);
                $mesa->setNumero($row['numeroMesa']);
                $mesa->setGarzon($this->getGarzon($row['id_garzon']));
                $data[] = $mesa;
            }
            $this->disconnect();

            return $data;
        } else {
            return'';
        }
    }

    function getGarzon($id) {
        $this->conectar();
        $query = "SELECT * FROM `garzon` WHERE `id_garzon` = '" . $id . "'";
        $result = $this->consulta($query);
        $tsArray = $this->fetch_assoc($result);
        $garzon = new Garzon();
        $garzon->setId($tsArray['id_garzon']);
        $garzon->setRut($tsArray['rut']);
        $garzon->setNombre($tsArray['nombre']);
        $garzon->setApellidoP($tsArray['apellidoPaterno']);
        $garzon->setApellidoM($tsArray['apellidoMaterno']);
        $garzon->setSueldo($tsArray['sueldo']);
        $garzon->setTelefono($tsArray['telefono']);
        $garzon->setDireccion($tsArray['direccion']);
        return $garzon;
    }

    function deleteMesa(Mesa $mesa) {
        $this->conectar();
        $consulta = $this->consulta("DELETE FROM `mesa` WHERE id_mesa ='" . $mesa->getId() . "'");
        $this->disconnect();
        return $consulta;
    }

    function getMesa(Mesa $mesa) {
        $this->conectar();
        $query = "SELECT * FROM `mesa`  WHERE `id_mesa` = '" . $mesa->getId() . "'";
        $result = $this->consulta($query);
        $tsArray = $this->fetch_assoc($result);
        $mesa->setId($tsArray['id_mesa']);
        $mesa->setAsientos($tsArray['cantidad_asientos']);
        $mesa->setCodigo($tsArray['codigo']);
        $mesa->setNumero($tsArray['numeroMesa']);
        $mesa->setGarzon($this->getGarzon($tsArray['id_garzon']));
        return $mesa;
    }

    //conexion a la base de datos
    function editMesa(Mesa $mesa) {
        $this->conectar();
        
        $query = "UPDATE `mesa` SET "
                . "`cantidad_asientos`=" . $mesa->getAsientos() . ",`codigo`='" . $mesa->getCodigo() . "',`numeroMesa`=" . $mesa->getNumero() . ",`id_garzon`=" . $mesa->getGarzon()->getId() . " WHERE `id_mesa` = " . $mesa->getId();
        $consulta= $this->consulta($query);
        $this->disconnect();
        return $consulta;
    }

}
