<?php

require "model/conexionDB.php";
$db = new conexionDB();
$array = array();
$array["respuesta"] = false;
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $db->conectar();
    $sql = "SELECT p.id_plato, p.nombre, p.precio, p.srcIMG, t.nombre_tipo FROM plato AS p NATURAL JOIN tipoplato AS t ORDER BY t.nombre_tipo ASC;";
    $result = $db->consulta($sql);
    if ($db->count_filas($result) > 0) {
        while ($row = $db->fetch_assoc($result)) {
            $sql = "SELECT * FROM alimentoxplato NATURAL JOIN alimento WHERE id_plato = " . $row['id_plato'];
                $result2 = $db->consulta($sql);
                $data2 = '';
                if ($db->count_filas($result2) > 0) {
                    while ($row3 = $db->fetch_assoc($result2)) {
                        $data2 =$data2.$row3['nombre']." ";
                    }
                    $row['ingredientes'] = $data2;
                } else {
                    $row['ingredientes'] = 'No Hay Ingredientes';
                }
                $data[] = $row;
        }
        $sql = "SELECT * FROM bebestible;";
        $result = $db->consulta($sql);
        if ($db->count_filas($result) > 0) {
             while ($row = $db->fetch_assoc($result)) {
                $row['nombre_tipo']="Bebestible";
                 $row['ingredientes'] = $row['detalle'] ;
                 $row['srcIMG']="https://image.freepik.com/iconos-gratis/tomar-bebidas_318-30501.jpg";
                 $data[] = $row;
             }
        $array["respuesta"] = true;
        $array['datos'] = $data;
        echo json_encode($array);
        }else{
            echo json_encode($array);
        }
    } else {
        echo json_encode($array);
    }
} else {
    echo json_encode($array);
}
