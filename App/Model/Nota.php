<?php

namespace App\Model;

Class Nota {

    private $id;
    private $descricao;

    public function __set($attr, $value){
        $this->$attr = $ $value;
    }

    public function __get($value){
        return $this->$value;
    }

    public function Add(){
        
    }
    

}

?>