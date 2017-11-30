<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
$accion = !isset($_GET['action']) ? '' : $_GET['action'];
//var_dump($_POST);exit();
if (count($_POST) > 0) {
    if (isset($_GET['loginUser'])) {
        require 'controller/SiteController.php';
        //se instancia al controlador
        $mvc = new SiteController();
        $mvc->loginUser();
    } else
    if (isset($_GET['nuevoUsuario'])) {
        require 'controller/UserController.php';
        //se instancia al controlador
        $mvc = new UserController();
        $mvc->agregarNuevoUsuario();
    } else
    if (isset($_GET['modificarUsuario'])) {
        require 'controller/UserController.php';
        //se instancia al controlador
        $mvc = new UserController();
        $mvc->modificarUsuario();
    }
    //Alimentos
    if (isset($_GET['nuevoAlimento'])) {
        require 'controller/AlimentoController.php';
        //se instancia al controlador
        $mvc = new AlimentoController();
        $mvc->agregarNuevoAlimento();
    } else
    if (isset($_GET['modificarAlimento'])) {
        require 'controller/AlimentoController.php';
        //se instancia al controlador
        $mvc = new AlimentoController();
        $mvc->modificarAlimento();
    }
    //Bebidas
    if (isset($_GET['nuevaBebida'])) {
        require 'controller/BebidaController.php';
        //se instancia al controlador
        $mvc = new BebidaController();
        $mvc->agregarNuevaBebida();
    } else
    if (isset($_GET['modificarBebida'])) {
        require 'controller/BebidaController.php';
        //se instancia al controlador
        $mvc = new BebidaController();
        $mvc->modificarBebida();
    }
    //Platos
    if (isset($_GET['nuevoPlato'])) {
        require 'controller/PlatoController.php';
        //se instancia al controlador
        $mvc = new PlatoController();
        $mvc->agregarNuevoPlato();
    } else
    if (isset($_GET['modificarPlato'])) {
        require 'controller/PlatoController.php';
        //se instancia al controlador
        $mvc = new PlatoController();
        $mvc->modificarPlato();
    }
} else {
   
    if ($accion == '') {
        require 'controller/SiteController.php';
        //se instancia al controlador
        $mvc = new SiteController();
        $mvc->principal();
    } else
         if(!isset($_SESSION['username'])){
    require 'controller/SiteController.php';
     //se instancia al controlador
     $mvc = new SiteController();
     $mvc->principal(true);
    }else
        if ($accion == 'preparado') {
        require 'controller/OrdenController.php';
        //se instancia al controlador
        $mvc = new OrdenController();
        $mvc->modificarOrden();
    } else
        if ($accion == 'entregado') {
        require 'controller/OrdenController.php';
        //se instancia al controlador
        $mvc = new OrdenController();
        $mvc->modificarOrdenGarzon();
    } else 
        if ($accion == 'confirmar') {
        require 'controller/OrdenController.php';
        //se instancia al controlador
        $mvc = new OrdenController();
        $mvc->confirmarOrden();
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
    else
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
  else
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
    
        //Garzones
  else
    if ($accion == 'agregarGarzon') {
        require 'controller/GarzonController.php';
        //se instancia al controlador
        $mvc = new GarzonController();
        $mvc->agregarGarzon();
    } else if ($accion == 'editarGarzon') {
        require 'controller/GarzonController.php';
        //se instancia al controlador
        $mvc = new GarzonController();
        $mvc->editarGarzon();
    } else if ($accion == 'eliminarGarzon') {
        require 'controller/GarzonController.php';
        //se instancia al controlador
        $mvc = new GarzonController();
        $mvc->borrarGarzon();
    } else if ($accion == 'listarGarzon') {
        require 'controller/GarzonController.php';
        //se instancia al controlador
        $mvc = new GarzonController();
        $mvc->listarGarzones();
    }
    
    
       //Mesas
  else
    if ($accion == 'agregarMesa') {
        require 'controller/MesaController.php';
        //se instancia al controlador
        $mvc = new MesaController();
        $mvc->agregarMesa();
    } else if ($accion == 'editarMesa') {
        require 'controller/MesaController.php';
        //se instancia al controlador
        $mvc = new MesaController();
        $mvc->editarMesa();
    } else if ($accion == 'eliminarMesa') {
        require 'controller/MesaController.php';
        //se instancia al controlador
        $mvc = new MesaController();
        $mvc->borrarMesa();
    } else if ($accion == 'listarMesa') {
        require 'controller/MesaController.php';
        //se instancia al controlador
        $mvc = new MesaController();
        $mvc->listarMesas();
    }
    

    //Platos
  else
    if ($accion == 'agregarPlato') {
        require 'controller/PlatoController.php';
        //se instancia al controlador
        $mvc = new PlatoController();
        $mvc->agregarPlato();
    } else if ($accion == 'editarPlato') {
        require 'controller/PlatoController.php';
        //se instancia al controlador
        $mvc = new PlatoController();
        $mvc->editarPlato();
    } else if ($accion == 'eliminarPlato') {
        require 'controller/PlatoController.php';
        //se instancia al controlador
        $mvc = new PlatoController();
        $mvc->borrarPlato();
    } else if ($accion == 'listarPlato') {
        require 'controller/PlatoController.php';
        //se instancia al controlador
        $mvc = new PlatoController();
        $mvc->listarPlatos();
    } else if ($accion == 'ingredientePlato') {
        require 'controller/PlatoController.php';
        //se instancia al controlador
        $mvc = new PlatoController();
        $mvc->agregarIngredientePlato();
    } else if ($accion == 'agregarIngredientexPlato') {
        require 'controller/PlatoController.php';
        //se instancia al controlador
        $mvc = new PlatoController();
        $mvc->nuevoIngrediente();
    } else if ($accion == 'eliminarIngredientexPlato') {
        require 'controller/PlatoController.php';
        //se instancia al controlador
        $mvc = new PlatoController();
        $mvc->eliminarIngrediente();
    }
}
?>