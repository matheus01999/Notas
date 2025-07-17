<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/css/estilo.css">
</head>

<body>

    <!-- ALERTA DE TAREFA SALVA -->
    <? if (isset($_GET['salvo'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>TAREFA</strong> salva com sucesso.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <? } ?>

    <!-- ALERTA DE TAREFA EXCLUIDA -->
     <? if (isset($_GET['excluido'])) { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>TAREFA</strong> removida com sucesso.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <? } ?>

    <!-- ALERTA DE TAREFA ALTERADA -->
     <? if (isset($_GET['alterado'])) { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>TAREFA</strong> alterada com sucesso.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <? } ?>

    

    <div class="gridContainer">