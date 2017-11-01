<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'controller/CoreController.php';
require_once 'model/BebidaModel/BebidaDAO.php';
class BebidaController extends CoreController {

    function agregarBebida() {

        $pagina = $this->load_template();

        //Inicio carga en buffer
        ob_start();
        include 'view/BebidaView/agregar.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar

        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }

    function editarBebida() {

        $pagina = $this->load_template();
        $id = $_GET['id'];
        $bebida=new Bebida();
        $bebida->setId($id);
        //Inicio carga en buffer
        ob_start();


        $bebidaDAO = new BebidaDAO();
        $bebida = $bebidaDAO->getBebida($bebida);


        include 'view/BebidaView/modificar.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar

        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }

    function agregarNuevaBebida() {

        $bebida = new Bebida();
        $bebida->setName($_POST['name']);
        $bebida->setPrecio($_POST['precio']);
        $bebida->setDetalle($_POST['detalle']);
        $bebidaDao = new BebidaDAO();

        $bebidaDao->addBebida($bebida);
        echo '<script language="javascript">alert("Bebida Agregada Correctamente");</script>';
        $this->listarBebidas();





        //Se muestra la pagina
    }

    function modificarBebida() {

        $bebida = new Bebida();
        $bebida->setId($_POST['id']);
        $bebida->setName($_POST['name']);
        $bebida->setPrecio($_POST['precio']);
        $bebida->setDetalle($_POST['detalle']);

        $bebidaDao = new BebidaDAO();
        $bebidaDao->editBebida($bebida);
        $this->listarBebidas();


        //Se muestra la pagina
    }

    function borrarBebida() {
        $id = $_GET['id'];
        $bebida=new Bebida();
        $bebida->setId($id);
        $bebidaDao = new BebidaDAO();
        if ($bebidaDao->deleteBebida($bebida)) {
            echo '<script language="javascript">alert("Bebida Eliminada");</script>';
        } else {
            echo '<script language="javascript">alert("Bebida NO Eliminada");</script>';
        }
        $this->listarBebidas();
    }

    function listarBebidas() {
        $pagina = $this->load_template();

        //Inicio carga en buffer
        ob_start();
        $bebida = new BebidaDAO();
        $data = $bebida->listarBebidas();
        include 'view/BebidaView/listar.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar
        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }

}

?>