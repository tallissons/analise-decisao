<form id="form_config" autocomplete="off">
    <div class="form-group">
        <label>Ambiente de decisão:</label>
        <br>
        <label class="radio-inline"><input required type="radio" name="ambiente" value="Risco" id="">Risco</label>
        <label class="radio-inline"><input type="radio" name="ambiente" value="Incerteza" id="">Incerteza</label>
    </div>
    <div class="form-group">
        <label>Quantidade  de cenários:</label>
        <input required min="1" type="number" class="form-control" name="qnt_cenario" id="config_qnt_cenario">
    </div>
    <div class="form-group">
        <label>Quantidade de investimentos:</label>
        <input required min="1" type="number" class="form-control" name="qnt_inv" id="config_qnt_inv">
    </div>

    <button style="width: 100%" type="submit" class="btn btn-primary col-auto">Próximo</button>
</form>
