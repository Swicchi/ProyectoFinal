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
        //Login
            require 'controller/UserController.php';
            //se instancia al controlador
            $mvc = new UserController();
            $mvc->agregarNuevoUsuario();
} else  if ($_GET["accion"] == "modificarUsuario") {
        //Login
            require 'controller/UserController.php';
            //se instancia al controlador
            $mvc = new UserController();
            $mvc->modificarUsuario();
}

    }else{/* else if ($_POST['action'] == "guardar_cliente") {
        //Ingreso de clientes
        require 'app/controller/ClienteController.php';
        //se instancia al controlador
        $mvc = new ClienteController();
        $mvc->agregarCliente();
    } else if ($_POST['action'] == "eliminar_cliente") {
        //Borrar clientes
        require 'app/controller/ClienteController.php';
        //se instancia al controlador
        $mvc = new ClienteController();
        $mvc->eliminarCliente();
    } else if ($_POST['action'] == "editar_cliente") {
        
        require 'app/controller/ClienteController.php';
        
        $mvc = new ClienteController();
        $mvc->editarCliente();
    } else if ($_POST['action'] == "actualizar_cliente") {
        
        require 'app/controller/ClienteController.php';
        //se instancia al controlador
        $mvc = new ClienteController();
        $mvc->actualizarCliente();
    } else if ($_POST['action'] == "actualizar_borrar") {
        
        require 'app/controller/ClienteController.php';
        //se instancia al controlador
        $mvc = new ClienteController();
        $mvc->actualizarBorrar();
    } 
} else {
    */if ($accion == '') {
        //Es el login
        require 'controller/SiteController.php';
        //se instancia al controlador
        $mvc = new SiteController();
        $mvc->principal();
    } else if ($accion == 'agregarUsuario') {
            //Gesti�n de clientes

            require 'controller/UserController.php';
            //se instancia al controlador
            $mvc = new UserController();
            $mvc->agregarUsuario();
        } else if ($accion == 'editarUsuario') {
            //Gesti�n de clientes

            require 'controller/UserController.php';
            //se instancia al controlador
            $mvc = new UserController();
            $mvc->editarUsuario();
        } else if ($accion == 'eliminarUsuario') {
            //Gesti�n de clientes

            require 'controller/UserController.php';
            //se instancia al controlador
            $mvc = new UserController();
            $mvc->borrarUsuario();
        } else if ($accion == 'listarUsuario') {
            //Gesti�n de clientes
             require 'controller/UserController.php';
            //se instancia al controlador
            $mvc = new UserController();
            $mvc->listarUsuarios();
    }} /*else if ($accion == 'listar_cliente') {
            //Lista clientes

            require 'app/controller/ClienteController.php';
            //se instancia al controlador
            $mvc = new ClienteController();
            $mvc->listarCliente();
        } 
    
}*/
?>