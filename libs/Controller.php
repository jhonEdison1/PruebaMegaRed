<?php

class Controller {

    function __construct() {
        //echo 'Controlador principal';
        $this->view = new View();
    }


    function loadModel($model) {
        $url = 'Models/' . $model . 'model.php';
        if (file_exists($url)) {
            require_once $url;
            $modelName = $model . 'Model';
            $this->model = new $modelName();
           
        }


        
    }

    function existPOST($params){
        foreach ($params as $param){
            //echo $param;
            if(!isset($_POST[$param])){
                error_log("Controller::existsPost-> no Existe el parametro  ".$param);
                return false;  
            }

        }
        return true;

    }

    function existGET($params){
        foreach ($params as $param){
            if(!isset($_GET[$param])){
                error_log("Controller::existsGET-> no Existe el parametro  ".$param);
                return false;  
            }

        }
        return true;

    }

    function getGet($name){
        return $_GET[$name];

    }

    function getPost($name){
        return $_POST[$name];

    }

    function redirect($route, $mensajes = []){
        $data = [];
        $params = '';

        foreach ($mensajes as $key => $mensaje){
            array_push($data, $key . '=' . $mensaje);
        }

        $params = join('&', $data);


        if($params != ''){
            $params = '?' . $params;
            
        }

        header('Location: ' . constant('URL') . '/' . $route .$params);


    }




}





?>