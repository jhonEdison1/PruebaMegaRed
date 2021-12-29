
<?php

class ComprasModel extends Model{

    private $id;
    private $usuarioId;
    private $productos;
    private $precio;
    private $fecha;
    private $nombreUsuario;

    public function __construct(){
        parent::__construct();
    }

    public function from($array){
        $this->id = $array['id'];    
        $this->usuarioId = $array['idUsuario'];
        $this->productos = $array['productos'];
        $this->precio = $array['precio'];        
        $this->fecha = $array['fecha'];        
        $this->nombreUsuario = $array['nombreUsuario'];

    }
    public function fechasfrom(){
        $this->fecha = $array['fecha'];
    }
    public function save(){
        try{
            $query = $this->prepare('INSERT INTO compras (idUsuario, productos, precio, fecha,  nombreUsuario) VALUES (:idUsuario, :productos,  :precio, :fecha,  :nombreUsuario)');
            $query->execute([
                             
                'idUsuario' => $this->usuarioId,
                'productos' => $this->productos,
                'precio' => $this->precio,               
                'fecha' => $this->fecha,                
                'nombreUsuario' => $this->nombreUsuario
            ]);
            /*$query = $this->prepare('INSERT INTO compras (idUsuario , productos ) VALUES (:idUsuario, :productos)');
            $query->execute([
                             
                'idUsuario' => $this->usuarioId,
                'productos' => $this->productos
            ]);*/
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
                $query = $this->query('SELECT * FROM compras ');

                while($p = $query->fetch(PDO::FETCH_ASSOC)){
                        $item = new ComprasModel();
                        $item->from($p);

                        array_push($items, $item);

                }
                return $items;
                                     

                
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }


}

    public function getAllDates(){
        $items = [];
        try{
                $query = $this->query('SELECT fecha FROM compras ');

                while($p = $query->fetch(PDO::FETCH_ASSOC)){
                        $item = new ComprasModel();
                        $item->fechasfrom($p);
                        array_push($items, $item);

                }
                return $items;
                                     

                
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }


    public function getComprasUser($id){
        $estado = 0;
        $items = [];
        try{
                $query = $this->query('SELECT * FROM compras  Where idUsuario = "'.$id.'"');                             
                    while($p = $query->fetch(PDO::FETCH_ASSOC)){
                        $item = new ComprasModel();
                        $item->from($p);

                        array_push($items, $item);

                }
                return $items;
                                     

                
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
        
    }



    //getters y setters
    public function getId(){
        return $this->id;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getUsuarioId(){
        return $this->usuarioId;
    }

    public function setUsuarioId($usuarioId){
        $this->usuarioId = $usuarioId;
    }

    public function getProductos(){
        return $this->productos;
    } 
    public function setProductos($productos){
        $this->productos = $productos;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function setPrecio($precio){
        $this->precio = $precio;
    }
    public function getfecha(){
        return $this->fecha;
    }
    public function setfecha($fecha){
        $this->fecha = $fecha;
    }
    public function getNombreUsuario(){
        return $this->nombreUsuario;
    }
    public function setNombreUsuario($nombreUsuario){
        $this->nombreUsuario = $nombreUsuario;
    }


}


?>