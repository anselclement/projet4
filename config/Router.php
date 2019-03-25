<?php

namespace App\config;

use App\src\controller\ErrorController;
use App\src\controller\FrontController;
use App\src\controller\BackController;


class Router{

    private $frontController;
    private $errorController;
    private $backController;

    public function __construct(){

        $this->frontController = new FrontController();
        $this->errorController = new ErrorController();
        $this->backController = new BackController();
    }

    public function run(){

        try{
            if(!isset($_GET['route']))
            {
                $this->frontController->home();
            }
            elseif(isset($_GET['route']))
            {
                if($_GET['route'] === 'article')
                {
                    $this->frontController->article($_GET['idArt']);
                }
                elseif($_GET['route'] === 'inscription')
                {
                    $this->frontController->addUser($_POST);                             
                }
                elseif($_GET['route'] === 'login')
                {
                    $this->frontController->verificationUser($_POST);                           
                }
                elseif($_GET['route'] === 'deconnexion')
                {
                    $this->frontController->deconnexion();                           
                }
                elseif($_GET['route'] === 'single')
                {
                    $this->frontController->reportComment($_POST);
                    $this->frontController->addComment($_POST);
                }
                elseif($_SESSION)
                {
                    if($_SESSION['role'] === 'administrateur'){

                        if($_GET['route'] === 'dashboard')
                        {
                            $this->backController->dashboard();                   
                        }
                        elseif($_GET['route'] === 'addArticle')
                        {
                            $this->backController->addArticle($_POST);
                        }
                        elseif($_GET['route'] === 'signalement')
                        {
                            $this->backController->reportedComment($_POST);
                        }
                        elseif($_GET['route'] === 'deleteComment')
                        {
                            $this->backController->deleteComment($_POST);
                        }
                        elseif($_GET['route'] === 'cancelReportComment')
                        {
                            $this->backController->cancelReportedComment($_POST);
                        }
                        elseif($_GET['route']  === 'deleteArticle')
                        {
                            $this->backController->deleteArticle($_POST);
                        }
                        else{
                            $this->errorController->error(404);
                        }
                    }
                    elseif($_SESSION['role'] != 'administrateur')
                    {
                        $this->errorController->error(403); 
                    }
                }
                else{
                    $this->errorController->error(404); 
                }
            }
        }
        catch(Exception $e){
            
            $this->errorController->error(500);
        } 
    }
}







