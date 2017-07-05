
<section class="content-header cabecera">
      <h1>
        Registro Categoria de producto
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Producto</a></li>
        <li class="active">Categoria</li>
      </ol>

</section>

    <!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-9">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Datos de Categoria</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="formulario_categoria">
              <div class="box-body">
                <!--Mensaje de registro-->
                <div class="" id="msj_categoria">
                </div>
                <!--Mensaje de registro-->
            
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Nombre categoria.</label>
                    <div class="col-sm-4">
                      <input type="text" id="txtcategoria" name="txtcategoria" class="form-control">
                    </div>
                    <label  class="col-sm-2 control-label">Descripción.</label>
                    <div class="col-sm-4">
                     <input type="text" id="txtdescripcion" name="txtdescripcion" class="form-control">
                    </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-center">
                <button type="button" onclick="reg_categoria()" class="btn btn-success btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp; Registrar</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>

    </div><!--row-->

</section>
    <!-- /.content -->


<script src="html/javascript/reg_categoria.js"></script>

<?php 

/*
session_name('misesion');
session_register('contador');
echo '<a href="'.$PHP_SELF.'?'.SID.'">Contador vale: '.++$_SESSION['contador'].'</a><br>';
echo 'Ahora el nombre es '.session_name().' y la sesión '.$misesion.'<br>';

*/


 ?>
