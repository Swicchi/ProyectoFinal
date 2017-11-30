<?php

require "model/conexionDB.php";
$db = new conexionDB();
$array = array();
$array["respuesta"] = false;
$db->conectar();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $body = json_decode(file_get_contents("php://input"), true);
    $orden = $body['orden'];
    $producto = $body['producto'];
    $cantidad = $body['cantidad'];
    $tipo = $body['tipo'];
    $db->conectar();
    $sql = "INSERT INTO `ordenxplato`(`cantidad`,`id_plato`, `id_orden`) VALUES (" . $cantidad . "," . $producto . "," . $orden . ") ;";
    $result = $db->consulta($sql);
    if ($result) {
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