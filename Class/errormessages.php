<?php

class ErrorMessages{

    //Error_Controller_Method_action
    const ERROR_ADMIND_NEWUSER_EMAIL_EXISTS = "1001";
    const ERROR_SINGUP_NEWUSER = "1002";
    const ERROR_SINGUP_NEWUSER_EMPTY = "1003";
    const ERROR_LOGIN_DATA_EMPTY = "1004";
    const ERROR_LOGIN_AUTHENTICATION = "1005";
    const ERROR_PRODUCT_STOCK_AND_ESTADO = "1006";
    const ERROR_LOGIN_BLOCKED = "1007";
    


    private $errorList = [];

    function __construct() {
        $this->errorList = [
            ErrorMessages::ERROR_ADMIND_NEWUSER_EMAIL_EXISTS => "El email asociado a este usuario ya existe",
            ErrorMessages::ERROR_SINGUP_NEWUSER => "Error al crear el usuario",
            ErrorMessages::ERROR_SINGUP_NEWUSER_EMPTY => "Datos insuficientes para crear el usuario",
            ErrorMessages::ERROR_LOGIN_DATA_EMPTY => "El email y la contraseña no pueden estar vacios",
            ErrorMessages::ERROR_LOGIN_AUTHENTICATION => "El email o la contraseña son incorrectos, por favor, vuelva a intentarlo, recuerde que a los 3 intentos fallidos se bloqueara su cuenta",
            ErrorMessages::ERROR_PRODUCT_STOCK_AND_ESTADO => "Error Si el estado del producto es agotado, el stock debe ser 0",
            ErrorMessages::ERROR_LOGIN_BLOCKED => "Su cuenta ha sido bloqueada, por favor, contacte con el administrador"
            
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