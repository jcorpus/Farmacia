
<section class="content-header cabecera">
      <h1>
        Registro prioridad &ensp;<i class="fa fa-check-square-o" aria-hidden="true"></i>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Producto</a></li>
        <li class="active">prioridad</li>
      </ol>

</section>

    <!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Datos</h3>
            </div>

              <form class="form-horizontal" id="formulario_prioridad">
                  <div class="box-body">
                    <!--Mensaje de registro-->
                    <div class="" id="msj_prioridad">
                    </div>
                    <!--Mensaje de registro-->
                    <div class="form-group">
                      <label  class="col-sm-2 control-label">Nombre Prioridad.</label>
                      <div class="col-sm-2">
                        <input type="text" name="txtprioridad" id="txtprioridad" class="form-control">
                      </div>
                      <label  class="col-sm-1 control-label">Estado</label>
                      <div class="col-sm-2">
                        <select name="txtestado_p" class="form-control"  id="txtestado_p">
                          <option value="1">Activo</option>
                          <option value="0">Inactivo</option>
                        </select>
                      </div>
                      <button type="button" onclick="reg_prioridad()" class="btn btn-success "><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;   Registrar</button>
                    </div>
                  </div>
              </form>
              <div class="box-body">
                <div class="box-header with-border">
                  <h3 class="box-title">Lista de </h3>
                </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Buscar</label>
                      <div class="col-sm-4">
                        <input type="text" name="buscar_marca"  class="form-control" id="buscar_marca" placeholder="buscar por nombre">
                      </div>
                      <div class="col-sm-2">
                        <button type="button" onclick="buscar_marca();" class="btn btn-block btn-primary btn-sm">Buscar&ensp;<i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
                      </div>
                  </div>
                  <br>
                  <br>
                  <div class="box-body">
                    <div id="listar" class="icon-loading">
                      <i id="loading_prioridad" style="margin:auto;display:block; margin-top:60px;"></i>
                      <div id="nodatos"></div>
                    </div>
                      <p id="paginador_prioridad" class="mi_paginador"></p>
                  </div>
              </div>
          </div>
        </div>

    </div><!--row-->

</section>
   


<!--MODAL MODIFICAR-->
  <div class="modal fade " id="myModal_modificarm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Modificar Marca</h4>
        </div>
          <!--AQUI DATOS DEL MODAL-->
            <section class="content">
              <div class="row">
                <div class="col-md-12">
                  <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Datos</h3>
                    </div>
                        <form class="form-horizontal" id="formulario_marca2">
                          <div class="box-body">
                            <!--Mensaje de registro-->
                            <div class="" id="msj_mod_marca">
                            </div>
                            <!--Mensaje de registro-->
                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Nombre Marca.</label>
                                <div class="col-sm-6">
                                  <input type="text" name="txtmmarca2" id="txtmmarca2" class="form-control">
                                  <input type="text" hidden="" id="id_marca2">
                                </div>
                            </div>
                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Estado Marca.</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" disabled="" id="nestado_marca2">
                                  
                                </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Estado Marca</label>
                              <div class="col-sm-6">
                                <label class="miradio "><!--checked-->
                                <input type="radio" id="activo" value="1" class="form-control "  name="estadoo">
                                <span> Activo </span>
                                </label>
                                <label class="miradio ">
                                <input type="radio" id="inactivo" value="0" class="form-control" name="estadoo">
                                <span>Inactivo </span>
                                </label>
                              </div>
                            </div>

                          </div>
                           <div class="box-footer text-center">
                            <button type="button" onclick="mod_marca()" class="btn btn-success btn-lg"><i class="fa fa-check-circle" aria-hidden="true"></i>&ensp; Modificar</button>
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















<script src="html/javascript/list_prioridad.js"></script>
<script src="html/javascript/reg_prioridad.js"></script>

<?php 

/*
session_name('misesion');
session_register('contador');
echo '<a href="'.$PHP_SELF.'?'.SID.'">Contador vale: '.++$_SESSION['contador'].'</a><br>';
echo 'Ahora el nombre es '.session_name().' y la sesión '.$misesion.'<br>';

*/


 ?>
