<?php

require_once  'controller/CoreController.php';

class SiteController extends CoreController {

    function principal() {

        $pagina = $this->load_template();
        $content = $this->load_page('view/main.php');
        $pagina = $this->replace_content('/\#CONTENIDO\#/ms',$content,$pagina);
        $this->view_page($pagina);
        
    }

}

?>

