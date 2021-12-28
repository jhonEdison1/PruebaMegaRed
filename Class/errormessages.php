<?php

class ErrorMessages{

    //Error_Controller_Method_action
    const ERROR_ADMIND_NEWUSER_EMAIL_EXISTS = "1001";
    const ERROR_SINGUP_NEWUSER = "1002";
    const ERROR_SINGUP_NEWUSER_EMPTY = "1003";
    const ERROR_LOGIN_DATA_EMPTY = "1004";
    const ERROR_LOGIN_AUTHENTICATION = "1005";
    


    private $errorList = [];

    function __construct() {
        $this->errorList = [
            ErrorMessages::ERROR_ADMIND_NEWUSER_EMAIL_EXISTS => "El email asociado a este usuario ya existe",
            ErrorMessages::ERROR_SINGUP_NEWUSER => "Error al crear el usuario",
            ErrorMessages::ERROR_SINGUP_NEWUSER_EMPTY => "Datos insuficientes para crear el usuario",
            ErrorMessages::ERROR_LOGIN_DATA_EMPTY => "El email y la contraseña no pueden estar vacios",
            ErrorMessages::ERROR_LOGIN_AUTHENTICATION => "El email o la contraseña son incorrectos",
            
        ];
        
        
    }

    public function get($hash){
        return $this->errorList[$hash];
    }


    public function existsKey($key){
        if(array_key_exists($key, $this->errorList)){
            return true;
        }else{
            return false;
        }
    }
    



}




?>