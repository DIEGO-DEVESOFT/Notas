<?php
    class Landing {
        public function __construct(){}
        public function index(){  
           require_once "views/header.view.php";
           require_once "views/index.view.php";
           require_once "views/footer.view.php";         
        }
    }