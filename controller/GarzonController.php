<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'controller/CoreController.php';
require_once 'model/GarzonModel/GarzonDAO.php';
require_once 'model/UserModel/UserDAO.php';
require_once  'model/UserModel/UserRoleDAO.php';
class GarzonController extends CoreController {

    function agregarGarzon() {

        $pagina = $this->load_template();

        //Inicio carga en buffer
        ob_start();
        $user = new UserDAO();
        $data = $user->listarUsuarios();

        include 'view/GarzonView/agregar.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar

        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }

    function editarGarzon() {

        $pagina = $this->load_template();
        $id = $_GET['id'];
        $garzon = new Garzon();
        $garzon->setId($id);
        //Inicio carga en buffer
        ob_start();
        $garzonDAO = new GarzonDAO();
        $garzon = $garzonDAO->getGarzon($garzon);
        
        $user = new UserDAO();
        $data = $user->listarUsuarios();
        include 'view/GarzonView/modificar.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar

        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }

    function agregarNuevaGarzon() {

        $garzon = new Garzon();
        $garzon->setRut($_POST['rut']);
        $garzon->setNombre($_POST['nombre']);
        $garzon->setApellidoP($_POST['apellidoPaterno']);
        $garzon->setApellidoM($_POST['apellidoMaterno']);
        $garzon->setSueldo($_POST['sueldo']);
        $garzon->setTelefono($_POST['telefono']);
        $garzon->setDireccion($_POST['direccion']);
        $user = new User();
        $user->setId($_POST['user']);
        $garzon->setUser($user);
        $garzonDao = new GarzonDAO();

        if(!$garzonDao->addGarzon($garzon)){
            echo '<script language="javascript">alert("Garzón No Agregado (Usuario ocupado)");</script>';
            $this->agregarGarzon();
        }else{
        echo '<script language="javascript">alert("Garzón Agregado Correctamente");</script>';
        $this->listarGarzones();
        }





        //Se muestra la pagina
    }

    function modificarGarzon() {

        $garzon = new Garzon();
        $garzon->setId($_POST['id']);
        $garzon->setRut($_POST['rut']);
        $garzon->setNombre($_POST['nombre']);
        $garzon->setApellidoP($_POST['apellidoPaterno']);
        $garzon->setApellidoM($_POST['apellidoMaterno']);
        $garzon->setSueldo($_POST['sueldo']);
        $garzon->setTelefono($_POST['telefono']);
        $garzon->setDireccion($_POST['direccion']);
         $user = new User();
        $user->setId($_POST['user']);
        $garzon->setUser($user);
        $garzonDao = new GarzonDAO();
        if(!$garzonDao->editGarzon($garzon)){
            echo '<script language="javascript">alert("Garzón No editado (Usuario ya esta ocupado)");</script>';
        }
        $this->listarGarzones();


        //Se muestra la pagina
    }

    function borrarGarzon() {
        $id = $_GET['id'];
        $garzon = new Garzon();
        $garzon->setId($id);
        $garzonDao = new GarzonDAO();
        if ($garzonDao->deleteGarzon($garzon)) {
            echo '<script language="javascript">alert("Garzón Eliminado");</script>';
        } else {
            echo '<script language="javascript">alert("Garzón NO Eliminado");</script>';
        }
        $this->listarGarzones();
    }

    function listarGarzones() {
        $pagina = $this->load_template();

        //Inicio carga en buffer
        ob_start();
        $garzon = new GarzonDAO();
        $data = $garzon->listarGarzones();
        include 'view/GarzonView/listar.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar
        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }

}

?>