<?php



class ProductosModel extends Model implements IModel {
    
       /* function __construct() {
             parent::__construct();
        }*/

        private $id;
        private $nombre;
        private $descripcion;
        private $precioBase;
        private $impuesto;
        private $estado;
        private $stock;
        //private $precioFinal;

        public function setId($id){ $this->id = $id; }
        public function setNombre($nombre){ $this->nombre = $nombre; }
        public function setDescripcion($descripcion){ $this->descripcion = $descripcion; }
        public function setPrecioBase($precioBase){ $this->precioBase = $precioBase; }
        public function setImpuesto($impuesto){ $this->impuesto = $impuesto; }
        public function setEstado($estado){ $this->estado = $estado; }
        public function setStock($stock){ $this->stock = $stock; }
        //public function setPrecioFinal($precioFinal){ $this->precioFinal = $precioFinal; }

        public function getId(){ return $this->id; }
        public function getNombre(){ return $this->nombre; }
        public function getDescripcion(){ return $this->descripcion; }
        public function getPrecioBase(){ return $this->precioBase; }
        public function getImpuesto(){ return $this->impuesto; }
        public function getEstado(){ return $this->estado; }
        public function getStock(){ return $this->stock; }
        //public function getPrecioFinal(){ return $this->precioFinal; }

        public function __construct() {
            parent::__construct();
        }

        public function save(){
                //error_log("entro aqui con el prepare".$this->nombre );
                try{
                        $query = $this->prepare('INSERT INTO productos (nombre, decripcion, precioBase, impuesto, estado, stock) VALUES (:nombre, :descripcion, :precioBase, :impuesto, :estado, :stock)');
                        $query->execute([
                                'nombre' => $this->nombre,
                                'descripcion' => $this->descripcion,
                                'precioBase' => $this->precioBase,
                                'impuesto' => $this->impuesto,
                                'estado' => $this->estado,
                                'stock' => $this->stock
                                
                                
                        ]);
                        
                        /*$query = $this->prepare('INSERT INTO productos (nombre) VALUES (:nombre)');
                        $query->execute([
                                'nombre' => $this->nombre
                        ]);*/
                        if($query->rowCount()){
                                return true;
                        }else{
                                return false;
                        }

                }catch(PDOException $e){
                    echo $e->getMessage();
                    return false;
                }


        }
        
         



        public function getAll(){
                $items = [];
                try{
                        $query = $this->query('SELECT * FROM productos Where estado = "1"');

                        while($p = $query->fetch(PDO::FETCH_ASSOC)){
                                $item = new ProductosModel();
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
                try{
                        
                        //convertir el id de array a entero
                        //print_r($id);
                        //echo($id[0]);
                        //$id = (int)$id;
                        //error_log("id".$id );
                        
                        $query = $this->prepare('SELECT * FROM productos WHERE id = :id');
                        $query->execute([
                                'id' => $id[0]                                
                        ]);
                        $producto = $query->fetch(PDO::FETCH_ASSOC);
                        //print_r($producto);
                        //error_log("entro aqui con el prepare".$producto['nombre'] );
                        $this->from($producto);
                        return $this;
                } catch(PDOException $e){
                    echo $e->getMessage();
                    return false;
                }



        }


        public function delete($id){
                try{
                        print_r($id);
                        $query = $this->prepare('DELETE FROM productos WHERE id = :id');
                        $query->execute([
                                'id' => $id
                        ]);
                        return true;
                        

                }catch(PDOException $e){
                    echo $e->getMessage();
                    return false;
                }

        }

        public function update(){
                try{
                        
                        $query = $this->prepare('UPDATE productos SET nombre = :nombre, decripcion = :descripcion, precioBase = :precioBase, impuesto = :impuesto, estado = :estado, stock = :stock WHERE id = :id');
                        $query->execute([
                                'nombre' => $this->nombre,
                                'descripcion' => $this->descripcion,
                                'precioBase' => $this->precioBase,
                                'impuesto' => $this->impuesto,
                                'estado' => $this->estado,
                                'stock' => $this->stock,
                                //'precioFinal' => $this->precioFinal,
                                'id' => $this->id
                        ]);
                        if($query->rowCount()){
                                return true;
                        }else{
                                return false;
                        }                       

                }catch(PDOException $e){
                    echo $e->getMessage();
                    return false;
                }

        }

        public function from($array){
                $this->id = $array['id'];
                $this->nombre = $array['nombre'];
                $this->descripcion = $array['decripcion'];
                $this->precioBase = $array['precioBase'];
                $this->impuesto = $array['impuesto'];
                $this->estado = $array['estado'];
                $this->stock = $array['stock'];
                //$this->precioFinal = $array['precioFinal'];


        }
        
        public function getProductoByNombre($nombre){
                try{
                        $query = $this->prepare('SELECT * FROM productos WHERE nombre = :nombre');
                        $query->execute([
                                'nombre' => $nombre
                        ]);
                        $producto = $query->fetch(PDO::FETCH_ASSOC);
                        $this->from($producto);
                        return $this;
                } catch(PDOException $e){
                    echo $e->getMessage();
                    return false;
                }
        }

        public function getProductsByNombre($nombre){
                $items = [];
                try{
                        $query = $this->prepare('SELECT * FROM productos WHERE nombre LIKE :nombre');
                        $query->execute([
                                'nombre' => '%'.$nombre.'%'
                        ]);
                        while($p = $query->fetch(PDO::FETCH_ASSOC)){
                                $item = new ProductosModel();
                                $item->from($p);

                                array_push($items, $item);

                        }
                        return $items;
                                             

                        
                }catch(PDOException $e){
                    echo $e->getMessage();
                    return false;
                }
        }

        function disminuirStock($id){
                try{
                $query = $this->prepare('UPDATE productos SET stock = stock - 1 WHERE id = :id');
                        $query->execute([
                                'id' => $id[0]
                        ]);
                        return true;
                }catch(PDOException $e){
                    echo $e->getMessage();
                    return false;
                }
        }

        function aumentarStock($id){
                error_log("entro aqui con el prepare".$id );
                try{
                $query = $this->prepare('UPDATE productos SET stock = stock + 1, estado = "1" WHERE id = :id');
                        $query->execute([
                                'id' => $id
                        ]);
                        return true;
                }catch(PDOException $e){
                    echo $e->getMessage();
                    return false;
                }
        }

        function agotar($id){
                try{
                $query = $this->prepare('UPDATE productos SET estado = "0" WHERE id = :id');
                        $query->execute([
                                'id' => $id[0]
                        ]);
                        return true;
                }catch(PDOException $e){
                    echo $e->getMessage();
                    return false;
                }
        }






       
        
}




?>