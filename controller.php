<?php

require '../Notas/vendor/autoload.php';

use App\Model\Tarefa;


// CARREGAR O CONTEUDO DO ARQUIVO JSON 
$contetntJson = file_get_contents('tarefas.json');
$configJson = file_get_contents('config.json');

// LISTAGEM DE TAREFAS

// DECODIFICAR O JSON EM UM ARRAY O MESMO É INCLUIDO NO INDEX PARA O FOREACH
$jsonDecode = json_decode($contetntJson, true);

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
        $Tarefa->descricao = $_POST['descricao'];
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
    foreach ($jsonDecode as $key => $value) {
        if ($value['id'] == $id) {

            // RECUPERA O VALOR DO INDICE DA TAREFA 
            $indice = $key;

            // ALTERA OS ELEMENTOS DO INDICE COM NOS RECEBIDOS VIA $_POST
            $value['categoria'] = $_POST['categoria'];
            $value['descricao'] = $_POST['descricao'];
            $value['status'] = $_POST['status'];

            // ALTERA O VALOR O ELEMENTO NO ARRAY 
            $jsonDecode[$indice] = $value;

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

// CONFIGURAR BANCO
if (isset($_GET['configurar'])) {

    $fileConfigJson = 'config.json';
    // VALIDA SE O ARQUIVO DE CONFIGURAÇÃO EXISTE
    if(file_exists($fileConfigJson)){
        
    }
    

    // DECODIFICAR O JSON EM UM ARRAY O MESMO É INCLUIDO NO INDEX PARA O FOREACH
    $configDecode = json_decode($configJson, true);

    // CRIA UM OBJETO GENERICO E ATRIBUI A ELE OS VALORES RECEBIDOS DO POST
    $Config = new stdClass();
    $Config->dns = $_POST['dns'];
    $Config->host = $_POST['host'];
    $Config->dbname = $_POST['dbname'];
    $Config->user = $_POST['user'];
    $Config->passwrod = $_POST['password'];

    // CONVERTE O OBJETO EM UM ARRAY
    $novaConfig = (array) $Config;

    // ADICIONAR OS NOVOS DADOS AO ARRAY
    if (is_array($configDecode)) {
        $configDecode[] = $novaConfig;
    } else {

        $jsonDecode = array($novaConfig);
    }

    // CODIFICA O ARQUIVO DE VOLTA PARA JSON
    $configEncode = json_encode($configDecode);

    // SALVA O ARQUIVO NO JSON
    if (file_put_contents('config.json', $configEncode)) {
        header('Location: /');
    } else {
        echo 'Erro ao adicionar os dados.....';
    }
}
