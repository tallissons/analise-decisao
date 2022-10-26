<form id="form_submit" action="{{route('api.risco.vme')}}" method="post" autocomplete="off">
    @csrf
    <input id="input_ambiente" type="hidden" class="form-control" name="ambiente">
    <input id="input_qnt_cenario" type="hidden" class="form-control" name="qnt_cenario">
    <input id="input_qnt_inv" type="hidden" class="form-control" name="qnt_inv">
    <label>Cenário (%)</label>
    <div id="form_cenario" class="form-inline" style="padding: 2px;">

    </div>

    <br>
    <div id="form_inv">

    </div>

    <br>
    <button style="width: 100%" type="submit" class="btn btn-primary col-auto">Análisar</button>
</form>




