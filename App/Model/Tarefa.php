<?php

namespace App\Model;

use App\Connection;

Class Tarefa {

    protected $db;
    private $id;
    private $descricao;
    private $categoria;
    private $status;

    public function __construct($db){
        $this->db = $db;
    }

    public function __set($attr, $value){
        $this->$attr =  $value;
    }

    public function __get($value){
        return $this->$value;
    }

    // METODO QUE SALVA UM REGISTRO NO BANCO 

    

}

?>