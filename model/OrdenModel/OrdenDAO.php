<?php

require_once "model/conexionDB.php";
require 'model/OrdenModel/Orden.php';
require 'model/BebidaModel/Bebida.php';
require 'model/PlatoModel/Plato.php';
class OrdenDAO extends conexionDB {

    function addOrden(Orden $bebida) {
        $this->conectar();
        $consulta = $this->consulta("INSERT INTO `bebestible`( `nombre`, `detalle`, `precio`)  VALUES ( '" . $bebida->getName() . "' , '" . $bebida->getDetalle() . "', " . $bebida->getPrecio() . " ) ");
        $this->disconnect();
        return $consulta;
    }

    function listarOrdenes() {
        $this->conectar();
        $sql = "SELECT * FROM orden NATURAL JOIN tipoorden NATURAL JOIN mesa ;";
        $result = $this->consulta($sql);
        if ($this->count_filas($result) > 0) {
            while ($row = $this->fetch_assoc($result)) {
                $orden = new Orden();
                $orden->setNumero($row['numero_orden']);
                $orden->setHoraCreacion($row['horaCreacion']);
                $orden->setHoraPreparacion($row['horaPreparacion']);
                $orden->setHoraEntrega($row['horaEntrega']);
                $orden->setPlato($this->listarPlatos($row['numero_orden']));
                $orden->setBebida($this->listarBebidas($row['numero_orden']));
                $orden->setTipo($row['nombre']);
                $orden->setMesa($row['numeroMesa']);
                $data[] = $orden;
            }
            $this->disconnect();

            return $data;
        } else {
            return'';
        }
    }

    private function listarPlatos($id) {
        $sql = "SELECT * FROM ordenxplato NATURAL JOIN plato WHERE id_orden = " . $id;
        $result2 = $this->consulta($sql);
        $data2[] = null;
        if ($this->count_filas($result2) > 0) {
            while ($row3 = $this->fetch_assoc($result2)) {
                $plato = new Plato();
                $plato->setNombre($row3['nombre']);
                $plato->setCantidad($row3['cantidad']);
                $data2[] = $plato;
            }

            return $data2;
        }
    }
    private function listarBebidas($id) {
        $sql = "SELECT * FROM ordenxbebestible NATURAL JOIN bebestible WHERE id_orden = " . $id;
        $result2 = $this->consulta($sql);
        $data2[] = null;
        if ($this->count_filas($result2) > 0) {
            while ($row3 = $this->fetch_assoc($result2)) {
                $bebida = new Bebida();
                $bebida->setName($row3['nombre']);
                $bebida->setDetalle($row3['detalle']);
                $bebida->setCantidad($row3['cantidad']);
                $data2[] = $bebida;
            }
            return $data2;
        }
    }

    function deleteOrden(Orden $bebida) {
        $this->conectar();
        $consulta = $this->consulta("DELETE FROM `bebestible` WHERE id_bebestible ='" . $bebida->getId() . "'");
        $this->disconnect();
        return $consulta;
    }

    function getOrden(Orden $bebida) {
        $this->conectar();
        $query = "SELECT * FROM `bebestible`  WHERE `id_bebestible` = '" . $bebida->getId() . "'";
        $result = $this->consulta($query);
        $tsArray = $this->fetch_assoc($result);


        $bebida->setId($tsArray['id_bebestible']);
        $bebida->setDetalle($tsArray['detalle']);
        $bebida->setName($tsArray['nombre']);
        $bebida->setPrecio($tsArray['precio']);
        return $bebida;
    }

    //conexion a la base de datos
    function editOrden(Orden $orden) {
        $this->conectar();
        $query = "UPDATE `orden` SET "
                . "`nombre`='" . $orden->getName() . "',`precio`=" . $orden->getPrecio() . ",`detalle`='" . $orden->getDetalle() . "' WHERE `id_bebestible` = " . $orden->getId();
        $this->consulta($query);
        $this->disconnect();
    }
     function actOrden(Orden $orden) {
        $this->conectar();
        $query = "UPDATE `orden` SET "
                . "`horaPreparacion`='" . $orden->getHoraPreparacion() . "' WHERE `numero_orden` = " . $orden->getNumero();
        $this->consulta($query);
        $this->disconnect();
    }

}
