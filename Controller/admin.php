<?php

class Admin extends SessionController{
   
    private $user;
    function __construct(){
        parent::__construct();
        $this->user = $this->getUserSessionData();      
    }

    function render(){

        //$stats = $this->getStatistics();TODO: eliminar si no se usa
        $users = $this->getUsers();
        
        //mostrar usuarios falta
       
        
        $this->view->render('Admin/index',
        [
            'users' => $users,
            'user' => $this->user

        ]);
    }

    //TODO: el admin crea usuarios


    //TODO: posiblemente toque remplazar por solo getusers
    function getStatistics(){        
        $res = [];
        $userModel = new UserModel();
        $users = $userModel->getAll();
        $res['count-users'] = count($users);

        return $res;



    }
    function getUsers(){
        $userModel = new UserModel();              
        return $users = $userModel->getAll();
    }

    function getBloqueados(){
        $userModel = new UserModel();              
        $users = $userModel->getBloqueados();
        $this->view->render('Admin/bloqueados',
        [
            'users' => $users,
            'user' => $this->user

        ]);

    }

    function cerrarSession(){
        $this->logout();
        $this->redirect('Login', [] );
    }

    function bloquearUsuario($id){
        $userModel = new UserModel();
        $userModel->bloquearUsuario($id);
        $this->redirect('Admin', [] );
       
    }
    function desbloquearUsuario($id){
        $userModel = new UserModel();
        $userModel->desbloquearUsuario($id);
        $this->redirect('Admin', [] );
       
    }
    function profile() {
        $this->view->render('Admin/profile', [
            'user' => $this->user
        ]);
    }



}



?>