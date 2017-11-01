<?php
  if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
   
require_once  'controller/CoreController.php';
require_once 'model/UserModel/UserDAO.php';
require_once 'model/UserModel/UserRoleDAO.php';
class SiteController extends CoreController {
    function principal($bandera = false) {
        session_destroy();
        if ($bandera) {
             echo '<script language="javascript">alert("Inicie Sesion");</script>'; 
        }
       $pagina = $this->load_page('view/login.php');
        $this->view_page($pagina);
       
    }
    function loginUser(){
        $userName=$_POST['user'];
        $pass=$_POST['password'];
        $user = new User();
        $user->setName($userName);
        $user->setUserPass($pass);
        $userDao= new UserDAO();
        $user2 = $userDao->getLoginUser($user);
        if($user2!=''){
            $this->main($user2);
        } else {
           echo '<script language="javascript">alert("Usuario o clave incorrecto");</script>'; 
           $this->principal();
        }
    }    
    function main(User $user2) {
        ob_start();
        $_SESSION['username']=$user2->getName();
        $_SESSION['userrol']=serialize($user2->getRol()->getName());
        $pagina = $this->load_template();
        include 'view/main.php';
        $content = ob_get_clean();
        $pagina = $this->replace_content('/\#CONTENIDO\#/ms',$content,$pagina);
        
        $this->view_page($pagina);  
    }  
}
?>

