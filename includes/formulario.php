<div class="Formulario">
    <h3> Adicione uma Tarefa</h3>
    <form method="POST" action="salvar.php">
        <div class="form-group mb-3">
            <label></label>Descrição da Tarefa</label>
            <input type="text" name="descricao" class="form-control" placeholder="descreva aqui">
        </div>
        <div class="form-group form-check mb-3">
            <input type="checkbox" class="form-check-input" name="online" value="1">
            <label class="form-check-label">Registrar no Banco</label>
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>

</div>