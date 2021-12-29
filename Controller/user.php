<?php

require_once 'Models/usermodel.php';

class User extends SessionController {

    private $user;

    function __construct() {
        parent::__construct();
        $this->user = $this->getUserSessionData();
        
    }

    function render() {
        $this->view->render('User/index', [
            'user' => $this->user
        ]);
    }

    function updatePassword(){
        /*
        if(!$this->existPOST(['password', 'newPassword', 'newPassword2'])){
            $this->redirect('Dashboard', [] );//error
            return;
        }*/ //TODO: implementaru un password mejorado

        if(!$this->existPOST('password')){
            $this->redirect('User', [] );//error TODO: implementar el error
            return;
        }
        $password = $this->getPOST('password');

        if(empty($password) || $password === ''){
            $this->redirect('User', [] );//error TODO: implementar el error
            return;
        } 

        $this->user->setPassword($password);
        if($this->user->update()){ 
            error_log('password actualizado' . $this->user->getRole());
            if($this->user->getRole() === 'admin'){
                $this->redirect('Admin', ['success' =>SuccessMessages::PASSWORD_UPDATE_SUCCESSFULLY] );
            }else{
                $this->redirect('Dashboard', ['success' =>SuccessMessages::PASSWORD_UPDATE_SUCCESSFULLY] );
            }
            //success TODO: implementar el success
        }
    }

    function cerrarSession(){
        $this->logout();
        $this->redirect('Login', [] );
    }



    }








   



?>