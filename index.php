<?php

    error_reporting(E_ALL);

    ini_set('ignore_repeated_errors', true);

    ini_set('display_errors', false);

    ini_set('log_errors', true);

    ini_set("error_log", "error.log");

    error_log("App php");

 //require_once("Views/template.php");


 require_once("libs/Controller.php");
 require_once("libs/View.php");
 require_once("libs/Model.php");
 require_once("libs/app.php");
 require_once("libs/database.php");

 require_once("Controller/errores.php");
 require_once("Class/successmessages.php");
 require_once("Class/errormessages.php");
 require_once("Class/sessioncontroller.php");

 require_once("Models/usermodel.php");
 require_once("Models/loginmodel.php");




 require_once("config/config.php");

 $app = new App();





?>