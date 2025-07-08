<?php

namespace App\Model;

use App\Connection;

Class Nota {

    private $id;
    private $descricao;



    public function __set($attr, $value){
        $this->$attr =  $value;
    }

    public function __get($value){
        return $this->$value;
    }

    

}

?>