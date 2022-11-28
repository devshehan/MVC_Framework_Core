<?php
    class Pages{
        public function __construct(){
            echo "pages is loaded<br>";
        }

        public function index($id){
            echo "endex is called<br>";
            echo $id;
        }

        public function about($id){
            echo "about is created<br>";
            echo $id;
        }
    }