<? foreach ($jsonDecode as $tarefa) { ?>
    <!-- Modal de Edição-->
    <div class="modal fade" id="modal<?= $tarefa['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $tarefa['id'] ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="controller.php?editar">
                        <div class="form-group mb-3">
                            <label></label>Categoria</label>
                            <select class="form-select" aria-label="Default select example" name="categoria">
                                <option selected><?= $tarefa['categoria'] ?></option>
                                <option value="Finança">Finança</option>
                                <option value="Estudo">Estudo</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                    style="height: 100px" name="descricao"><?= $tarefa['descricao'] ?></textarea>
                                <label for="floatingTextarea2">Anotações...</label>
                            </div>
                        </div>

                        <div class="form-group form-check mb-3">
                            <input type="checkbox" class="form-check-input" name="online" value="1">
                            <label class="form-check-label">Registrar no Banco</label>
                        </div>

                        <div class="form-group form-check mb-3">
                            <input type="checkbox" class="form-check-input" name="status" value="<?= $tarefa['status'] ?>" hidden checked>
                        </div>

                        <input name="id" value=<?= $tarefa['id'] ?> hidden>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<? } ?>

<!-- Modal de Configuração-->
<div class="modal fade" id="modalConfig" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Configuraçãoes</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="controller.php?editar">
                    <div class="form-group mb-3">
                        <label class="form-label"></label>Banco</label>
                        <select class="form-select" aria-label="Default select example" name="categoria">
                            <option selected>Selecione</option>
                            <option value="mysql">My SQL</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Hostname</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">DBname</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">User</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">Password</label>
                        <input type="text" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary" style="float: right;">Conectar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>