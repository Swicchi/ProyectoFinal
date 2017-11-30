<?php

require "model/conexionDB.php";
$db = new conexionDB();
$array = array();
$array["respuesta"] = false;
$db->conectar();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $body = json_decode(file_get_contents("php://input"), true);
    $mesa = $body['mesa'];
    $fecha = date('Y-m-d G:i:s');
    $tipo = 1;
    if ($mesa == '0') {
        $tipo = 2;
    }
    $sql = "SELECT * FROM  `mesa` WHERE numeroMesa = " . $mesa;
    $result = $db->consulta($sql);
    $data = $db->fetch_assoc($result);
    $mesa = $data['id_mesa'];
    $sql = "INSERT INTO `orden`(`horaCreacion`,`id_tipoorden`, `id_mesa`) VALUES ('" . $fecha . "'," . $tipo . "," . $mesa . ") ;";
    $result = $db->consulta($sql);
    if ($result) {
        $sql = "SELECT * FROM  `orden` ORDER BY orden.horaCreacion DESC ";
        $result = $db->consulta($sql);
        $data = $db->fetch_assoc($result);
        $array["orden"] = $data['numero_orden'];
        $array["respuesta"] = true;
        $db->disconnect();
        echo json_encode($array);
    } else {
        $array["mensaje"] = $db->get_error();
        $db->disconnect();
        echo json_encode($array);
    }
} else {
    $array["mensaje"] = 'No hay parametros';
    $db->disconnect();
    echo json_encode($array);
}