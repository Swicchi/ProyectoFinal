<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once  'controller/CoreController.php';
require_once  'model/UserModel/UserDAO.php';
require_once 'model/UserModel/userRole.php';
require_once 'model/UserModel/user.php';
class UserController extends CoreController {

    function agregarUsuario() {
        
        $pagina = $this->load_template();

        //Inicio carga en buffer
        ob_start();
       
         $user = new UserDAO();
         include 'view/UserView/agregar.php';
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
        $pagina = $this->load_template();
        $userDao = new UserDAO();
     
        if($userDao->addUSer($user)){
             echo '<script language="javascript">alert("Usuario Agregado Correctamente");</script>';
             $this->listarUsuarios();
            
        } else {
             echo '<script language="javascript">alert("Error al Agregar Usuario");</script>';
              $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $this->load_page('view/UserView/agregar.php'), $pagina);
        
                    $this->view_page($pagina);
        }
        
        
        //Se muestra la pagina
  
        
    }
    function listarRoles(){
       
       
        if($result==''){
           echo '<script language="javascript">alert("No se encontraron Roles para Usuarios");</script>';
           return $result;
        } else {
            
            return $result;
        }
        
    }
    function listarUsuarios(){
           $pagina = $this->load_template();

        //Inicio carga en buffer
        ob_start();
       
         $user = new UserDAO();
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