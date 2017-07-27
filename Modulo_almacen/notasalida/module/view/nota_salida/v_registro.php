<form method="post" action="<?=$url?>">
    <div class="box box-success">
        <div class="box-header">
            <div class=box-title>Registro de nota salida</div>
        </div>
        <div class="box-body">
            <div class="row">
                <input type="hidden" name="idnota" name="idnota" value="<?=$entity['nts_id']?>"/>
                <div class="col-xs-6 col-sm-3">
                    <div class="form-group">
                        <label>Prioridad Id</label>
                        <input class="form-control" value="<?=$entity['prio_id']?>" name="prioridad" id="prioriodad"  />
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="form-group">
                        <label>Tipo Nota</label>
                        <input class="form-control" value="<?=$entity['tipnts_id']?>" name="tipo" id="tipo"  />
                    </div>
                </div>
                <div class="col-xs-6 col-xs-3">
                    <div class="form-group">
                        <label>Solicitud ID</label>
                        <input required class="form-control" value="<?=$entity['sold_id']?>" id="solicitud" name="solicitud" />
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="form-group">
                        <label>Número Nota</label>
                        <input required class="form-control" value="<?=$entity['nts_num']?>" name="numero" id="numero"  />
                    </div>
                </div>
                <div class="col-xs-6 col-xs-3">
                    <div class="form-group">
                        <label>Método Entrega</label>
                        <input required class="form-control" value="<?=$entity['nts_mten']?>" id="metodo" name="metodo" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6 col-sm-3">
                    <div class="form-group">
                        <label>Cantidad</label>
                        <input required class="form-control" value="<?=$entity['nts_cant']?>" id="cantidad" name="cantidad"/>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-3">
                    <div class="form-group">
                        <label>Fecha salida</label>
                        <input required class="form-control" value="<?=$entity['nts_fnt']?>" id="fsalida" name="fsalida"/>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label>Observacion</label>
                        <input required class="form-control" value="<?=$entity['nts_obs']?>" id="observacion" name="observacion"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <a href="?controller=nota_salida"><i class="fa fa-list"></i> Ver lista</a>
            <button name="submit" id="submit" class="btn btn-success pull-right"><i class="fa fa-save"></i> Guardar</button>
        </div>
    </div>
</form>