<?php

class Admin extends SessionController{

    function __construct(){
        parent::__construct();       
    }

    function render(){

        //$stats = $this->getStatistics();TODO: eliminar si no se usa
        $this->view->render('DashboardAdmin/index',
        [
            'stast' => $stats

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



}



?>