<?php

    /*
        Base Controller
        Loads model and view
    */ 

    class Controller{
        // Load model
        public function model($model){
            //require model file
            require_once('../app/model' . $model . '.php');

            return new $model();
        }

        // Load view
        public function view($view, $data = []){
            if(file_exists('../app/view/' . $view . '.php')){
                require_once('../app/view/' . $view . '.php');
            }else{
                die('view does not exist.');
            }
        }
    }