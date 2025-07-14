<?php

require  '../Notas/vendor/autoload.php';
use App\Model\Tarefa;


// CARREGAR O CONTEUDO DO ARQUIVO JSON 
$contetntJson = file_get_contents('tarefas.json');



// SALVAR TAREFA
if (isset($_GET['salvar'])) {

    // VALIDAÇÃO DO LOCAL ONDE A TAREFA SERÁ SALVA
    if (isset($_POST['online']) && $_POST['online'] == 1) {

        // TRABALHAR NA LOGICA PARA SALVAR NO BANCO

    } else {
        
        // DECODIFICAR O JSON EM UM ARRAY
        $jsonDecode = json_decode($contetntJson, true);

        // ATRIBUIR UM VALOR AO ID RECEBIDO PELO POST
        $CountTarefas = count($jsonDecode); // QUANTIDADE DE TAREFAS
        $id = $_POST['id']; // ID RECEBIDO POR $_POST
        $newID = $id + $CountTarefas; // SOMA DOS VALORES DE $CountTarefas e $id


        // CRIA UM OBJETO GENERICO E ATRIBUI A ELE OS VALORES RECEBIDOS DO POST
        $Tarefa = new stdClass();
        $Tarefa->id = $newID;
        $Tarefa->descricao =  $_POST['descricao'];
        $Tarefa->categoria = $_POST['categoria'];
        $Tarefa->status = $_POST['status'];

        // CONVERTE O OBJETO EM UM ARRAY
        $novaTarefa = (Array) $Tarefa;


        
        // ADICIONAR OS NOVOS DADOS AO ARRAY
        if (is_array($jsonDecode)) {
            $jsonDecode[] = $novaTarefa;
        } else {

            $jsonDecode = array($novaTarefa);
        }

        // CODIFICA O ARQUIVO DE VOLTA PARA JSON
        $jsonEncode = json_encode($jsonDecode);

        // SALVA O ARQUIVO NO JSON
        if (file_put_contents('tarefas.json', $jsonEncode)) {
            header('Location: /?salvo');
        } else {
            echo 'Erro ao adicionar os dados.....';
        }
    }
}

// LISTAGEM DE TAREFAS

    // DECODIFICAR O JSON EM UM ARRAY O MESMO É INCLUIDO NO INDEX PARA O FOREACH
    $jsonDecode = json_decode($contetntJson, true);

// EXCLUIR TAREFA

    // IDENTIFICA O ID DA TAREFA
    if (isset($_GET['excluir'])) {
        $id = $_GET['excluir']; // VALOR DO ID QUE SERÁ EXCLUIDO

        //LOCALIZA O ID NO ARRAY DE TAREFAS
        echo $id;
        echo'<pre>';
        foreach($jsonDecode as $resultado){
            if($resultado['id'] == $id){
                echo'<pre>';
                print_r($resultado);
            }

        }
        
    }



// EDITAR TAREFA
if (isset($_GET['editar'])) {
        $id = $_GET['editar']; // VALOR DO ID QUE SERÁ EXCLUIDO

        //LOCALIZA O ID NO ARRAY DE TAREFAS
        echo $id;
        echo'<pre>';
        foreach($jsonDecode as $resultado){
            if($resultado['id'] == $id){
                echo'<pre>';
                print_r($resultado);
            }

        }
        
    }

// FINALIZAR TAREFA
