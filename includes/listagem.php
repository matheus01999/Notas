    <div class="Notas">
        <h3>Notas Salvas</h3>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nota</th>
                <th>Açoes</th>
            </tr>
            <? foreach ($notas as $nota1) { ?>
                <tr>
                    <td><?= $nota1['id'] ?></td>
                    <td><?= $nota1['descricao'] ?></td>
                    <td>
                        <a href="#" class="btn btn-primary">Alterar</a>
                        <a href="../NotaController.php?excluir" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            <? } ?>

        </table>
    </div>