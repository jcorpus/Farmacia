
<section class="content-header cabecera">
      <h1>
        Kardex
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Kardex</a></li>
        <li class="active">listado </li>
      </ol>

</section>

    <!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Datos del Producto</h3>
            </div>

            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="formulario_producto">
              <div class="box-body">
                <!--Mensaje de registro-->
                <div class="" id="msj_res_producto">
                </div>
                <!--Mensaje de registro-->
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Fraccion</label>

                  <div class="col-sm-4">
                    <input type="text" name="" onkeypress="return solo_letras(event);" class="form-control validacion" value="" maxlength="40" id="" placeholder="fraccion">
                  </div>
                  <label  class="col-sm-2 control-label">Presentacion</label>

                  <div class="col-sm-2">
                    <input type="text" name="" onkeypress="return solo_letras(event);" class="form-control validacion" value="" maxlength="40" id="" placeholder="proveedor">
                  </div>
                  <button type="button" name="buscar" id="buscar" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal_buscar_alumno">Buscar <span class="glyphicon glyphicon-search"></span></button>
                  
                </div>
   


              </div>
              <!-- /.box-body -->
              <div class="box-footer text-center">
                <button type="button" onclick="reg_alumno()" class="btn btn-success btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;   Registrar</button>
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


<script src="html/javascript/reg_producto.js"></script>
<script src="html/javascript/listar_select.js"></script>
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
