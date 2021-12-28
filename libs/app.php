<?php
    require_once("Controller/errores.php");

    class App{

        function __construct(){
            
            $url = isset($_GET['url']) ? $_GET['url'] : null;
            $url = rtrim($url, '/');
            $url = explode('/', $url);
            


            if(empty($url[0])){
                
                error_log("App::construct-> no hay controlador especificado");
                $archivoController = 'Controller/login.php';
                require_once $archivoController;
                $controller = new Login();
                $controller->loadModel('Login');
                $controller->render();
                return false;
            }
            
            $archivoController = 'Controller/' . $url[0] . '.php';
            if(file_exists($archivoController)){
                require_once $archivoController;
                $controller = new $url[0];
                $controller->loadModel($url[0]);

                if(isset($url[1])){                
                    if(method_exists($controller, $url[1])){

                        if(isset($url[2])){ 
                            $nparam = count($url) -2;
                            
                            $params = [];

                            for ($i=0; $i < $nparam ; $i++) { 
                                array_push($params, $url[$i+2]);
                                
                            }
                            $controller->{$url[1]}($params);


                        }else{
                            //no hay parametros
                            $controller->{$url[1]}();
                        }


                    }else{
                        //no existe el metodo
                        $controller =new Errores();
                        $controller->render();

                    }                   

                }else{
                    //no existe  el metodo a cargar, cargar metodo por default
                    $controller->render();
                }

            }else{
                //no existe el controlador llamar a 404
                $controller =new Errores();
                $controller->render();
            }



        }
    }




?>