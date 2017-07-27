
<section class="content-header cabecera">
      <h1>
        Registro Almacen
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Almacen</a></li>
        <li class="active">Registro</li>
      </ol>

</section>

    <!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Datos de almacen</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="formulario_almacen">
              <div class="box-body">
                <!--Mensaje de registro-->
                <div class="" id="msj_almacen">
                </div>
                <!--Mensaje de registro-->
            
                <div class="form-group">
                  <label  class="col-sm-1 control-label">Nombre .</label>
                    <div class="col-sm-2">
                      <input type="text" name="txtalmacen" id="txtalmacen" class="form-control">
                    </div>
                    <label  class="col-sm-1 control-label">Dirección.</label>
                    <div class="col-sm-2">
                     <input type="text" name="txtdireccionalm" id="txtdireccionalm" class="form-control">
                    </div>
                    <label  class="col-sm-1 control-label">Estado.</label>
                    <div class="col-sm-2">
                      <select name="txtestado_almacen" class="form-control"  id="txtestado_almacen">
                          <option value="1">Activo</option>
                          <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <button type="button" onclick="reg_almacen()" class="btn btn-success "><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;   Registrar</button>
                </div>
              </div>
            </form>


              <div class="box-body">
                <div class="box-header with-border">
                  <h3 class="box-title">Lista de Almacenes</h3>
                </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Buscar</label>
                      <div class="col-sm-4">
                        <input type="text" name="buscar_marca"  class="form-control" id="buscar_almacen" placeholder="buscar por nombre">
                      </div>
                      <div class="col-sm-2">
                        <button type="button" onclick="buscar_almacen();" class="btn btn-block btn-primary btn-sm">Buscar&ensp;<i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
                      </div>
                  </div>
                  <br>
                  <br>
                  <div class="box-body">
                    <div id="listar" class="icon-loading">
                      <i id="loading_almacen" style="margin:auto;display:block; margin-top:60px;"></i>
                      <div id="nodatos"></div>
                    </div>
                      <p id="paginador_almacen" class="mi_paginador"></p>
                  </div>
                </div>





          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>

    </div><!--row-->

</section>
    <!-- /.content -->




<!--MODAL MODIFICAR-->
  <div class="modal fade " id="myModal_modificara" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Modificar Almacen</h4>
        </div>
          <!--AQUI DATOS DEL MODAL-->
            <section class="content">
              <div class="row">
                <div class="col-md-12">
                  <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Datos de Almacen</h3>
                    </div>
                        <form class="form-horizontal" id="formulario_almacen2">
                          <div class="box-body">
                            <!--Mensaje de registro-->
                            <div class="" id="msj_mod_almacen">
                            </div>
                            <!--Mensaje de registro-->
                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Nombre Almacen.</label>
                                <div class="col-sm-6">
                                  <input type="text" name="txtalmacen2" id="txtalmacen2" class="form-control">
                                  <input hidden="" type="text"  id="id_almacen2">
                                </div>
                            </div>
                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Direccion Almacen.</label>
                                <div class="col-sm-6">
                                  <input type="text" name="txtdireccionalm2" id="txtdireccionalm2" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Estado Almacen.</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" disabled="" id="nestado_almacen2">
                                  
                                </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Estado Almacen</label>
                              <div class="col-sm-6">
                                <label class="miradio "><!--checked-->
                                <input type="radio" id="activo" value="1" class="form-control "  name="estado_alm">
                                <span> Activo </span>
                                </label>
                                <label class="miradio ">
                                <input type="radio" id="inactivo" value="0" class="form-control" name="estado_alm">
                                <span>Inactivo </span>
                                </label>
                              </div>
                            </div>

                          </div>
                           <div class="box-footer text-center">
                            <button type="button" onclick="mod_almacen()" class="btn btn-success btn-lg"><i class="fa fa-check-circle" aria-hidden="true"></i>&ensp; Modificar</button>
                          </div>
                          <!-- /.box-footer -->
                        </form>
                      </div>
                      <!-- /.box -->
                      <!-- /.box -->
                    </div><!--fin col-md8-->
                    
                </div><!--row-->

            </section>

      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <span class="glyphicon glyphicon-remove"></span></button>
      </div>
    </div>
  </div>
</div>
<!--MODAL MODIFICAR -->












<script src="html/javascript/reg_almacen.js"></script>
<script src="html/javascript/list_almacen.js"></script>
<script>
  $('.file-input').on('change', function() {
    previewImage(this);
});





</script>
<?php 

/*
session_name('misesion');
session_register('contador');
echo '<a href="'.$PHP_SELF.'?'.SID.'">Contador vale: '.++$_SESSION['contador'].'</a><br>';
echo 'Ahora el nombre es '.session_name().' y la sesión '.$misesion.'<br>';

*/


 ?>
