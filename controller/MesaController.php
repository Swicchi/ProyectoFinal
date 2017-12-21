<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'controller/CoreController.php';
require_once 'model/MesaModel/MesaDAO.php';
require_once 'model/GarzonModel/GarzonDAO.php';
require_once 'model/UserModel/UserDAO.php';
require_once  'model/UserModel/UserRoleDAO.php';
class MesaController extends CoreController {

    function agregarMesa() {

        $pagina = $this->load_template();

        //Inicio carga en buffer
        ob_start();
        $garzonDao = new GarzonDAO();
        $data = $garzonDao->listarGarzones();
        include 'view/MesaView/agregar.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar

        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }

    function editarMesa() {

        $pagina = $this->load_template();
        $id = $_GET['id'];
        $mesa=new Mesa();
        $mesa->setId($id);
        //Inicio carga en buffer
        ob_start();

        
        $garzonDao = new GarzonDAO();
        $data = $garzonDao->listarGarzones();
        $mesaDAO = new MesaDAO();
        $mesa = $mesaDAO->getMesa($mesa);


        include 'view/MesaView/modificar.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar

        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }

    function agregarNuevaMesa() {

        $mesa = new Mesa();
        $mesa->setAsientos($_POST['asiento']);
        $mesa->setCodigo($_POST['codigo']);
        $mesa->setNumero($_POST['num']);
        $garzon = new Garzon();
        $garzon->setId($_POST['garzon']);
        $mesa->setGarzon($garzon);
        $mesaDao = new MesaDAO();
        $result= $mesaDao->addMesa($mesa);
        if(!$result){
            echo '<script language="javascript">alert("Mesa No Agregada (Número de mesa o código duplicado)");</script>';
            $this->agregarMesa();
        }else{
        echo '<script language="javascript">alert("Mesa Agregada Correctamente");</script>';
        $this->listarMesas();
        }




        //Se muestra la pagina
    }

    function modificarMesa() {

        $mesa = new Mesa();
        $mesa->setId($_POST['id']);
        $mesa->setAsientos($_POST['asiento']);
        $mesa->setCodigo($_POST['codigo']);
        $mesa->setNumero($_POST['num']);
        $garzon = new Garzon();
        $garzon->setId($_POST['garzon']);
        $mesa->setGarzon($garzon);

        $mesaDao = new MesaDAO();
        $result = $mesaDao->editMesa($mesa);
        if(!$result){
            
             echo '<script language="javascript">alert("Mesa No Editada (Número de mesa o código duplicado)");</script>';
             
        }
        
            
        $this->listarMesas();


        //Se muestra la pagina
    }

    function borrarMesa() {
        $id = $_GET['id'];
        $mesa=new Mesa();
        $mesa->setId($id);
        $mesaDao = new MesaDAO();
        if ($mesaDao->deleteMesa($mesa)) {
            echo '<script language="javascript">alert("Mesa Eliminada");</script>';
        } else {
            echo '<script language="javascript">alert("Mesa NO Eliminada");</script>';
        }
        $this->listarMesas();
    }

    function listarMesas() {
        $pagina = $this->load_template();

        //Inicio carga en buffer
        ob_start();
        $mesa = new MesaDAO();
        $data = $mesa->listarMesas();
        include 'view/MesaView/listar.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar
        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }
}
?>