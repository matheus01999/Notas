<?php

namespace App\Model;

use App\Connection;

Class Tarefa {

    private $id;
    private $descricao;

    private $categoria;



    public function __set($attr, $value){
        $this->$attr =  $value;
    }

    public function __get($value){
        return $this->$value;
    }

    

}

?>