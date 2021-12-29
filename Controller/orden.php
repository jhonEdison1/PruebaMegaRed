<?php
require_once 'Models/productosmodel.php';
require_once 'Models/ordenmodel.php';

    class Orden extends SessionController{

        private $user;
        private $ordenes;
       
        


        function __construct(){
            parent::__construct();
            $this->user = $this->getUserSessionData(); 
                
            error_log("Orden::construct");
            
        }

        function render() {
            $ordenes = $this->getOrderUser();
            //print_r($ordenes);
            $this->view->render('Orden/index', [
                'user' => $this->user,
                'ordenes' => $ordenes
                
            ]);
        }

        function addOrden($id){
            $producto = new ProductosModel();
            $producto->get($id);
            $orden = new OrdenModel();
            $orden->setProductosId($producto->getId());
            $orden->setUsuarioId($this->user->getId());
            $orden->setPrecio($producto->getPrecioBase());        
            
            $orden->setFecha(date('Y-m-d H:i:s'));
            $orden->setEstado('0');
            $orden->setNombre($producto->getNombre());
            $orden->save();
            //disminuir stock
            $producto->disminuirStock($id);
            //si el stock es 0, cambiar estado a 0
            
            if($producto->getStock()-1 == 0){
                $producto->Agotar($id);
                
            }
            //redirigir a dashboard con menssaaje de que se agrego
            $this->redirect('Dashboard', ['success' => SuccessMessages::ORDER_CREATE_SUCCESSFULLY] );
           
        }

        function getOrderUser(){
            $orden = new OrdenModel();
            return $orden->getOrderUser($this->user->getId());
           
        }

        function deleteOrden($id){            
            $orden = new OrdenModel();
            $uid =$orden->getProductIdbyorder($id);            
            print_r($uid);                     
            $orden->delete($id);
            //aumentar stock
            $producto = new ProductosModel();
            $producto->aumentarStock($uid);
            
            $this->redirect('Orden', ['success' => SuccessMessages::ORDER_DELETE_SUCCESSFULLY] );
        }	
        
        






        



        

        



    }






?>