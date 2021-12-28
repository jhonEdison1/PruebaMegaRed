<?php

class OrdenModel extends Model implements IModel {

    private $id;
    private $productosId;
    private $precio;
    private $usuarioId
    private $fecha;
    private $estado;


    public function __construct() {
        parent::__construct();
    }

    public function addToCart(){
        

    }



    public function save(){
        try{
            $query = $this->prepare('INSERT INTO ordenes (productosId, precio, usuarioId, fecha, estado) VALUES (:productosId, :precio, :usuarioId, :fecha, :estado)');
            $query->execute([
                'productosId' => $this->productosId,
                'precio' => $this->precio,
                'usuarioId' => $this->usuarioId,
                'fecha' => $this->fecha,
                'estado' => $this->estado
            ]);
            if($query->rowCount()){
                return true;
            }else{
                return false;
            }

        }catch(PDOException $e){
            error_log("Error en OrdenModel::save: " . $e->getMessage());
            return false;

        }


    }
    public function getAll(){

    }
    public function get($id){

    }
    public function delete($id){

    }
    public function update(){

    }
    public function from($array){

    }


    //getters 
    public function getId(){ return $this->id; }
    public function getProductosId(){ return $this->productosId; }
    public function getPrecio(){ return $this->precio; }
    public function getUsuarioId(){ return $this->usuarioId; }
    public function getFecha(){ return $this->fecha; }
    public function getEstado(){ return $this->estado; }

    //setters
    public function setId($id){ $this->id = $id; }
    public function setProductosId($productosId){ $this->productosId = $productosId; }
    public function setPrecio($precio){ $this->precio = $precio; }
    public function setUsuarioId($usuarioId){ $this->usuarioId = $usuarioId; }
    public function setFecha($fecha){ $this->fecha = $fecha; }
    public function setEstado($estado){ $this->estado = $estado; }




}



?>