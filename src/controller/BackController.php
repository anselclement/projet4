<?php

namespace App\src\controller;

use App\src\DAO\ArticleDAO;
use App\src\model\View;
use App\src\DAO\CommentDAO;


class BackController{

    private $view;

    public function __construct()
    {
        $this->view = new View();
        $this->commentDAO = new CommentDAO();
        $this->articleDAO = new ArticleDAO();
    }

    public function dashboard(){

        $this->view->render('back/dashboard');
    }

    public function reportedComment(){

        $comment = $this->commentDAO->getCommentReported();

        $this->view->render('back/signalement', [
            'comments' => $comment
        ]);
    }

    public function deleteComment($post){

        if(isset($post['submit'])){
            $this->commentDAO->deleteComment($post['idComment']);
            header('Location: ../public/index.php?route=signalement');
        }
    }

    public function cancelReportedComment($post){
        
        if(isset($post['submit'])){
            $this->commentDAO->cancelReportedComment($post['idComment']);
            header('Location: ../public/index.php?route=signalement');
        }
        
    }

    public function addArticle($post){
        
        $error = 0 ;
        if(isset($post['idArt']) && isset($post['submit'])){
            if($post['content'] === "" || $post['title'] === ""){
                $error = 1;
            }else{
            $this->articleDAO->editArticle($post);
            header('Location: ../public/index.php');
            }
        }
        elseif(isset($post['submit']) && !isset($post['idArt'])) {
            if($post['content'] === "" || $post['title'] === ""){
                $error = 1;
            }else{                   
            $articleDAO = new ArticleDAO();
            $articleDAO->addArticle($post);
            header('Location: ../public/index.php#decouvrir');
            } 
        }
        $this->view->render('back/addArticle', [
            'post' => $post,
            'error' => $error
        ]);
        

    }

    public function deleteArticle($post){

        if(isset($post['submit'])){
            $this->articleDAO->deleteArticle($post['idArt']);
            header('Location: ../public/index.php#decouvrir');
        }
    }
}