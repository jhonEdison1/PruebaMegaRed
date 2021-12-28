<?php
require_once 'Models/productosmodel.php';

    class Dashboard extends SessionController{

        private $user;


        function __construct(){
            parent::__construct();
            $this->user = $this->getUserSessionData();
            //print_r( $this->user->getNombre());
            error_log("Dashboard::construct");
            
        }

        function render(){
            error_log("Dashboard::render");
            $productosModel = new ProductosModel();
            $productos = $this->getProductos();
            
            $userN= $this->user->getNombre();
            $this->view->render('Dashboard/index' , [
                //posiblemente use el id
                'user' => $this->user,
                'productos' => $productos
            ]);
           
        }

        public function getProductos(){
            $productos = new ProductosModel();
            return $productos->getAll();

        }

        public function showProducto($id){
            $productos = new ProductosModel();
            $producto = $productos->get($id);
            $this->view->render('Dashboard/show', [
                'user' => $this->user,
                'producto' => $producto
            ]);
        }

        public function eliminarProducto($id){
            error_log("Dashboard::eliminarProducto" . $id[0]);
            $productos = new ProductosModel();
            $productos->delete($id[0]);
            //navegar a dashboard
            header('Location: ' . constant('URL') . '/Dashboard');
            
           
        }

        



        

        



    }






?>