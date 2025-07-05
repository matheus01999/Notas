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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <main>
        <div class="container">
            <form action="/" method="POST" class="form-control">
                <div class="col">
                    <div class="row">
                        <label for="descricao" class="form-label ">Descricao</label>
                        <input type="text" name="descricao" class="form-control">
                        <button type="submit" class="btn btn-primary form-control mt-4">Enviar</button>
                    </div>
                </div>

            </form>
        </div>

        <div>
            <table class='table'>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                </tr>
                <tr>
                    <?php foreach ($notas as $nota) { ?>
                        <td><?= $nota['id'] ?></td>
                        <td><?= $nota['descricao'] ?></td>
                    <? } ?>
                </tr>
            </table>
        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>