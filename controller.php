<?php

require  '../Notas/vendor/autoload.php';




// SALVAR TAREFA
if (isset($_GET['salvar'])) {

    // VALIDAÇÃO DO LOCAL ONDE A TAREFA SERÁ SALVA

    
    // ARQUIVO JSON
    $tarefas = 'tarefas.json';

    // TAREFA RECEBIDA POR POST DO /
    $tarefa = $_POST;
    print_r($_POST);

    $json = json_decode($tarefas,  'tarefas.json');

    // VALIDANDO ARQUIVO SE O ARQUIVOS EXISTE
    if (file_exists($tarefas)) {

        //GRAVAR VALORES RECEBIDOS PELO $_POST
              

    } else {

        // CRIAR O ARQUIVO DE JSON 

        // REDIRECIONAR PARA O IF TURE

    }
}
