    <div class="Notas">
        <h3>Notas Salvas</h3>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Nota</th>
                <th>Açoes</th>
            </tr>
            <? foreach ($jsonDecode as $tarefa) { ?>
                <td>#</td>
                <td><?=$tarefa['descricao']?></td>
                <td>- - - </td>
                </tr>
            <? } ?>

        </table>
    </div>