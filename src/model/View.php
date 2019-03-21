<?php

namespace App\src\model;

class View{

    private $file;
    private $title;

    private function renderFile($file, $data){

        if(file_exists($file)){
            extract($data);
            ob_start();
            require $file;
            return ob_get_clean();
        }
        else {
            echo 'Fichier inexistant !';
        }
    }

    public function render($template, $data = []){

        $this->file = '../templates/' .$template. '.php';
        $content = $this->renderFile($this->file, $data);
        $view = $this->renderFile('../templates/base.php', [
            'title' => $this->title,
            'content' => $content
        ]);
        echo $view;
    }
    
}
