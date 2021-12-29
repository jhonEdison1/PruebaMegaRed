<?php
require_once 'Models/productosmodel.php';
require_once 'Models/ordenmodel.php';
require_once 'Models/comprasmodel.php';

    class Compras extends SessionController{

        private $user;
        //private $ordenes;
       
        


        function __construct(){
            parent::__construct();
            $this->user = $this->getUserSessionData(); 
                
            error_log("Orden::construct");
            
        }

        function render() {
            //$ordenes = $this->getOrderUser();
            //print_r($ordenes);
            $compras = $this->getComprasUser();
            //print_r($compras);
            $this->view->render('Compras/index', [
                'user' => $this->user,
                'compras' => $compras
                
            ]);
        }

        function addCompra($total){
            //hacer un split de $total por wl caracte |
            $tot = explode("|", $total[0]);
            $userid = $this->user->getId();
            $productos = $tot[1];
            
            //hacer un split de productos y recorrer y llenar una matriz
            $prods = explode("¡", $productos);
            $produs = array();
            foreach($prods as $prod){
                array_push($produs, $prod);
            }
            $precio = $tot[2];
            $fecha = date('Y-m-d H:i:s');
            $nombre = $this->user->getNombre();
            //print_r($nombre);
            //enviar productos, usuario id, precio
            $compra = new ComprasModel();
            $compra->setUsuarioId($userid);            
            $compra->setProductos($productos);
            $compra->setPrecio($precio);
            $compra->setFecha($fecha);
            $compra->setNombreUsuario($nombre);
            $ordens =$tot[4];
            $ordenes = explode("¿", $ordens);
            foreach($ordenes as $orden){
                //actualizar el estado de la orden a 1
                $ordenmodel = new OrdenModel();
                $ordenmodel->updateestado($orden);
                //echo $orden;

                
            }
                                     
            $compra->save();           
            
            //redirigir a dashboard con menssaaje de que se agrego
            $this->redirect('Dashboard', ['success' => SuccessMessages::COMPRA_CREATE_SUCCESSFULLY] );


            
            

        }

        public function getComprasUser(){
            $compra = new ComprasModel();
            return $compra->getComprasUser($this->user->getId());
           
        }

        

        
        
        






        



        

        



    }






?>