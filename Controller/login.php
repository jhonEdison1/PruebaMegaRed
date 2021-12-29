<?php
    require_once 'Models/loginModel.php';
    class Login extends SessionController{


        function __construct(){
            parent::__construct();
            error_log("Login::construct");
            
        }

        function render(){
            error_log("Login::render");
            $this->view->render('Login/index');
        }

        function authenticate(){
            if($this->existPOST(['email', 'password'])){

                $email = $this->getPost('email');
                $password = $this->getPost('password');
                error_log("Login::authenticate->email: ".$email);
                

                if($email == '' || empty($email) ||  $password == '' || empty($password)){
                    $this->redirect('', ['error' => ErrorMessages::ERROR_LOGIN_DATA_EMPTY]);
                    return;
                }
                //error_log("Login::authenticate->model: ". $this->model);
                
                $user = $this->model->login($email, $password);
                

                if($user != null){
                    error_log('Login::authenticate() passed');   
                    $this->initialize($user);
                }else {
                    $this->redirect('', ['error' => ErrorMessages::ERROR_LOGIN_AUTHENTICATION]);

                }




            }else{
                $this->redirect('', ['error' => ErrorMessages::ERROR_LOGIN_DATA_EMPTY]);

            }

        }



    }






?>