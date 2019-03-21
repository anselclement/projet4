<?php

namespace App\src\model;

class Comment{

    private $id;
    private $pseudo;
    private $content;
    private $date_added;
    private $reported;

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getPseudo(){
        return $this->pseudo;
    }

    public function setPseudo($pseudo){
        $this->pseudo = $pseudo;
    }

    public function getContent(){
        return $this->content;
    }

    public function setContent($content){
        $this->content = $content;
    }

    public function getDateAdded(){
        return $this->date_added;
    }

    public function setDateAdded($date_added){
        $this->date_added = $date_added;
    }

    public function getReported(){
        return $this->reported;
    }

    public function setReported($reported){
        $this->reported = $reported;
    }
}