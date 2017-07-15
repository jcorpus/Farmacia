
<section class="content-header cabecera">
      <h1>
        Registro de Productos
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Producto</a></li>
        <li class="active">Registro</li>
      </ol>

</section>

    <!-- Main content -->
<section class="content">

    <div class="row">
        <div class="col-md-9">
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
                <input  hidden="" type="text" id="usuarioa_id" name="usuarioa_id" value=" <?php echo $usuarios[$_SESSION['app_id']]['usu_id']; ?> ">
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Nombre</label>
                  <div class="col-sm-4">
                    <input type="text" name="txtproducto" onkeypress="return solo_letras(event);" class="form-control validacion" value="" id="txtproducto" placeholder="nombre producto" maxlength="40">
                  </div>
                  <label  class="col-sm-2 control-label">Marca</label>
                  <div class="col-sm-4">
                    <select name="marcap_datos" id="marcap_datos" class="form-control">
                      
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Tipo de Prod.</label>
                  <div class="col-sm-4">
                    <select  id="tipoprod_datos" name="tipoprod_datos" class="form-control">
                     
                      
                    </select>
                  </div>
                  <label  class="col-sm-2 control-label">Categoria</label>

                  <div class="col-sm-4">
                    <select  id="categoriap_datos" name="categoriap_datos" class="form-control">
                     
                      
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <!-- <label  class="col-sm-2 control-label">Fraccion</label> -->
                  <div class="col-sm-4">
                    <div class="input-group">
                        <span class="input-group-addon">Fraccion</span>
                        <input value="" required="required" maxlength="45" type="text" class="form-control" id="txtfraccion" name="txtfraccion">
                    </div>
                  </div>
                  <!-- <label  class="col-sm-2 control-label">Presentacion</label> -->
                  <div class="col-sm-5">
                    <div class="input-group">
                        <span class="input-group-addon">Presentacion</span>
                        <input value="" disabled="" type="text" class="form-control" id="npresentacion2" name="npresentacion2">
                    </div>
                    <input  type="text" hidden="" id="id_presentacion" name="id_presentacion">
                  </div>
                  <button type="button" name="buscar" id="buscar" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal_presentacion">Buscar <span class="glyphicon glyphicon-search"></span></button>
                  
                </div>
                <div class="form-group">
                <label  class="col-sm-2 control-label">Concentracion</label>
                  <div class="col-sm-4">
                    <input type="text" name="txtconcentracion" class="form-control validacion"  value="" id="txtconcentracion" placeholder="Concentracion" maxlength="50">
                  </div>
                  <label  class="col-sm-2 control-label">Cod. Lote</label>
                  <div class="col-sm-2">
                    <input type="text" name="txtcod_lote" class="form-control validacion" value="" id="txtcod_lote" placeholder="cod lote">
                  </div>
                  <button type="button" name="buscar" id="buscar" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal_buscar_alumno">Buscar <span class="glyphicon glyphicon-search"></span></button>
                </div>

                <div class="form-group">
                <label  class="col-sm-2 control-label">N° Regla Sanit.</label>
                  <div class="col-sm-4">
                    <input type="text" name="txtregla_sanitaria" class="form-control validacion"  value="" id="txtregla_sanitaria" placeholder="" maxlength="50">
                    
                  </div>
                  <label  class="col-sm-2 control-label">Fecha venc.</label>
                  <div class="col-sm-4">
                   <input type="date" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento">
                  </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Unidad Med.</label>
                  <div class="col-sm-4">
                    <select name="unidad_medida" id="unidad_medida" class="form-control">
                      
                    </select>
                  </div>
                  <label  class="col-sm-2 control-label">Imagen Prod.</label>
                  <div class="col-sm-4">
                    <input type="file" data-target="preview_image" class="file-input" id="imagen_producto" accept="image/*"  name="imagen_producto" tabindex="-1" style="position: absolute; clip: rect(0px 0px 0px 0px);" />
                      <div class="bootstrap-filestyle input-group" data-toggle="tooltip" data-placement="right" title="No obligatorio" ><span class="group-span-filestyle " tabindex="0"><label for="imagen_producto" class="btn btn-primary "><span class="glyphicon glyphicon-folder-open "></span>&ensp;Escoger Imágen</label>
                      </span>
                      </div>
                  </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Stock Min.</label>
                    <div class="col-sm-4">
                      <input type="text" name="txtstockmin" id="txtstockmin" class="form-control">
                    </div>
                    <label  class="col-sm-2 control-label">Precio comp.</label>
                    <div class="col-sm-4">
                     <input type="text" name="txtprecio_comp"  id="txtprecio_comp" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                  <label  class="col-sm-2 control-label">Stock Max.</label>
                    <div class="col-sm-4">
                      <input type="text" name="txtstockmax" id="txtstockmax" class="form-control">
                    </div>
                    <label  class="col-sm-2 control-label">Precio vent.</label>
                    <div class="col-sm-4">
                     <input type="text" name="txtpreciovent" id="txtpreciovent" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                  <label  class="col-sm-2 control-label">Cantidad.</label>
                    <div class="col-sm-4">
                      <input type="text" name="txtcantidadprod" id="txtcantidadprod" class="form-control">
                    </div>
                    <label  class="col-sm-2 control-label">Estado</label>
                  <div class="col-sm-4">
                    <select name="estado_producto" class="form-control" id="estado_producto">
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>
                    
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer text-center">
                <button type="button" onclick="reg_producto()" class="btn btn-success btn-lg"><i class="fa fa-floppy-o" aria-hidden="true"></i>&ensp;   Registrar</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
          <!-- /.box -->
        </div>
         <div class="col-md-3">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Otros datos</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="otraforma">
            <p id="respuesta"></p>
              <div class="box-body">
                <div class="form-group">
                  <label>Imagen de Producto</label>
                    </div>
                    <br>
                    <img id="preview_image" class="imagenpreview" width="170" src="site_media/img/producto.png" alt="imagen" />

                </div>
              </div>
            </form>
          </div>

        </div>
    </div><!--row-->

</section>
    <!-- /.content -->


<!--MODAL PRESENTACION-->
  <div class="modal fade " id="modal_presentacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Buscar Presentación</h4>
        </div>
          <!--AQUI DATOS DEL MODAL-->
            <section class="content">
              <div class="row">
                <div class="col-md-12">
                        <div class="box-body">
                            <div class="form-group">
                              <label class="col-sm-2 control-label">Buscar</label>
                                <div class="col-sm-4">
                                  <input type="text" name="buscar_presentacion2"  class="form-control" id="buscar_presentacion2" placeholder="buscar por nombre">
                                </div>
                                <div class="col-sm-3">
                                  <button type="button" data-toggle='modal' data-target='#modal' onclick="buscar_present2();" class="btn btn-block btn-primary btn-sm">Buscar&ensp;<i class="fa fa-search fa-lg" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <br>
                            <div class="box-body">
                              <div id="listar" class="icon-loading">
                                <i id="loading_pre2" style="margin:auto;display:block; margin-top:60px;"></i>
                                <div id="nodatos"></div>
                              </div>
                                <p id="paginador_pre2" class="mi_paginador"></p>

                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar <span class="glyphicon glyphicon-remove"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </div>
  </div>
</div>
<!--MODAL PRESENTACION -->











<script src="html/javascript/reg_producto.js"></script>
<script src="html/javascript/listar_select.js"></script>
<script src="html/javascript/list_presentacion2.js"></script>
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
