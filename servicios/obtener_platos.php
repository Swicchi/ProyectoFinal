<?php

require "model/conexionDB.php";
$db = new conexionDB();
$array = array();
$array["respuesta"] = false;
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $db->conectar();
    $sql = "SELECT p.id_plato,p.disponibilidad, p.nombre, p.precio, p.srcIMG, t.nombre_tipo FROM plato AS p NATURAL JOIN tipoplato AS t ORDER BY t.nombre_tipo ASC;";
    $result = $db->consulta($sql);
    if ($db->count_filas($result) > 0) {
        while ($row = $db->fetch_assoc($result)) {
            $disponibilidad = $row['disponibilidad'];
            $sql = "SELECT * FROM alimentoxplato NATURAL JOIN alimento WHERE id_plato = " . $row['id_plato'];
            $result2 = $db->consulta($sql);
            $data2 = '';
            if ($db->count_filas($result2) > 0) {
                while ($row3 = $db->fetch_assoc($result2)) {
                    $data2 = $data2 . $row3['nombre'] . " ";
                    if ($row3['disponibilidad'] != 1) {
                        $disponibilidad=$row3['disponibilidad'];
                    }
                }
                $row['ingredientes'] = $data2;
            } else {
                $row['ingredientes'] = 'No Hay Ingredientes';
            }
            if ($disponibilidad == 1) {
                $data[] = $row;
            }
        }
        $sql = "SELECT * FROM bebestible;";
        $result = $db->consulta($sql);
        if ($db->count_filas($result) > 0) {
            while ($row = $db->fetch_assoc($result)) {
                $row['id_plato'] = $row['id_bebestible'];
                $row['nombre_tipo'] = "Bebestible";
                $row['ingredientes'] = $row['detalle'];
                $row['srcIMG'] = "https://image.freepik.com/iconos-gratis/tomar-bebidas_318-30501.jpg";
                $data[] = $row;
            }
            $array["respuesta"] = true;
            $array['datos'] = $data;
            $db->disconnect();
            echo json_encode($array);
        } else {
            $db->disconnect();
            echo json_encode($array);
        }
    } else {
        $db->disconnect();
        echo json_encode($array);
    }
} else {
    $db->disconnect();
    echo json_encode($array);
}

