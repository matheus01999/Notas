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

    // RECUPERA OS REGISTROS DO BANCO

    public function getTask(){
        $query = "select id, descricao, categoria, status from tarefas";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);

    }

    // EXCLUI UM REGISTRO DO BANCO

    public function delete(){
        $query = "delete from chamados where id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(':id', $this->__get('id'), \PDO::PARAM_INT);
        $stmt->execute();
    }

    // EDITA UM REGISTRO DO BANCO 

    public function update(){
        $query = 'update tarefas set categoria = :categoria, descricao =:descricao, status = :status where id = :id';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue('id', $this->__get('id'));
        $stmt->bindValue('categoria', $this->__get('categoria'));
        $stmt->bindValue('descricao', $this->__get('descricao'));
        $stmt->bindValue('status', $this->__get('status'));
        $stmt->execute();
    }

    // SALVAR REGISTRO NO BANCO

    public function save(){

        $query = 'insert into tarefas(categoria, descricao, status)values(:categoria, :descricao, :status)';
        $stmt = $this->db->prepare($query);
        $stmt->bindValue('categoria', $this->__get('categoria'));
        $stmt->bindValue('descricao', $this->__get('descricao'));
        $stmt->bindValue('status', $this->__get('status'));
        $stmt->execute();

        return $this;


    }

    

}

?>