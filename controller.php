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
        $novaTarefa = (array) $Tarefa;



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
    foreach ($jsonDecode as $key => $value) {
        if ($value['id'] == $id) {

            // REMOVE A TERFA DO ARRAY
            unset($jsonDecode[$key]);
            array_values($jsonDecode);

            // CODIFICA O ARQUIVO DE VOLTA PARA JSON
            $jsonEncode = json_encode($jsonDecode);

            // SALVA O ARQUIVO NO JSON
            if (file_put_contents('tarefas.json', $jsonEncode)) {
                echo '<pre>';
                print_r($jsonDecode);
                header('Location: /?excluido');
            } else {
                echo 'Erro ao adicionar os dados.....';
            }
        } else {
            echo 'Erro : Item não localizado no array de tarefas ....';
        }
    }
}



// EDITAR TAREFA
if (isset($_GET['editar'])) {
    $id = $_GET['editar']; // VALOR DO ID QUE SERÁ EDITADO

    //LOCALIZA O ID NO ARRAY DE TAREFAS
    echo $id;
    echo '<pre>';
    foreach ($jsonDecode as $resultado) {
        if ($resultado['id'] == $id) {
            echo '<pre>';
            print_r($resultado);
        }
    }
}

// FINALIZAR TAREFA
if (isset($_GET['finalizar'])) {
    $id = $_GET['finalizar']; // VALOR DO ID QUE SERÁ FINALIZADO

    //LOCALIZA O ID NO ARRAY DE TAREFAS
    foreach ($jsonDecode as $key => $value) {
        if ($value['id'] == $id) {

            // RECUPERA O VALOR DO INDICE DA TAREFA 
            $indice = $key;

            // ALTERA O VALOR DO ELEMENTO STATUS 
            if ($value['status'] == 'Ativo') {
                $value['status'] = 'Fianlizado';

                // ALTERA O VALOR O ELEMENTO NO ARRAY 
                $jsonDecode[$indice] = $value;
            } else {
                $value['status'] = 'Ativo';

                // ALTERA O VALOR O ELEMENTO NO ARRAY 
                $jsonDecode[$indice] = $value;
            }

            // CODIFICA O ARQUIVO DE VOLTA PARA JSON
            $jsonEncode = json_encode($jsonDecode);

            // SALVA O ARQUIVO NO JSON
            if (file_put_contents('tarefas.json', $jsonEncode)) {

                header('Location: /?alterado');
            } else {
                echo 'Erro ao alterar os dados.....';
            }
        }
    }
}
