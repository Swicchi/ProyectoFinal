<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'controller/CoreController.php';
require_once 'model/OrdenModel/OrdenDAO.php';

class OrdenController extends CoreController {

    function agregarOrden() {

        $pagina = $this->load_template();

        //Inicio carga en buffer
        ob_start();
        include 'view/OrdenView/agregar.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar

        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }

    function editarOrden() {

        $pagina = $this->load_template();
        $id = $_GET['id'];
        $bebida = new Bebida();
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

    function modificarOrden() {
        $orden = new Orden();
        $orden->setNumero($_GET['id']);
        $orden->setHoraPreparacion(date('Y-m-d G:i:s'));
        $ordenDao = new OrdenDAO();
        $ordenDao->actOrden($orden);
        $this->listarOrdenes();


        //Se muestra la pagina
    }
    
    function modificarOrdenGarzon() {
        $orden = new Orden();
        $orden->setNumero($_GET['id']);
        $orden->setHoraEntrega(date('Y-m-d G:i:s'));
        $ordenDao = new OrdenDAO();
        $ordenDao->actOrdenGarzon($orden);
        $this->listarOrdenesGarzon();


        //Se muestra la pagina
    }
    function confirmarOrden() {
        $orden = new Orden();
        $orden->setNumero($_GET['id']);
        $ordenDao = new OrdenDAO();
        $ordenDao->confirmarOrden($orden);
        $this->listarOrdenesGarzon();


        //Se muestra la pagina
    }

    function borrarBebida() {
        $id = $_POST['id'];
        $bebida = new Bebida();
        $bebida->setId($id);
        $bebidaDao = new BebidaDAO();
        if ($bebidaDao->deleteBebida($bebida)) {
            echo '<script language="javascript">alert("Bebida Eliminada");</script>';
        } else {
            echo '<script language="javascript">alert("Bebida NO Eliminada");</script>';
        }
        $this->listarBebidas();
    }

    function listarOrdenes() {
        //Inicio carga en buffer
        ob_start();
        $orden = new OrdenDAO();
        $data = $orden->listarOrdenes();
        include 'view/layoutCocinero.php';
        $pagina = ob_get_clean();
        $this->view_page($pagina);
    }
     function listarOrdenesGarzon() {
        //Inicio carga en buffer
        ob_start();
        $orden = new OrdenDAO();
        $data = $orden->listarOrdenesGarzon();
        include 'view/layoutGarzon.php';
        $pagina = ob_get_clean();
        $this->view_page($pagina);
    }
     function listarOrdenesGerente() {
         $pagina = $this->load_template();

        //Inicio carga en buffer
        ob_start();
        $ordenDAO = new OrdenDAO();
        $data = $ordenDAO->listarOrdenesTodas();
        include 'view/OrdenView/listar.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar
        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }

}

?>