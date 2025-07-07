<?php

namespace App\Model;

use App\Connection;

Class Nota {

    private $id;
    private $descricao;


    public function __set($attr, $value){
        $this->$attr = $ $value;
    }

    public function __get($value){
        return $this->$value;
    }

    // METODO RESPONSAVEL POR LISTAS OS REGISTROS DE NOTAS DO BANCO
    public function listar(){
        $conn = Connection::getConn();
        return $conn->query("SELECT id,descricao FROM notas;")->fetchAll(\PDO::FETCH_ASSOC);
        
    }

    // METODO RESPONSAVEL POR ADICIONAR UMA NOVA NOTA AO BANCO
    public function adicionar(){
        $conn = Connection::getConn();
        $stmt = $conn->prepare('INSERT INTO notas(descricao)values(:descricao)');
        $stmt->bindValue('descricao', $this->__get('descricao'));
        $stmt->execute();


    }

    // METODO RESPONSAVEL POR BUSCAR UMA MOTA PELO SEU ID
    public function buscar($id){
        $conn = Connection::getConn();
        $stmt = $conn->prepare('SELECT * FROM notas WHERE id=:id');
        $stmt->bindValue('id', $id);
        $stmt->execute();
        $nota = $stmt->fetch();

        // ATRIBUIR O VALOR RECEBIDO PELA BUSCA A UM OBJETO
        if($nota){
            $this->id = $nota->id;
            $this->descricao = $nota->descricao;
        };

        return $nota;

    }

    // METODO RESPONSAVEL POR EXCLUIR UM NOTA DO BANCO


    // METODO RESPONSAVEL POR ATUALIZAR UMA NOTA DO BANCO
    

}

?>