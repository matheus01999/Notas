<?php

require  '../Notas/vendor/autoload.php';



use App\Model\Nota;

// SALVAR TAREFA
if (isset($_GET['salvar'])) {
    $task = new Nota;
    $task->descricao = $_POST['descricao'];
    header('Location: /?salvo');

}
