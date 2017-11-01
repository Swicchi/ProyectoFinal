<?php

class CoreController {

    public function __construct() {
        
    }

    /* METODO QUE CARGA LAS PARTES PRINCIPALES DE LA PAGINA WEB
      OUTPIT
      $pagina | string que contiene toda el cocigo HTML de la plantilla
     */

    public function load_template() {
        $rol = unserialize($_SESSION['userrol']);   
        if ($rol == 'Administrador') {
            $pagina = $this->load_page('view/layout.php');
        } elseif ($rol == 'Gerente') {
            $pagina = $this->load_page('view/layoutGerente.php');
        } else {
            $pagina = $this->load_page('view/layoutCocinero.php');
        }
      
        return $pagina;
    }

    

    /* METODO QUE CARGA UNA PAGINA DE LA SECCION VIEW Y LA MANTIENE EN MEMORIA
      INPUT
      $page | direccion de la pagina
      OUTPUT
      STRING | devuelve un string con el codigo html cargado
     */

    public function load_page($page) {
        return file_get_contents($page);
    }

    /* METODO QUE ESCRIBE EL CODIGO PARA QUE SEA VISTO POR EL USUARIO
      INPUT
      $html | codigo html
      OUTPUT
      HTML | codigo html
     */

    public function view_page($html) {
        echo $html;
    }

    /* PARSEA LA PAGINA CON LOS NUEVOS DATOS ANTES DE MOSTRARLA AL USUARIO
      INPUT
      $out | es el codigo html con el que sera reemplazada la etiqueta CONTENIDO
      $pagina | es el codigo html de la pagina que contiene la etiqueta CONTENIDO
      OUTPUT
      HTML 	| cuando realiza el reemplazo devuelve el codigo completo de la pagina
     */

    public function replace_content($in = '/\#CONTENIDO\#/ms', $out, $pagina) {
        return preg_replace($in, $out, $pagina);
    }

}

?>