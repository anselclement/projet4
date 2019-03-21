<?php 

namespace App\src\DAO;

use App\src\model\Comment;

class CommentDAO extends DAO{

    public function getCommentsFromArticle($idArt){
        $sql = 'SELECT id, pseudo, content, date_added, reported FROM comment WHERE article_id = ?';
        $result = $this->sql($sql, [$idArt]);
        $comments = [];
        foreach($result as $row){
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        return $comments;
    }

    public function addComment($comment){
        extract($comment);
        $sql = 'INSERT INTO comment (pseudo, content, date_added, article_id, reported) VALUES (?, ?, NOW(), ?, 0)'; 
        $this->sql($sql, [$pseudo, htmlspecialchars_decode($content), (int)$idArt]);
    }

    public function reportComment($idComment){
        $sql = 'UPDATE comment SET reported = 1 WHERE id = ?';
        $result = $this->sql($sql, [$idComment]);
    }

    public function getCommentReported(){
        $sql = 'SELECT id, pseudo, content, date_added, reported FROM comment WHERE reported = 1 ';
        $result = $this->sql($sql);
        $comments = [];
        foreach($result as $row){
            $commentId = $row['id'];
            $comments[$commentId] = $this->buildObject($row);
        }
        return $comments;
    }

    public function cancelReportedComment($idComment){
        $sql = 'UPDATE comment SET reported = 0 WHERE id = ? ';
        $result = $this->sql($sql, [$idComment]);
    }

    public function deleteComment($idComment){
        $sql = 'DELETE FROM comment WHERE id = ?';
        $result = $this->sql($sql, [$idComment]);
    }

    private function buildObject(array $row){

        $comment = new Comment();
        $comment->setId($row['id']);
        $comment->setPseudo($row['pseudo']);
        $comment->setContent($row['content']);
        $comment->setDateAdded($row['date_added']);
        $comment->setReported($row['reported']);
        return $comment;
    }
}