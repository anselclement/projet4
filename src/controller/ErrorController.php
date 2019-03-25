<?php

namespace App\src\controller;

use App\src\model\View;

class ErrorController{

    public function __construct(){

        $this->view = new View();
    }

    public function error($error){

        switch($error){

            case 403:
            $title = "FORBIDDEN";
            $message = "Vous n'êtes pas autorisé à accéder à la page Web";
            $this->view->render('error/error', [
                'title' => $title,
                'message' => $message
            ]);
            break;

            case 404:
            $title = '404';
            $message = 'Page introuvable';
            $this->view->render('error/error', [
                'title' => $title,
                'message' => $message
            ]);
            break;

            case 500:
            $title = '500';
            $message = 'Erreur du serveur';
            $this->view->render('error/error', [
                'title' => $title,
                'message' => $message
            ]);
            break;
        }
    }
}