<?php

require  '../Notas/vendor/autoload.php';


// SALVAR TAREFA
if (isset($_GET['salvar'])) {

    // VALIDAÇÃO DO LOCAL ONDE A TAREFA SERÁ SALVA

    // TAREFA RECEBIDA VIA $_POST
    $tarefa = $_POST;

    // CARREGAR O CONTEUDO DO ARQUIVO JSON 
    $contetntJson = file_get_contents('tarefas.json');

    // DECODIFICAR O JSON EM UM ARRAY
    $jsonDecode = json_decode($contetntJson, true);

    // ADICIONAR OS NOVOS DADOS AO ARRAY
    if (is_array($jsonDecode)) {
        $jsonDecode[] = $tarefa;
    } else {
        
        $jsonDecode = array($tarefa);
    }

    // CODIFICA O ARQUIVO DE VOLTA PARA JSON
    $jsonEncode = json_encode($jsonDecode);

    // SALVA O ARQUIVO NO JSON
    if(file_put_contents('tarefas.json', $jsonEncode)){
        header('Location: /?salvo');
    }else{
        echo 'Erro ao adicionar os dados.....';
    }
}

// LISTAGEM DE TAEFAS
