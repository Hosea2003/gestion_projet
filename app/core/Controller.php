<?php
class Controller{
    
    public function isAuthenticate(){

    }

    public function model($model){
        require_once "app/models/".$model.".php";
        return new $model();
    }

    public function view($view, $data=null){
        require_once "app/views/".$view;
    }
}
?>