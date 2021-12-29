<?php
require_once 'Models/productosmodel.php';

    class Carrito extends SessionController{

        private $user;
        private $session;
        private $items = [];
        


        function __construct(){
            parent::__construct();
            $this->user = $this->getUserSessionData(); 
            //$this->session = $this->getValue();   
            $this->items = $this->getCart();       
            error_log("Carrito::construct");
            
        }

        function render() {
            $this->view->render('Carrito/index', [
                'user' => $this->user,
                'session' => $this->session,
                'items' => $this->items
            ]);
        }
        
        function addToCart($id){
            //array_push($this->items, $id);   
            //echo "Producto agregado al carrito";
            //$user['carrito'] = $id;

            
        }

        function getCart(){
            return $this->items;
        }





        /*function load(){
            if($this->user === null){
                $this->redirect('Login', [] );
                return [];
            }

            return $this->user;
        }
        
        public function add($id){
            if($this->user === null){
                $items = [];
            }else{
                $items = json_decode($user , 1);
            }

        }*/



        



        

        



    }






?>