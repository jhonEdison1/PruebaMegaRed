<?php

class UserModel extends Model implements IModel {

    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $permisos;
    private $rol;



    public function __construct(){
        parent::__construct();
        $this->name = '';
        $this->apellido = '';
        $this->email = '';
        $this->password = '';
        $this->permisos = '';
        $this->rol = '';



    }

    public function save(){
        try{
            $query= $this->prepare('INSERT INTO usuarios (nombre, apellido, email, password, rol) VALUES (:nombre, :apellido, :email, :password,  :rol)');
           // $query= $this->prepare('INSERT INTO usuarios (email, password,rol) VALUES (:email, :password, :rol)');
            $query->execute([
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'email' => $this->email,
                'password' => $this->password,
               // 'permisos' => $this->permisos
                'rol' => $this->rol
            ]);
            return true;        

        }catch(PDOException $e){
            error_log('USERMODEL::save->PDOException '.$e->getMessage());
            return false;
        }

        

    }
    public function getAll(){
        $items = [];
        try{
            $query = $this->query('SELECT * FROM usuarios');
            while($p = $query->fetch(PDO::FETCH_ASSOC)){
                $item = new UserModel();
                
                $item->setId($p['id']);
                $item->setNombre($p['nombre']);
                $item->setApellido($p['apellido']);
                $item->setEmail($p['email']);
                $item->setPassword($p['password']);
                $item->setPermisos($p['permisos']);
                $item->setRole($p['rol']);

                array_push($items, $item);


            }
            return $items;

            
        }catch(PDOException $e){
            error_log('USERMODEL::getAll->PDOException '.$e->getMessage());
            return false;
        }

    }


    private function getHashedPassword($password){
        return password_hash($password, PASSWORD_DEFAULT, ['cost' => 10]);
        
    }
    public function get($id){
        try{
            $query = $this->prepare('SELECT * FROM usuarios WHERE id = :id');
            $query->execute([
                'id' => $id
            ]);
            $user = $query->fetch(PDO::FETCH_ASSOC);
           
            $this->setId($user['id']);
            $this->setNombre($user['nombre']);
            $this->setApellido($user['apellido']);
            $this->setEmail($user['email']);
            $this->setPassword($user['password']);
            $this->setPermisos($user['permisos']);
            $this->setRole($user['rol']);

            return $this;

        }catch(PDOException $e){
            error_log('USERMODEL::get->PDOException '.$e->getMessage());
            return false;
        }
        


    }


    public function delete($id){
        try{
            $query = $this->prepare('DELETE FROM usuarios WHERE id = :id');
            $query->execute([
                'id' => $id
            ]);
            return true;
        }catch(PDOException $e){
            error_log('USERMODEL::delete->PDOException '.$e->getMessage());
            return false;
        }

    }

    public function update(){
        try{
            $query = $this->prepare('UPDATE usuarios SET nombre = :nombre, apellido = :apellido, email = :email, password = :password, permisos = :permisos, rol = :rol WHERE id = :id');
            $query->execute([
                'id' => $this->id,
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'email' => $this->email,
                'password' => $this->password,
                'permisos' => $this->permisos,
                'rol' => $this->rol
            ]);
            return true;


        } catch(PDOException $e){
            error_log('USERMODEL::update->PDOException '.$e->getMessage());
            return false;
        }

    }

    public function from($array){
        $this->id = $array['id'];
        $this->nombre = $array['nombre'];
        $this->apellido = $array['apellido'];
        $this->email = $array['email'];
        $this->password = $array['password'];
        $this->permisos = $array['permisos'];
        $this->rol = $array['rol'];

    }

    public function exists($email){
        try{
            $query = $this->prepare('SELECT email FROM usuarios WHERE email = :email');
            $query->execute([
                'email' => $email
            ]);
            if($query->rowCount()>0)
            {
                return true;
            }else{
                return false;
            }
           
        }catch(PDOException $e){
            error_log('USERMODEL::exists->PDOException '.$e->getMessage());
            return false;
        }



    }

    /*public function comparePasswords($password, $id){
        try{
            $user = $this->get($id);
            return password_verify($password, $user->getPassword());

        }catch(PDOException $e){
            error_log('USERMODEL::comparePasswords->PDOException '.$e->getMessage());
            return false;
        }
    }*/
    function comparePasswords($current, $userid){
        try{
            $query = $this->db->connect()->prepare('SELECT id, password FROM usuarios WHERE id = :id');
            $query->execute(['id' => $userid]);
            
            if($row = $query->fetch(PDO::FETCH_ASSOC)) return password_verify($current, $row['password']);

            return NULL;
        }catch(PDOException $e){
            return NULL;
        }
    }







    //quede en el video 5

    //getters y setters
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function setApellido($apellido){
        $this->apellido = $apellido;

    }

    public function getApellido(){
        return $this->apellido;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getEmail(){
        return $this->email;
    }

    /*public function setPassword($password){
        $this->password = $this->getHashedPassword($password);

    }*/
    /*
    public function setPassword($password, $hash = true){ 
        if($hash){
            $this->password = $this->getHashedPassword($password);
        }else{
            $this->password = $password;
        }
    }*/
    public function setPassword($password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }

    public function setPermisos($permisos){
        $this->permisos = $permisos;

    }

    public function getPermisos(){
        return $this->permisos;
    }

    public function setRole($rol){
        $this->rol = $rol;
    }

    public function getRole(){
        return $this->rol;
    }


    







}




?>