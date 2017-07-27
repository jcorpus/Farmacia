
<section class="content-header cabecera">
      <h1>
        Registro Presentacion
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Producto</a></li>
        <li class="active">Presentacion</li>
      </ol>

</section>

    <!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Datos de la Presentacion</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="formulario_reg_pres">
              <div class="box-body">
                <!--Mensaje de registro-->
                <div class="" id="msj_presentacion">
                </div>
                <!--Mensaje de registro-->
            
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Nombre Presentacion.</label>
                    <div class="col-sm-4">
                      <input type="text" name="txtpresentacion" id="txtpresentacion" class="form-control">
                    </div>
                    <label  class="col-sm-1 control-label">Estado.</label>
                    <div class="col-sm-2">
                      <select name="txtestado_pre" class="form-control"  id="txtestado_pre">
                          <option value="1">Activo</option>
                          <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <button type="button" onclick="reg_presentacion()" class="btn btn-success btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;   Registrar</button>
                </div>
                <div class="form-group">
                      <label class="col-sm-1 control-label">Reporte</label>
                      <div class="col-sm-8">
                       <button type="button" class="btn btn-success" id="reporte_presentacion"><i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i> Visualizar PDF</button>
                       
                       </div>
                </div>
              </div>
            </form>
            <div class="box-body">
                <div class="box-header with-border">
                  <h3 class="box-title">Presentaciones</h3>
                </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Buscar</label>
                      <div class="col-sm-4">
                        <input type="text" name="buscar_presentacion"  class="form-control" id="buscar_presentacion" placeholder="buscar por nombre">
                      </div>
                      <div class="col-sm-2">
                        <button type="button" onclick="buscar_present();" class="btn btn-block btn-primary btn-sm">Buscar&ensp;<i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
                      </div>
                  </div>
                  <br>
                  <br>
                  <div class="box-body">
                    <div id="listar" class="icon-loading">
                      <i id="loading_present" style="margin:auto;display:block; margin-top:60px;"></i>
                      <div id="nodatos"></div>
                    </div>
                      <p id="paginador_present" class="mi_paginador"></p>
                  </div>
              </div>
          </div>
        </div>

    </div><!--row-->

</section>
    <!-- /.content -->

<!--MODAL MODIFICAR-->
  <div class="modal fade " id="modal_mod_present" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Modificar Presentacion</h4>
        </div>
          <!--AQUI DATOS DEL MODAL-->
            <section class="content">
              <div class="row">
                <div class="col-md-12">
                  <div class="box box-info">
                    <div class="box-header with-border">
                      <h3 class="box-title">Datos de Marca</h3>
                    </div>
                        <form class="form-horizontal" id="formulario_marca2">
                          <div class="box-body">
                            <!--Mensaje de registro-->
                            <div class="" id="msj_mod_pre">
                            </div>
                            <!--Mensaje de registro-->
                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Nombre Presentacion.</label>
                                <div class="col-sm-6">
                                  <input type="text" name="txtpresent2" id="txtpresent2" class="form-control">
                                  <input type="text" hidden="" id="id_presentacion2">
                                </div>
                            </div>
                            <div class="form-group">
                              <label  class="col-sm-3 control-label">Estado</label>
                                <div class="col-sm-6">
                                <input type="text" class="form-control" disabled="" id="nestadopresent2">
                                  
                                </div>
                            </div>

                            <div class="form-group">
                              <label class="col-sm-3 control-label">Estado Presentacion</label>
                              <div class="col-sm-6">
                                <label class="miradio ">
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
                            <button type="button" onclick="mod_present()" class="btn btn-success btn-lg"><i class="fa fa-check-circle" aria-hidden="true"></i>&ensp; Modificar</button>
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


<script src="html/javascript/reg_presentacion.js"></script>
<script src="html/javascript/list_presentacion.js"></script>
<script>

$('#formulario_reg_pres').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) { 
    e.preventDefault();
    return false;
  }
});

$("#reporte_presentacion").click(function(){
  window.open("view/reportes/reporte_presentacion.php","blank");
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
