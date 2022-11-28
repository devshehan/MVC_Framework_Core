<?php
    class Test{
        public function __construct(){
            echo "test is loaded<br>";
        }

        public function about($id){
            echo "about is created<br>";
            echo $id;
        }
    }