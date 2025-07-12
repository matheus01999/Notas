<div class="Formulario">
    <h3> Adicione uma Tarefa</h3>
    <form method="POST" action="controller.php?salvar">
        <div class="form-group mb-3">
            <label></label>Categoria</label>
            <select class="form-select" aria-label="Default select example" name="categoria">
                <option selected>Selecione</option>
                <option value="Finança">Finança</option>
                <option value="Estudo">Estudo</option>
                <option value="Outros">Outros</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="descricao"></textarea>
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

        <input  name="id" value=0 hidden>

        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

</div>