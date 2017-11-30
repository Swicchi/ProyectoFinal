<?php
require "model/conexionDB.php";
$db = new conexionDB();
$array = array();
$array["respuesta"] = false;
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (!empty($_POST)) {
        $codigo = $_POST['codigo'];
        $db->conectar();
       
        $sql = "SELECT * FROM mesa  WHERE codigo ='".$codigo."' ;";
        $result = $db->consulta($sql);
        if ($db->count_filas($result) > 0) {
            $array["respuesta"] = true;
            $array["mesa"]= $db->fetch_assoc($result);
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