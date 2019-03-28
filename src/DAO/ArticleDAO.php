<?php

namespace App\src\DAO;

use App\src\model\Article;

class ArticleDAO extends DAO{

    public function getArticles(){

        $sql = 'SELECT id, title, content, author, date_added FROM article ORDER BY id DESC';
        $result = $this->sql($sql);
        $articles = [];
        foreach($result as $row){
            $articleId = $row['id'];
            $articles[$articleId] = $this->buildObject($row);
        }
        return $articles;
    }

    public function getArticle($idArt){
        
        $sql = 'SELECT id, title, content, author, date_added FROM article WHERE id = ?';
        $result = $this->sql($sql, [$idArt]);
        $row = $result->fetch();
        if($row){
            return $this->buildObject($row);
        }
        else{
            echo 'Aucun article existant avec cet identifiant';
        }
    }

    public function deleteArticle($idArt){

        $sql = 'DELETE FROM article WHERE id = ?';
        $this->sql($sql, [$idArt]);
    }

    public function addArticle($article){

        extract($article);
        $sql = 'INSERT INTO article (title, content, author, date_added) VALUES (?, ?, "forteroche", NOW())';
        $this->sql($sql, [$title, $content]);
    }

    public function editArticle($article){
        
        extract($article);
        $sql = 'UPDATE article SET title = ?, content = ? WHERE id = ?';
        $this->sql($sql, [$title, htmlentities($content), (int)$idArt]);
    }

    private function buildObject(array $row){

        $article = new Article();
        $article->setId($row['id']);
        $article->setTitle($row['title']);
        $article->setContent($row['content']);
        $article->setAuthor($row['author']);
        $article->setDateAdded($row['date_added']);
        return $article;
    }
}
