<?php

require "model/conexionDB.php";
require 'model/PlatoModel/Plato.php';

class PlatoDAO extends conexionDB {

    function addPlato(Plato $plato) {
        $this->conectar();
        $consulta = $this->consulta("INSERT INTO `plato`( `nombre`, `precio`, `id_tipoplato`) VALUES ('" . $plato->getNombre() . "','" . $plato->getPrecio() . "'," . $plato->getId_tipo() . ") ");
        $this->disconnect();
        return $consulta;
    }

    function listarPlatos() {
        $this->conectar();
        $sql = "SELECT p.id_plato, p.nombre, p.precio, t.nombre_tipo FROM plato AS p NATURAL JOIN tipoplato AS t ;";
        $result = $this->consulta($sql);
        if ($this->count_filas($result) > 0) {
            while ($row = $this->fetch_assoc($result)) {
                $sql = "SELECT alimento.nombre FROM alimentoxplato NATURAL JOIN alimento WHERE id_plato = " . $row['id_plato'];
                $result2 = $this->consulta($sql);
                $data2[] = null;
                if ($this->count_filas($result2) > 0) {
                    while ($row3 = $this->fetch_assoc($result2)) {
                        $data2[] = $row3;
                    }
                    $row[6] = $data2;
                } else {
                    $row[6] = null;
                }
                $data[] = $row;
            }

            $this->disconnect();
            return $data;
        } else {
            return '';
        }
    }

    function deletePlato($id) {
        $this->conectar();
        $consulta = $this->consulta("DELETE FROM `plato` WHERE id_plato ='$id'");
        $this->disconnect();
        return $consulta;
    }

    function getPlato($id) {
        $this->conectar();
        $query = "SELECT * FROM `plato` NATURAL JOIN `tipoplato` WHERE `id_plato` = '$id'";
        $query = $this->consulta($query);
        $tsArray = $this->fetch_assoc($query);
        return $tsArray;
    }

    //conexion a la base de datos
    function editPlato(Plato $plato) {
        $this->conectar();
        echo 'por la';
        $query = "UPDATE plato SET "
                . "nombre= '".$plato->getNombre()."' ,precio=" . $plato->getPrecio() . ",id_tipoplato=" . $plato->getId_tipo() . " WHERE id_plato = " . $plato->getId();
        $this->consulta($query);
        echo 'por la';
        $this->disconnect();
    }

}
