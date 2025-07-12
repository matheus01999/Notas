<?php

require  '../Notas/vendor/autoload.php';


// CARREGAR O CONTEUDO DO ARQUIVO JSON 
$contetntJson = file_get_contents('tarefas.json');



// SALVAR TAREFA
if (isset($_GET['salvar'])) {

    // VALIDAÇÃO DO LOCAL ONDE A TAREFA SERÁ SALVA
    if (isset($_POST['online']) && $_POST['online'] == 1) {

        // TRABALHAR NA LOGICA PARA SALVAR NO BANCO

    } else {

        // TAREFA RECEBIDA VIA $_POST
        $tarefa = $_POST;

        // DECODIFICAR O JSON EM UM ARRAY
        $jsonDecode = json_decode($contetntJson, true);

        // ATRIBUIR UM VALOR AO ID RECEBIDO PELO POST

        

            




        

        // ADICIONAR OS NOVOS DADOS AO ARRAY
        if (is_array($jsonDecode)) {
            $jsonDecode[] = $tarefa;
        } else {

            $jsonDecode = array($tarefa);
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

// EDITAR TAREFA

// FINALIZAR TAREFA
