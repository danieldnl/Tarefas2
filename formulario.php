

<form method="POST" action="" id="tarefa" class="col-lg-6 form-horizontal" role="form">
    <input type="hidden" name="id" value="<?php echo $id; ?>" />
    <div class="form-group">
        <label class="control-label">Tarefa:</label>
        <input type="text" name="titulo" class="form-control" value="<?php echo $titulo; ?>" />  
    </div>
    <div class="form-group">
        <label class="control-label">Prazo:</label>

        <input id="datetimepicker4" type="text" name="prazo" class="form-control" value="<?php echo $prazo; ?>" />
        <script>
            $(function() {
                $("#datetimepicker4").datetimepicker({
                    format: 'DD/MM/YYYY',
                    locale: 'pt-br'
                });
            });
        </script>
    </div>
    <div class="form-group" id="priori-concl-lembr">
        <label class="control-label">Prioridade:</label><br />
        <label class="radio-inline"><input type="radio" name="prioridade" value="1" checked>Baixa</label>
        <label class="radio-inline"><input type="radio" name="prioridade" value="2">Média</label>
        <label class="radio-inline"><input type="radio" name="prioridade" value="3">Alta</label>
        <div class="pull-right">
            <label class="checkbox-inline"><input type="checkbox" name="concluida" value=""><strong>Tarefa Concluída</strong></label>
            <label class="checkbox-inline"><input type="checkbox" name="lembrete" value=""><strong>Enviar Lembrete</strong></label>
        </div>
    </div>

    <div class="form-group">
        <input type="submit" value="<?php echo $btnValor; ?>" class="btn btn-primary">
    </div>                        
</form>