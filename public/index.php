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
</head>

<body>
    <main>
        <div>
            <form action="/" method="POST">
                <div>
                    <label for="descricao">Descricao</label>
                    <input type="text" name="descricao">
                    <button type="submit">Enviar</button>
                </div>

            </form>
        </div>

        <div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Descrição</th>
                </tr>
                <tr>
                    <?php foreach($notas as $nota){ ?>
                        <td><?=$nota['id']?></td>
                        <td><?=$nota['descricao']?></td>
                    <? } ?>
                </tr>
            </table>
        </div>

    </main>

</body>

</html>