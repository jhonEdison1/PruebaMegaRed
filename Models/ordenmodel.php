<?php

class OrdenModel extends Model implements IModel {

    private $id;
    private $productosId;
    private $precio;
    private $usuarioId;
    private $fecha;
    private $estado;
    private $nombre;


    public function __construct() {
        parent::__construct();
    }

    public function addToCart(){
        

    }



    public function save(){
        try{
            $query = $this->prepare('INSERT INTO ordenes (idProductos, idUsuario, precio, fecha, estado, nombre) VALUES (:productosId, :usuarioId,  :precio, :fecha, :estado, :nombre)');
            $query->execute([
                'productosId' => $this->productosId,               
                'usuarioId' => $this->usuarioId, 
                'precio' => $this->precio,               
                'fecha' => $this->fecha,
                'estado' => $this->estado,
                'nombre' => $this->nombre
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
        $items = [];
        try{
                $query = $this->query('SELECT * FROM ordenes ');

                while($p = $query->fetch(PDO::FETCH_ASSOC)){
                        $item = new OrdenModel();
                        $item->from($p);

                        array_push($items, $item);

                }
                return $items;
                                     

                
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }


}
    public function get($id){

    }
    public function delete($id){
        try{
            print_r($id);
            $query = $this->prepare('DELETE FROM ordenes WHERE id = :id');
            $query->execute([
                    'id' => $id[0]
            ]);
            return true;
            

    }catch(PDOException $e){
        echo $e->getMessage();
        return false;
    }

    }
    public function update(){

    }
    public function from($array){
        $this->id = $array['id'];
        $this->productosId = $array['idProductos'];
        $this->usuarioId = $array['idUsuario'];
        $this->precio = $array['precio'];        
        $this->fecha = $array['fecha'];
        $this->estado = $array['estado'];
        $this->nombre = $array['nombre'];

    }

    public function getProductIdbyorder($id){
        try{
            $query = $this->prepare('SELECT idProductos FROM ordenes WHERE id = :id');
            $query->execute([
                'id' => $id[0]
            ]);
            $result = $query->fetch(PDO::FETCH_ASSOC);
            return $result['idProductos'];
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    
    public function getOrderUser($id){
        $estado = 0;
        $items = [];
        try{
                $query = $this->query('SELECT * FROM ordenes  Where idUsuario = "'.$id.'" and estado = "'.$estado.'"');
                /*SELECT expression FROM table1 [t1] 
                FULL JOIN table2 [t2] 
                ON table1.column_name = table2.column_name;*/

                

                while($p = $query->fetch(PDO::FETCH_ASSOC)){
                        $item = new OrdenModel();
                        $item->from($p);

                        array_push($items, $item);

                }
                return $items;
                                     

                
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
        
    }

    public function updateestado($id){
        echo $id;
        try{
            $query = $this->prepare('UPDATE ordenes SET estado = "1" WHERE id = :id');
            $query->execute([
                'id' => $id
            ]);
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    


    //getters 
    public function getId(){ return $this->id; }
    public function getProductosId(){ return $this->productosId; }
    public function getPrecio(){ return $this->precio; }
    public function getUsuarioId(){ return $this->usuarioId; }
    public function getFecha(){ return $this->fecha; }
    public function getEstado(){ return $this->estado; }
    public function getNombre(){ return $this->nombre; }

    //setters
    public function setId($id){ $this->id = $id; }
    public function setProductosId($productosId){ $this->productosId = $productosId; }
    public function setPrecio($precio){ $this->precio = $precio; }
    public function setUsuarioId($usuarioId){ $this->usuarioId = $usuarioId; }
    public function setFecha($fecha){ $this->fecha = $fecha; }
    public function setEstado($estado){ $this->estado = $estado; }
    public function setNombre($nombre){ $this->nombre = $nombre; }




}



?>