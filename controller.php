<?php

require  '../Notas/vendor/autoload.php';




// SALVAR TAREFA
if (isset($_GET['salvar'])) {

    // ARQUIVO JSON
    $json = 'tarefas.json';

    // ARRAY DA TAREFA
    $tarefa = $_POST;

    // VALIDANDO ARQUIVO 
    if (file_exists($json)) {

        // DECODIFICANDO O JSON 
        $tarefas_decode = json_decode($json);
        
        // CODIFICANDO O ARRAY EM JSON
        $tarefas_ecode = json_encode($tarefa, JSON_PRETTY_PRINT);
        
        //  ABRIR O ARQUIVO JSON
        $file_json = fopen($json, 'r+');

        // ALTERAR O ARQUIVO JSON

        // FECHA O ARQUIVO JSON
    } else {
        echo 'Arquivo não existe';
    }
}
