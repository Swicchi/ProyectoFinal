<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
$accion = !isset($_GET['action']) ? '' : $_GET['action'];
//var_dump($_POST);exit();


if (count($_POST) > 0) {
    if ($_GET["accion"] == "nuevoUsuario") {
        require 'controller/UserController.php';
        //se instancia al controlador
        $mvc = new UserController();
        $mvc->agregarNuevoUsuario();
    } else if ($_GET["accion"] == "modificarUsuario") {
        require 'controller/UserController.php';
        //se instancia al controlador
        $mvc = new UserController();
        $mvc->modificarUsuario();
    }


    //Alimentos

    if ($_GET["accion"] == "nuevoAlimento") {
        require 'controller/AlimentoController.php';
        //se instancia al controlador
        $mvc = new AlimentoController();
        $mvc->agregarNuevoAlimento();
    } else if ($_GET["accion"] == "modificarAlimento") {
        require 'controller/AlimentoController.php';
        //se instancia al controlador
        $mvc = new AlimentoController();
        $mvc->modificarAlimento();
    }

//Bebidas

    if ($_GET["accion"] == "nuevaBebida") {
       require 'controller/BebidaController.php';
        //se instancia al controlador
        $mvc = new BebidaController();
        $mvc->agregarNuevaBebida();
    } else if ($_GET["accion"] == "modificarBebida") {
        require 'controller/BebidaController.php';
        //se instancia al controlador
        $mvc = new BebidaController();
        $mvc->modificarBebida();
    }
} else {
    if ($accion == '') {
        require 'controller/SiteController.php';
        //se instancia al controlador
        $mvc = new SiteController();
        $mvc->principal();
    } else if ($accion == 'agregarUsuario') {
         require 'controller/UserController.php';
        //se instancia al controlador
        $mvc = new UserController();
        $mvc->agregarUsuario();
    } else if ($accion == 'editarUsuario') {
         require 'controller/UserController.php';
        //se instancia al controlador
        $mvc = new UserController();
        $mvc->editarUsuario();
    } else if ($accion == 'eliminarUsuario') {
        require 'controller/UserController.php';
        //se instancia al controlador
        $mvc = new UserController();
        $mvc->borrarUsuario();
    } else if ($accion == 'listarUsuario') {
        require 'controller/UserController.php';
        //se instancia al controlador
        $mvc = new UserController();
        $mvc->listarUsuarios();
    }

    //Alimentos

    if ($accion == 'agregarAlimento') {
        require 'controller/AlimentoController.php';
        //se instancia al controlador
        $mvc = new AlimentoController();
        $mvc->agregarAlimento();
    } else if ($accion == 'editarAlimento') {
        require 'controller/AlimentoController.php';
        //se instancia al controlador
        $mvc = new AlimentoController();
        $mvc->editarAlimento();
    } else if ($accion == 'eliminarAlimento') {
        require 'controller/AlimentoController.php';
        //se instancia al controlador
        $mvc = new AlimentoController();
        $mvc->borrarAlimento();
    } else if ($accion == 'listarAlimento') {
        require 'controller/AlimentoController.php';
        //se instancia al controlador
        $mvc = new AlimentoController();
        $mvc->listarAlimentos();
    }

    //Bebidas

    if ($accion == 'agregarBebida') {
        require 'controller/BebidaController.php';
        //se instancia al controlador
        $mvc = new BebidaController();
        $mvc->agregarBebida();
    } else if ($accion == 'editarBebida') {
        require 'controller/BebidaController.php';
        //se instancia al controlador
        $mvc = new BebidaController();
        $mvc->editarBebida();
    } else if ($accion == 'eliminarBebida') {
        require 'controller/BebidaController.php';
        //se instancia al controlador
        $mvc = new BebidaController();
        $mvc->borrarBebida();
    } else if ($accion == 'listarBebida') {
        require 'controller/BebidaController.php';
        //se instancia al controlador
        $mvc = new BebidaController();
        $mvc->listarBebidas();
    }
}
?>