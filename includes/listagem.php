    <div class="Notas">
        <h3>Notas Salvas</h3>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Descrição</th>
                <th>Categoria</th>
                <th>Status</th>
                <th>Ação</th>
            </tr>
            <? foreach ($jsonDecode as $tarefa) { ?>
                <td><?=$tarefa['id']?></td>
                <td><?=$tarefa['descricao']?></td>
                <td><?=$tarefa['categoria']?></td>
                <td><?=$tarefa['status']?></td>
                <td><a href="/controller.php?editar=<?=$tarefa['id']?>" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal<?=$tarefa['id']?>">Editar</a></td>
                <td><a href="/controller.php?excluir=<?=$tarefa['id']?>" class="btn btn-danger">Exluir</a></td>
                <td><a href="/controller.php?finalizar=<?=$tarefa['id']?>" class="btn btn-success">Finalizar</a></td>
                </tr>
            <? } ?>

        </table>
    </div>