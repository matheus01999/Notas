<?php

use App\Connection;
use App\Model\Nota;

require_once '../vendor/autoload.php';

$nota = new Nota();
$notas = $nota->listar();


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/estilo.css">
</head>

<body>
    <main>
        <div class="gridContainer">
            <div class="Formulario">
                <h3>Adicione uma nova nota</h3>
                <form action="#">
                    <div class="mb-3">
                        <label class="form-label">Descrição</label><br>
                        <input type="text" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>

            <div class="Notas">
                <h3>Notas Salvas</h3>
                <table class="table">
                    <tr>
                        <th>ID</th>
                        <th>Nota</th>
                        <th>Status</th>
                    </tr>
                </table>
            </div>
        </div>


    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>