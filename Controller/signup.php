<?php

require_once 'Models/usermodel.php';
class Signup extends SessionController{

    function __construct(){
        parent::__construct();
        error_log("Singup::construct");

    }

   

    function render(){
        error_log("Singup::render");
        $this->view->render('Login/signup');
    }

    function newUser(){
        if($this->existPOST(['nombre', 'apellido','email', 'password'])){

           $nombre = $this->getPOST('nombre');
           $apellido = $this->getPOST('apellido');
           $email = $this->getPost('email');
           $password = $this->getPost('password');

           if($email == '' || empty($email) || $password == '' || empty($password) || $nombre == ''  || empty($nombre) || $apellido == '' || empty($apellido)){
               $this->redirect('signup', ['error' => ErrorMessages::ERROR_SINGUP_NEWUSER_EMPTY]); 
           }
           $user = new UserModel();
           $user->setNombre($nombre);
           $user->setApellido($apellido);
           $user->setEmail($email);
           $user->setPassword($password);
           $user->setRole('user');

           if($user->exists($email)){
              $this->redirect('signup', ['error' => ErrorMessages::ERROR_ADMIND_NEWUSER_EMAIL_EXISTS]);
           }else if($user->save()){
               //por el momento a login, luego al dashboard de admin
                $this->redirect('Admin', ['success' => SuccessMessages::USER_CREATE_SUCCESSFULLY]);

           }else{
                $this->redirect('signup', ['error' => ErrorMessages::ERROR_SINGUP_NEWUSER]);
           }
           


        }else{
            $this->redirect('signup', ['error' => ErrorMessages::ERROR_SINGUP_NEWUSER]);
        }
    }


    


}




?>