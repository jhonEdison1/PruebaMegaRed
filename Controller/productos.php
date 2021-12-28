<?php

require_once 'Models/productosmodel.php';
class Productos extends SessionController{

    private $user;

    function __construct(){
        parent::__construct();
        error_log("Productos::construct");
        $this->user = $this->getUserSessionData();
       
    }

    function render(){
        error_log("Productos::render");
        $this->view->render('Productos/index', [
            'user' => $this->user
        ]);
    }

    function newProducto(){
        if(!$this->existPOST(['nombre', 'descripcion', 'precioBase', 'impuesto', 'estado', 'stock'])){ 
            $this->redirect('Dashboard', [] );//error
            return;
        }
        if($this->user === null){
           
            $this->redirect('Dashboard', [] );//error
            return;

        }

        $producto = new ProductosModel();
        $producto->setNombre($this->getPOST('nombre'));
        error_log("get".$producto->getNombre());
        $producto->setDescripcion($this->getPOST('descripcion'));
        $producto->setPrecioBase((float)$this->getPOST('precioBase'));
        $producto->setImpuesto((float)$this->getPOST('impuesto'));
        $producto->setEstado($this->getPOST('estado'));
        $producto->setStock($this->getPOST('stock'));

        $producto->save();
        error_log("aqui");
        $this->redirect('Dashboard',  ['success' => SuccessMessages::PRODUCTO_CREATE_SUCCESSFULY] );//success        

    }

    function create(){
        error_log("Productos::create");
        $this->view->render('Productos/create', [
            'user' => $this->user
        ]);

    }

    //maybe
    function getProductosJson(){
        error_log("Productos::getProductos");
        $productos = new ProductosModel();
        $productos = $productos->getAll();
        echo json_encode($productos);

        
    }

    function delete($params){
        if($params === null){
            $this->redirect('Productos', [] );//error
            
        }
        $id = $params[0];
        $res = $this->model->delete($id);

        if($res){
            $this->redirect('Productos', [] );//success
        }else{
            $this->redirect('Productos', [] );//error
        }



    }

    public function getProductos(){
        error_log("Productos::getProductos");
        $productos = new ProductosModel();        
        return $productos->getAll();
        
    }



    

}


?>