<?php
include_once("models/model.php");

class Controller{
    public $model;
    
    public function __construct(){
        $this->model = new model();
    }
    
    public function invoke(){
        $reslt = $this->model->getlogin();
        
        if($reslt == 'login'){
            include 'views/Afterlogin.php':
        }
        else {
            include 'views/login.php';
        }
    }
}

?>