
<section class="content-header cabecera">
      <h1>
        Registro Lote de prod
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Producto</a></li>
        <li class="active">Lote</li>
      </ol>

</section>

    <!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Datos de lote</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="formulario_marca">
              <div class="box-body">
                <!--Mensaje de registro-->
                <div class="" id="msj_lote">
                </div>
                <!--Mensaje de registro-->
            
                <div class="form-group">
                  <label  class="col-sm-2 control-label">cod Lote.</label>
                    <div class="col-sm-2">
                      <input type="text" name="txtlote" id="txtlote" class="form-control">
                    </div>
                    <label  class="col-sm-1 control-label">Estado.</label>
                    <div class="col-sm-2">
                      <select name="txtestado_lote" class="form-control"  id="txtestado_lote">
                          <option value="1">Activo</option>
                          <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <button type="button" onclick="reg_lote()" class="btn btn-success btn-sm"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;   Registrar</button>
                </div>
              </div>
            </form>
            <div class="box-body">
                <div class="box-header with-border">
                  <h3 class="box-title">Lista de Lotes</h3>
                </div>

                  <div class="form-group">
                    <label class="col-sm-2 control-label">Buscar</label>
                      <div class="col-sm-4">
                        <input type="text" name="buscar_marca"  class="form-control" id="buscar_lote" placeholder="buscar por nombre">
                      </div>
                      <div class="col-sm-2">
                        <button type="button" onclick="buscar_lote();" class="btn btn-block btn-primary btn-sm">Buscar&ensp;<i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
                      </div>
                  </div>
                  <br>
                  <br>
                  <div class="box-body">
                    <div id="listar" class="icon-loading">
                      <i id="loading_lote" style="margin:auto;display:block; margin-top:60px;"></i>
                      <div id="nodatos"></div>
                    </div>
                      <p id="paginador_lote" class="mi_paginador"></p>
                  </div>
                </div>

          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>

    </div><!--row-->

</section>
    <!-- /.content -->


<script src="html/javascript/reg_lote.js"></script>
<script src="html/javascript/list_lote.js"></script>
<script></script>
<?php 

/*
session_name('misesion');
session_register('contador');
echo '<a href="'.$PHP_SELF.'?'.SID.'">Contador vale: '.++$_SESSION['contador'].'</a><br>';
echo 'Ahora el nombre es '.session_name().' y la sesión '.$misesion.'<br>';

*/


 ?>
