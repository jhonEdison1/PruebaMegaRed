<?php

class SuccessMessages{

    const USER_CREATE_SUCCESSFULLY = "2001";
    const PRODUCTO_CREATE_SUCCESSFULY ="2002";


    private $successList = [];

    function __construct() {
        $this->successList = [
            SuccessMessages::USER_CREATE_SUCCESSFULLY => "Usuario creado correctamente",
            SuccessMessages::PRODUCTO_CREATE_SUCCESSFULY => "Producto creado correctamente",

        ];
        
        
    }

    public function get($hash){
        return $this->successList[$hash];
    }

    public function existsKey($key){
        if(array_key_exists($key, $this->successList)){
            return true;
        }else{
            return false;
        }
    }
    



}




?>