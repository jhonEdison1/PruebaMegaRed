<?php

require_once 'Class/session.php';
require_once 'Models/usermodel.php';

class SessionController extends Controller{


    private $userSession;
    private $name;
    private $userId;

    private $session;
    private $sites;
   // private $defaultSites;

    private $user;
/*
    public function getValue(){
        return $_SESSION[$this->session];
    }*/

    public function __construct(){
        parent::__construct();
        $this->init();
    }

    public function init(){
        $this->session = new Session();
        $json = $this->getJSONFileConfig();
        $this->sites = $json['sites'];
        $this->defaultSites = $json['default-sites'];

        $this->validateSession();


    }

    private function getJSONFileConfig(){
        $string = file_get_contents('config/access.json');
        $json = json_decode($string, true);
        return $json;
    }

    public function validateSession(){
        error_log('SESSION CONTROLLER::validateSession');
        if($this->existsSession()){

            //existe la sesion
            $role = $this->getUserSessionData()->getRole();

            //validar si la pagina a entrar es publica

            if($this->isPublic()){
                //pagina publica
                $this->redirectDefaultSiteByRole($role);


            }else{
                //pagina privada
                if($this->isAuthorized($role)){
                   //pagina autorizada

                }else {
                    //pagina no autorizada
                    $this->redirectDefaultSiteByRole($role);
                }

            }


        }else{
            //no existe la session
            if($this->isPublic()){
                //pagina publica
                error_log('SessionController::validateSession() public page');
                
            }else{
                //pagina privada
                //header('Location:' . constant('URL') . '');
                header('location: '. constant('URL') . '');
            }
        }                 
    }


    public function existsSession(){
        if(!$this->session->exists()){return false;}
        if($this->session->getCurrentUser() == null){return false;}

        $userId = $this->session->getCurrentUser();

        if($userId){return true;}
        return false;



    }

    public function getUserSessionData(){
        $id = $this->session->getCurrentUser();

        $this->user = new UserModel();
        $this->user->get($id);
        error_log('SESSION CONTROLLER::getUserSessionData->' .$this->user->getNombre());
        return $this->user;


    }
    function initialize($user){
        $this->session->setCurrentUser($user->getId());
        $this->authorizedAcess($user->getRole());



    }

    public function isPublic(){
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace("/\?.*/", "", $currentURL);

        for($i=0; $i < sizeof($this->sites); $i++ ){
            if($currentURL == $this->sites[$i]['site'] && $this->sites[$i]['access'] == 'public'){
                return true;

            }

        }
        return false;

        
    }

   

    private function redirectDefaultSiteByRole($role){
        $url = '';
        for($i=0; $i < sizeof($this->sites); $i++ ){
            if($this->sites[$i]['role'] == $role){
                ///verificar esto y posiblemente la diagonal
                $url = '/PruebaMegaRed/' . $this->sites[$i]['site'];
                break;

            }

        }
        //. constant('URL')
        header('Location: '   . $url);

    }
    private function isAuthorized($role){
        $currentURL = $this->getCurrentPage();
        $currentURL = preg_replace("/\?.*/", "", $currentURL);

        for($i=0; $i < sizeof($this->sites); $i++ ){
            if($currentURL == $this->sites[$i]['site'] && $this->sites[$i]['role'] == $role){
                return true;

            }

        }
        return false;

    }
    public function getCurrentPage(){
        $actualLink = trim("$_SERVER[REQUEST_URI]");
        $url = explode('/', $actualLink);
        error_log('SESSION CONTROLLER::getCurrentPage->' .$url[2]);
        return $url[2];
       
    }

    

    


    function authorizedAcess($role){
        switch($role){
            case 'user':
                
                error_log('default site' . $this->defaultSites['user']);
                $this->redirect($this->defaultSites['user']);                              
            break;
            case 'admin':

                $this->redirect($this->defaultSites['admin']);
                
            break;
            default:

            
        }
    }

    function logout(){
        $this->session->closeSession();
        
    }






}







?>