<?php

require_once "model/conexionDB.php";
require 'model/AlimentoModel/Alimento.php';

class AlimentoDAO extends conexionDB {

    function addAlimento(Alimento $alimento) {
        $this->conectar();
        $consulta = $this->consulta("INSERT INTO `alimento`( `nombre`) VALUES ('" . $alimento->getName() . "') ");
        $this->disconnect();
        return $consulta;
    }

    function listarAlimentos() {

        $this->conectar();
        $sql = "SELECT * FROM alimento ;";
        $result = $this->consulta($sql);
        if ($this->count_filas($result) > 0) {

            while ($row = $this->fetch_assoc($result)) {
                $alimento = new Alimento();
                $alimento->setId($row['id_alimento']);
                $alimento->setName($row['nombre']);
                $data[] = $alimento;
            }
            $this->disconnect();

            return $data;
        } else {
            return'';
        }
    }

    function deleteAlimento(Alimento $alimento) {
        $this->conectar();
        $consulta = $this->consulta("DELETE FROM `alimento` WHERE id_alimento ='".$alimento->getId()."'");
        $this->disconnect();
        return $consulta;
    }

    function getAlimento(Alimento $alimento) {
        $this->conectar();
        $query = "SELECT * FROM `alimento`  WHERE `id_alimento` = '".$alimento->getId()."'";
        $query = $this->consulta($query);
        $tsArray = $this->fetch_assoc($query);
        $alimento = new Alimento();
        $alimento->setId($tsArray['id_alimento']);
        $alimento->setName($tsArray['nombre']);
        return $alimento;
    }

    //conexion a la base de datos
    function editAlimento(Alimento $alimento) {
        $this->conectar();
        $query = "UPDATE `alimento` SET "
                . "`nombre`='" . $alimento->getName() . "' WHERE `id_alimento` = " . $alimento->getId();
        $this->consulta($query);
        $this->disconnect();
    }

}
