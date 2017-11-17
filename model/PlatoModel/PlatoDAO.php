<?php

require_once "model/conexionDB.php";
require 'model/PlatoModel/Plato.php';
require 'model/AlimentoModel/Alimento.php';

class PlatoDAO extends conexionDB {

    function addPlato(Plato $plato) {
        $this->conectar();
        $consulta = $this->consulta("INSERT INTO `plato`( `nombre`, `precio`, `srcIMG`,`id_tipoplato` ) VALUES ('" . $plato->getNombre() . "','" . $plato->getPrecio() . "','" . $plato->getImage() . "'," . $plato->getId_tipo() . ") ");
        $this->disconnect();
        return $consulta;
    }

    function listarPlatos() {
        $this->conectar();
        $sql = "SELECT p.id_plato, p.nombre, p.precio, p.srcIMG, t.nombre_tipo FROM plato AS p NATURAL JOIN tipoplato AS t ORDER BY t.nombre_tipo ASC;";
        $result = $this->consulta($sql);
        if ($this->count_filas($result) > 0) {
            while ($row = $this->fetch_assoc($result)) {
                $plato = new Plato();
                $plato->setId($row['id_plato']);
                $plato->setNombre($row['nombre']);
                $plato->setPrecio($row['precio']);
                $plato->setImage($row['srcIMG']);
                $tipoplato = new TipoPlato();
                $tipoplato->setName($row['nombre_tipo']);
                $plato->setId_tipo($tipoplato);
                $data2 = $this->listarIngrediente($row['id_plato']);
                $plato->setIngredientes($data2);
                $data[] = $plato;
            }
            $this->disconnect();
            return $data;
        } else {
            return '';
        }
    }

    function listarIngrediente($id) {
        $sql = "SELECT alimento.nombre FROM alimentoxplato NATURAL JOIN alimento WHERE id_plato = " . $id;
        $result2 = $this->consulta($sql);
        $data2[] = null;
        if ($this->count_filas($result2) > 0) {
            while ($row3 = $this->fetch_assoc($result2)) {
                $alimento = new Alimento();
                $alimento->setName($row3['nombre']);
                $data2[] = $alimento;
            }

            return $data2;
        }
    }

    function deletePlato(Plato $plato) {
        $this->conectar();
        $consulta = $this->consulta("DELETE FROM `plato` WHERE id_plato ='" . $plato->getId() . "'");
        $this->disconnect();
        return $consulta;
    }

    function getPlato(Plato $plato) {
        $this->conectar();
        $query = "SELECT * FROM `plato` NATURAL JOIN `tipoplato` WHERE `id_plato` = '" . $plato->getId() . "'";
        $result = $this->consulta($query);
        $tsArray = $this->fetch_assoc($result);
        $plato->setId($tsArray['id_plato']);
        $plato->setNombre($tsArray['nombre']);
        $plato->setPrecio($tsArray['precio']);
        $plato->setImage($tsArray['srcIMG']);
                
        $tipoplato = new TipoPlato();
        $tipoplato->setId($tsArray['id_tipoplato']);
        $tipoplato->setName($tsArray['nombre_tipo']);
        $plato->setId_tipo($tipoplato);
        return $plato;
    }

    //conexion a la base de datos
    function editPlato(Plato $plato) {
        $this->conectar();
        $query = "UPDATE plato SET "
                . "nombre= '" . $plato->getNombre() . "' ,srcIMG='". $plato->getImage() ."',precio=" . $plato->getPrecio() . ",id_tipoplato=" . $plato->getId_tipo() . " WHERE id_plato = " . $plato->getId();
        $this->consulta($query);
        $this->disconnect();
    }

    function getIngredientexPlato(Plato $plato) {
        $plato= $this->getPlato($plato);
        
        $this->conectar();
        $query = "SELECT * FROM alimentoxplato NATURAL JOIN `alimento`  WHERE `id_plato` = '" . $plato->getId() . "';";
        $result2 = $this->consulta($query);
        if ($this->count_filas($result2) > 0) {
            while ($row = $this->fetch_assoc($result2)) {
                $alimento = new Alimento();
                $alimento->setId($row['id_alimento']);
                $alimento->setName($row['nombre']);
                $data2[] = $alimento;
            }
            $plato->setIngredientes($data2);
        }

        $query = "SELECT * FROM alimento WHERE NOT alimento.id_alimento IN( SELECT alimento.id_alimento FROM alimentoxplato NATURAL JOIN `alimento` WHERE `id_plato` = " . $plato->getId() . ")";
        $result3 = $this->consulta($query);
        if ($this->count_filas($result3) > 0) {
            while ($row = $this->fetch_assoc($result3)) {
                $alimento = new Alimento();
                $alimento->setId($row['id_alimento']);
                $alimento->setName($row['nombre']);

                $data[] = $alimento;
            }
            $plato->setnoIngredientes($data);
        }
        $this->disconnect();
        return $plato;
    }

    function addIngredientexPlato(Plato $plato) {
        $this->conectar();
        $consulta = $this->consulta("INSERT INTO `alimentoxplato`(`id_plato`, `id_alimento` ) VALUES (" . $plato->getId() . " ," . $plato->getIngredientes() . " ) ");
        $this->disconnect();
        return $consulta;
    }

    function deleteIngredientexPlato(Plato $plato) {
        $this->conectar();
        $consulta = $this->consulta("DELETE FROM `alimentoxplato` WHERE id_plato = " . $plato->getId() . " AND id_alimento = " . $plato->getIngredientes());
        $this->disconnect();
        return $consulta;
    }

}
