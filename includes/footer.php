</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button>

<? foreach ($jsonDecode as $tarefa) { ?>
    <!-- Modal de Edição-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><?=$tarefa['id']?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="controller.php?editar">
                        <div class="form-group mb-3">
                            <label></label>Categoria</label>
                            <select class="form-select" aria-label="Default select example" name="categoria" value="<?=$tarefa['categoria']?>">
                                <option selected>Selecione</option>
                                <option value="Finança">Finança</option>
                                <option value="Estudo">Estudo</option>
                                <option value="Outros">Outros</option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                                    style="height: 100px" name="descricao" value="<?=$tarefa['descrição']?>"></textarea>
                                <label for="floatingTextarea2">Anotações...</label>
                            </div>
                        </div>

                        <div class="form-group form-check mb-3">
                            <input type="checkbox" class="form-check-input" name="online" value="1">
                            <label class="form-check-label">Registrar no Banco</label>
                        </div>

                        <div class="form-group form-check mb-3">
                            <input type="checkbox" class="form-check-input" name="status" value="Ativo" hidden checked>
                        </div>

                        <input name="id" value=1 hidden>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<? } ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
</body>

</html>