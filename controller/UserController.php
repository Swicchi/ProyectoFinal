<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'controller/CoreController.php';
require_once  'model/UserModel/UserDAO.php';
require_once 'model/UserModel/UserRoleDAO.php';

class UserController extends CoreController {

    function agregarUsuario() {

        $pagina = $this->load_template();

        //Inicio carga en buffer
        ob_start();

        $user = new UserRoleDAO();
        $data = $user->listarUserRole();

        include 'view/UserView/agregar.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar

        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }

    function editarUsuario() {

        $pagina = $this->load_template();
        $id = $_GET['id'];
        $user = new User();
        $user->setId($id);
        //Inicio carga en buffer
        ob_start();
        $userDao = new UserDAO();
        $user = $userDao->getUser($user);
        $userrole = new UserRoleDAO();
        $data = $userrole->listarUserRole();

        include 'view/UserView/modificar.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar

        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }

    function agregarNuevoUsuario() {

        $user = new User();
        $user->setName($_POST['user']);
        $user->setUserPass($_POST['pass']);
        $user->setRol($_POST['rol']);

        $userDao = new UserDAO();

        $userDao->addUSer($user);
        echo '<script language="javascript">alert("Usuario Agregado Correctamente");</script>';
        $this->listarUsuarios();





        //Se muestra la pagina
    }

    function modificarUsuario() {

        $user = new User();
        $user->setId($_POST['id']);
        $user->setName($_POST['user']);
        $user->setUserPass($_POST['pass']);
        $user->setRol($_POST['rol']);

        $userDao = new UserDAO();
        $userDao->editUser($user);
        $this->listarUsuarios();


        //Se muestra la pagina
    }

    function listarRoles() {
        if ($result == '') {
            echo '<script language="javascript">alert("No se encontraron Roles para Usuarios");</script>';
            return $result;
        } else {
            return $result;
        }
    }

    function borrarUsuario() {
        $id = $_GET['id'];
        $user = new User();
        $user->setId($id);
        $userDao = new UserDAO();
        if ($userDao->deleteUser($user)) {
            echo '<script language="javascript">alert("Usuario Eliminado");</script>';
        } else {
            echo '<script language="javascript">alert("Usuario NO Eliminado");</script>';
        }
        $this->listarUsuarios();
    }

    function listarUsuarios() {
        $pagina = $this->load_template();

        //Inicio carga en buffer
        ob_start();
        $user = new UserDAO();
        $data = $user->listarUsuarios();
        include 'view/UserView/listar.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar
        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }

}

?>