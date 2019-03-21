<?php

namespace App\src\DAO;

use App\src\model\User;

class UserDAO extends DAO{

    public function addUser($user)
    {
        extract($user);
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO user (pseudo, mail, password, role) VALUES (?, ?, ?, "abonné")'; 
        $this->sql($sql, [$pseudo, $mail, $password]);
    }

    public function getUser($pseudo)
    {
        $sql = 'SELECT id, pseudo, mail, password, role FROM user WHERE pseudo = ?';
        $result = $this->sql($sql, [$pseudo]);
        $row = $result->fetch();
        if($row){
            return $this->buildObject($row);
        }
    }

    private function buildObject(array $row){

        $user = new User();
        $user->setId($row['id']);
        $user->setPseudo($row['pseudo']);
        $user->setMail($row['mail']);
        $user->setPassword($row['password']);
        $user->setRole($row['role']);
        return $user;
    }
}