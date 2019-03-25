<?php
namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use App\src\DAO\CommentDAO;
use App\src\model\View;
use App\src\DAO\UserDAO;

class FrontController{

    private $articleDAO;
    private $commentDAO;
    private $view;
    private $userDAO;

    public function __construct(){
        $this->articleDAO = new ArticleDAO();
        $this->commentDAO = new CommentDAO();
        $this->view = new View();
        $this->userDAO = new UserDAO();
    }

    public function home(){

        $articles = $this->articleDAO->getArticles();
        $this->view->render('front/home', [
            'articles' => $articles
        ]);
    }

    public function article($idArt){
        
        $article = $this->articleDAO->getArticle($idArt);
        $comments = $this->commentDAO->getCommentsFromArticle($idArt);
        $this->view->render('front/single', [
            'articles' => $article,
            'comments' => $comments
        ]);
    }

    public function addComment($post){

        if(isset($post['submit'])){
            if(!empty($post['content'])){
                $commentDAO = new CommentDAO();                
                $commentDAO->addComment($post);
            }
        }
    }

    public function addUser($post){

        $error = [
            "password" => 0,
            "mail" => 0,
            "pseudo" => 0
        ];

        if(isset($post['submit'])){

            $user = $this->userDAO->getUser($post['pseudo']);
            
            if(isset($post['password'])){
                if(!preg_match("#^[A-Z](?=.*[a-z])(?=.*[0-9])(?=.*[\#!^$()[\]{}?+*,._\-]).+$#", $post['password'])){
                    $error['password'] = 1;
                }
            }
            if(isset($post['mail'])){
                if(!preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $post['mail'])){
                    $error['mail'] = 1;
                }
            }
            if(isset($post['pseudo'])){
                if($user === NULL){
                    if(!preg_match("#^[A-Z][a-zA-Z0-9._-]*$#", $post['pseudo'])){
                        $error['pseudo'] = 1;
                    }
                }elseif($user->getPseudo() != NULL){
                    if($post['pseudo'] === $user->getPseudo()){
                        $error['pseudo'] = 2;
                    }
                }
            }
            if(isset($post['pseudo']) && $user != NULL ){
                if($post['pseudo'] === $user){
                    $error['pseudo'] = 2;
                }
            }
            if($error['password'] === 0 && $error['mail'] === 0 && $error['pseudo'] === 0){
                $userDAO = new UserDAO();
                $userDAO->addUser($post);
                header('Location: ../public/index.php');
            }
        }
        $this->view->render('front/inscription', [
            'post' => $post,
            'error' => $error
        ]);
    }
    
    public function verificationUser($post){

        $error = 0;

        if(isset($post['submit'])){
            
            if(isset($post['pseudo']) && isset($post['password'])){

                $user = $this->userDAO->getUser($post['pseudo']);

                if($user === NULL || $post['pseudo'] != $user->getPseudo()){

                    $error = 1;
                }
                else{
                    $password = password_verify($post['password'], $user->getPassword());
                    var_dump($password);
                    if($post['pseudo'] === $user->getPseudo() && $password && $user->getRole() === 'abonné'){
                        $_SESSION['id'] = $user->getId();
                        $_SESSION['pseudo'] = $user->getPseudo();
                        $_SESSION['role'] = $user->getRole();
                        header('Location: ../public/index.php');
                    }
                    elseif($post['pseudo'] === $user->getPseudo() && $password && $user->getRole() === 'administrateur'){
                        $_SESSION['id'] = $user->getId();
                        $_SESSION['pseudo'] = $user->getPseudo();
                        $_SESSION['role'] = $user->getRole();
                        header('Location: ../public/index.php?route=dashboard');
                    }
                }
            }
        }
        $this->view->render('front/login', [
            'post' => $post,
            'error' => $error
        ]);
    }

    public function deconnexion(){

        session_unset();
        session_destroy();
        header('Location: ../public/index.php');
    }

    public function reportComment($post){

        $this->commentDAO->reportComment($post['idComment']);
        header('Location: ../public/index.php?route=article&idArt=' .$post['idArt']);
    }
}
