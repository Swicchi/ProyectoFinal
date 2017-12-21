<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'controller/CoreController.php';
require_once 'model/PlatoModel/PlatoDAO.php';
require_once 'model/PlatoModel/TipoPlatoDAO.php';
class PlatoController extends CoreController {

    function agregarPlato() {

        $pagina = $this->load_template();

        //Inicio carga en buffer
        ob_start();

        $plato = new TipoPlatoDAO();
        $data = $plato->listarTipoPlato();
        // $alimentoDAO = new AlimentoDAO();
        //$alimentos = $alimentoDAO->listarAlimentos();
        include 'view/PlatoView/agregar.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar

        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }

    function editarPlato() {

        $pagina = $this->load_template();
        $id = $_GET['id'];
        $plato = new Plato();
        $plato->setId($id);
        //Inicio carga en buffer
        ob_start();
        $platoDAO = new PlatoDAO();
        $plato = $platoDAO->getPlato($plato);
        $tipoPlatoDAO = new TipoPlatoDAO();
        $data = $tipoPlatoDAO->listarTipoPlato();

        include 'view/PlatoView/modificar.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar

        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }

    function agregarNuevoPlato() {

        $plato = new Plato();
        $plato->setNombre($_POST['nombre']);
        $plato->setPrecio($_POST['precio']);
        $plato->setId_tipo($_POST['tipo']);
        $nombre_img=$_FILES['image']['name'];
        $tipo_img=$_FILES['image']['type'];
        $size_img=$_FILES['image']['size'];
        if(isset($_FILES)){
        if(($tipo_img!="image/png"&&$tipo_img!="image/jpeg")||$size_img>200000){
            echo '<script language="javascript">alert("Formato o tamaño de arhivo incorrecto");</script>';
            $this->agregarPlato();
        }else{
            $content=$_SERVER['DOCUMENT_ROOT']."/remferna/ProyectoFinal/img/";
  
            move_uploaded_file($_FILES['image']['tmp_name'], $content.$nombre_img);
      
        $plato->setImage("http://parra.chillan.ubiobio.cl:8070/remferna/ProyectoFinal/img/".$nombre_img);  
        $platoDao = new PlatoDAO();

        $platoDao->addPlato($plato);
        echo '<script language="javascript">alert("Plato Agregado Correctamente");</script>';
        $this->listarPlatos();
      }}else{
            $platoDao = new PlatoDAO();

            $platoDao->addPlato($plato);
            echo '<script language="javascript">alert("Plato Agregado Correctamente");</script>';
             $this->listarPlatos();
        }
//Se muestra la pagina
    }

    function modificarPlato() {

        $plato = new Plato();
        $plato->setId($_POST['id']);
        $plato->setNombre($_POST['nombre']);
        $plato->setPrecio($_POST['precio']);
        $plato->setId_tipo($_POST['tipo']);
        $nombre_img=$_FILES['image']['name'];
        $tipo_img=$_FILES['image']['type'];
        $size_img=$_FILES['image']['size'];
        
        
        if($nombre_img!=''){
      if(($tipo_img!="image/png"&&$tipo_img!="image/jpeg")||$size_img>200000){
            echo '<script language="javascript">alert("Formato o tamaño de arhivo incorrecto");</script>';
            $this->listarPlatos();
        }else{
            $content=$_SERVER['DOCUMENT_ROOT']."/remferna/ProyectoFinal/img/";
  
            move_uploaded_file($_FILES['image']['tmp_name'], $content.$nombre_img);
      
        $plato->setImage("http://parra.chillan.ubiobio.cl:8070/remferna/ProyectoFinal/img/".$nombre_img);  
        $platoDao = new PlatoDAO();
        $platoDao->editPlato($plato);
        $this->listarPlatos();


        //Se muestra la pagina
      }}else{
             $plato->setImage($_POST['ruta']);  
            $platoDao = new PlatoDAO();
             $platoDao->editPlato($plato);
        $this->listarPlatos();
            
        }
    }

    function borrarPlato() {
        $id = $_GET['id'];
        $plato=new Plato();
        $plato->setId($id);
        $platoDAO = new PlatoDAO();
        if ($platoDAO->deletePlato($plato)) {
            echo '<script language="javascript">alert("Plato Eliminado");</script>';
        } else {
            echo '<script language="javascript">alert("Plato NO Eliminado");</script>';
        }
        $this->listarPlatos();
    }

    function listarPlatos() {
        $pagina = $this->load_template();

        //Inicio carga en buffer
        ob_start();
        $platoDAO = new PlatoDAO();
        $data = $platoDAO->listarPlatos();
        include 'view/PlatoView/listar.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar
        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }
    function agregarIngredientePlato(){
        $pagina = $this->load_template();

        $id=$_GET['id'];
        $plato = new Plato();
        $plato->setId($id);
         ob_start();
        $platoDAO = new PlatoDAO();
        $data=$platoDAO->getIngredientexPlato($plato);
        include 'view/PlatoView/listaringrediente.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar
        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }
    function nuevoIngrediente(){
        $id=$_GET['id'];
        $idplato=$_GET['idplato'];
        $plato = new Plato();
        $plato->setId($idplato);
        $plato->setIngredientes($id);
        $platoDAO = new PlatoDAO();
        $platoDAO->addIngredientexPlato($plato);
         $this->listarPlatos();
    }
    function eliminarIngrediente(){
        $id=$_GET['id'];
        $idplato=$_GET['idplato'];
        $plato = new Plato();
        $plato->setId($idplato);
        $plato->setIngredientes($id);
        $platoDAO = new PlatoDAO();
        $platoDAO->deleteIngredientexPlato($plato);
        $this->listarPlatos();
    }
    function listarPlatoC() {
        $pagina = $this->load_template();

        //Inicio carga en buffer
        ob_start();
        $platoDAO = new PlatoDAO();
        $data = $platoDAO->listarPlatos();
        include 'view/PlatoView/listarCocina.php';
        $content = ob_get_clean();
        //Termino carga de bufer, se almacena todo en variable $content
        //Se reemplaza la bandera del template por el contenido que deseo mostrar
        $pagina = $this->replace_content('/\#CONTENIDO\#/ms', $content, $pagina);
        //Se muestra la pagina
        $this->view_page($pagina);
    }
     function estadoPlato() {

        $plato = new Plato();
        $plato->setId($_GET['id']);

        $platoDao = new PlatoDAO();
        $platoDao->estadoPlato($plato);
        $rol = unserialize($_SESSION['userrol']);
        if ($rol == 'Cocinero') {
            $this->listarPlatoC();
        } else
            $this->listarPlatos();
        //Se muestra la pagina 
    }
}
?>