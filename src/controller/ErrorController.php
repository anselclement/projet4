<?php

namespace App\src\controller;

class ErrorController{

    public function error(){

        require '../templates/error/error.php';
    }

    public function unknown(){

        require '../templates/error/unknown.php';
    }
}