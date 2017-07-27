<div class="row">
    <div class="col-xs-12 col-sm-4">
        <form method="post" action="?controller=tipo_nota_salida">
            <div class="box box-primary box-solid">
                <div class="box-header">
                    <div class="box-title">Tipo nota salida</div>
                </div>
                <div class="box-body">
                    <input value="0" type="hidden" id="txtidtiponotasalida" name="txtidtiponotasalida" />
                    <div class="form-group">
                        <label class="control-label">Descripción</label>
                        <input required class="form-control" id="txtdescripcion" name="txtdescripcion" />
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-primary pull-right"><i class="fa fa-save"></i> Guardar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-xs-12 col-sm-8">
        <div class="box box-success box-solid">
            <div class="box-header">
                <div class="box-title"><i class="fa fa-list"></i> Lista de tipos de nota de salida</div>
            </div>
            <div class="box-body">
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Descripción</th>
                        <th>Fecha registro</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    foreach ($lista as $row):?>
                        <tr>
                            <td style="width: 15%"><?=$i?></td>
                            <td style="width: 50%"><?=$row['tpnts_des']?></td>
                            <td style="width: 20%"><?=$row['tpnts_freg']?></td>
                            <td style="width: 15%">
                                <a onclick="editar(<?=$row['tpnts_id']?>, '<?=$row['tpnts_des']?>')" href="#" title="Editar" data-toogle="tooltip" class="btn btn-link"><i class="fa fa-edit"></i></a>
                                <a href="?controller=tipo_nota_salida&action=eliminar&id=<?=$row['tpnts_id']?>" title="Eliminar" data-toogle="tooltip" class="btn btn-link"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function editar(id, descripcion){
        $('#txtidtiponotasalida').val(id);
        $('#txtdescripcion').val(descripcion);
    }
</script>