<?php

class Errores extends Controller{


    function __construct(){
        parent::__construct();
        error_log("Errores::construct"); 
        

    }

    function render(){
        error_log("Errores::render");
        $this->view->render('errores/index');
    }
}



?>