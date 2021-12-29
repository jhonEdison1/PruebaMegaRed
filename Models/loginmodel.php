<?php

require_once 'Models/usermodel.php';

class LoginModel extends Model {
    
        function __construct() {
             parent::__construct();
        }


        function login($email, $password){
                try{                        
                        $query = $this->prepare('SELECT * FROM usuarios WHERE email = :email AND permisos = :permisos');
                        $query->execute([
                                'email' => $email,
                                'permisos' => 'Activo'
                        ]);
                        if($query->rowCount() == 1){
                                $item = $query->fetch(PDO::FETCH_ASSOC);

                                $user = new UserModel();
                                $user-> from($item);
                                error_log('login: user id '.$user->getId());                                                                                         
                                //password_verify($password, $user->getPassword())
                                if($password == $user->getPassword()){       
                                     error_log('LoginModel::login->success');
                                      return $user;
                                }else{                                     
                                        error_log('LoginModel::login->error');
                                        //modificar los intentos de login fallidos y bloquear si hay mas de 3 intentos
                                        $query1 = $this->prepare('SELECT * FROM intentosLogin WHERE email = :email');
                                        $query1->execute([
                                                'email' => $email
                                        ]);
                                        if($query1->rowCount() == 0){
                                                $query = $this->prepare('INSERT INTO intentosLogin (email) VALUES (:email )');
                                                $query->execute([
                                                        'email' => $email
                                                        
                                                ]);
                                                error_log('LoginModel::login->intentosLogin->0-1');
                                                return null;
                                        }else if($query1->rowCount()> 0 && $query1->rowCount() < 3){
                                                $query = $this->prepare('INSERT INTO intentosLogin (email) VALUES (:email )');
                                                $query->execute([
                                                        'email' => $email
                                                ]);
                                                error_log('LoginModel::login->intentosLogin->1-3');
                                                return null;
                                        }else if($query1->rowCount() == 3){
                                                $query = $this->prepare('UPDATE usuarios SET permisos = :permisos WHERE email = :email');
                                                $query->execute([
                                                        'email' => $email,
                                                        'permisos' => 'Bloqueado'
                                                ]);
                                                error_log('LoginModel::login->intentosLogin->3');
                                                
                                                return null;
                                               
                                        }
                                        

                                        return null;
                                }

                        }else {
                                error_log('LoginModel::login->error');
                                return null;
                        }
                        
                }catch(PDOException $e){
                    error_log('LOGINMODEL::login->PDOException '.$e->getMessage());
                    return null;
                }

        }
        
}




?>