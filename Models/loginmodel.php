<?php

require_once 'Models/usermodel.php';

class LoginModel extends Model {
    
        function __construct() {
             parent::__construct();
        }


        function login($email, $password){
                try{
                        
                        $query = $this->prepare('SELECT * FROM usuarios WHERE email = :email');
                        $query->execute([
                                'email' => $email
                        ]);
                        if($query->rowCount() == 1){
                                $item = $query->fetch(PDO::FETCH_ASSOC);

                                $user = new UserModel();
                                $user-> from($item);
                                error_log('login: user id '.$user->getId());
                                error_log('login: user email '.$user->getEmail());
                                error_log('login: user password '.$user->getPassword());
                                error_log('login: user password form '.$password);
                                
                                
                                
                                //password_verify($password, $user->getPassword())
                                if($password == $user->getPassword()){        
                                        error_log('entro al bien');

                                        error_log('LoginModel::login->success');
                                        return $user;
                                }else{
                                        error_log('entro al mal');
                                        error_log('LoginModel::login->error');
                                        return null;
                                }

                        }
                        
                }catch(PDOException $e){
                    error_log('LOGINMODEL::login->PDOException '.$e->getMessage());
                    return null;
                }

        }
        
}




?>