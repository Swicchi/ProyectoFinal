<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'controller/CoreController.php';
require_once 'model/AlimentoModel/AlimentoDAO.php';
class AlimentoController extends CoreController {

    function agregarAlimento() {
      
        $pagina = $this->load_template();

        //Inicio carga en buffer
        ob_start();



        include 'view/AlimentoView/agregar.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar

        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }

    function editarAlimento() {

        $pagina = $this->load_template();
        $id = $_GET['id'];
        $alimento = new Alimento();
        $alimento->setId($id);
        //Inicio carga en buffer
        ob_start();


        $alimentoDAO = new AlimentoDAO();
        $alimento = $alimentoDAO->getAlimento($alimento);


        include 'view/AlimentoView/modificar.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar

        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }

    function agregarNuevoAlimento() {

        $alimento = new Alimento();
        $alimento->setName($_POST['name']);

        $alimentoDao = new AlimentoDAO();

        $alimentoDao->addAlimento($alimento);
        echo '<script language="javascript">alert("Alimento Agregado Correctamente");</script>';
        $this->listarAlimentos(); //Se muestra la pagina
    }

    function modificarAlimento() {

        $alimento = new Alimento();
        $alimento->setId($_POST['id']);
        $alimento->setName($_POST['name']);

        $alimentoDao = new AlimentoDAO();
        $alimentoDao->editAlimento($alimento);
        $this->listarAlimentos();
        //Se muestra la pagina 
    }

    function borrarAlimento() {
        $id = $_GET['id'];
        $alimento = new Alimento();
        $alimento->setId($id);
        $alimentoDao = new AlimentoDAO();
        if ($alimentoDao->deleteAlimento($alimento)) {
            echo '<script language="javascript">alert("Alimento Eliminado");</script>';
        } else {
            echo '<script language="javascript">alert("Alimento NO Eliminado");</script>';
        }
        $this->listarAlimentos();
    }

    function listarAlimentos() {
        $pagina = $this->load_template();

        //Inicio carga en buffer
        ob_start();
        $alimento = new AlimentoDAO();
        $data = $alimento->listarAlimentos();
        include 'view/AlimentoView/listar.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar
        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }

}

?>