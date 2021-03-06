<!-- MENU CON CLASE FIXED-->
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="admin.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Panel&ensp;</b>Admin</span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="../Modulos.php" target="_blank">
              <i class="fa fa-home fa-lg"></i>
              <span class="hidden-xs">
                Otros          
              </span>
            </a>

          </li>
          <li >
            <!-- Menu Toggle Button -->
            <a href="../Modulos.php" target="_blank">
              <i class="fa fa-home fa-lg"></i>
              <span class="hidden-xs">
                Modulos          
              </span>
            </a>

          </li>
          <li>
            <a href="core/controller/salirController.php">
              <i class="fa fa-sign-out" aria-hidden="true"></i>
            Salir &nbsp;
            </a>
          </li>

          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-wrench fa-lg" aria-hidden="true"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
        
          <img src="<?php echo $usuarios[$_SESSION['app_id']]['usu_img']; ?>"  class="img-circle" alt="User Image">
        
        </div>
        <div class="pull-left info">
          <p><?php echo $usuarios[$_SESSION['app_id']]['perso_nom']; echo " ".$usuarios[$_SESSION['app_id']]['usu_id']; ?><p/>
          
          <!-- Status -->
          <a href="javascript:void(0)"><i class="fa fa-circle text-success"></i> <?php echo $usuarios[$_SESSION['app_id']]['usu_nom']; ?></a>
        </div>
      </div>

      <!-- search form (Optional) -->
      
        <div class="">
          Reloj
        </div>
      
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <input  hidden="" type="text" id="usuarioa_id" name="usuarioa_id" value=" <?php echo $usuarios[$_SESSION['app_id']]['usu_id']; ?> ">
        <!-- Optionally, you can add icons to the links -->
        
        <li class="treeview">
          <a href="#"><i class="fa fa-male fa-lg" aria-hidden="true"></i>&ensp;&ensp; <span>Usuario</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=listar"><i class="fa fa-list-ul" aria-hidden="true"></i>&ensp;Listar Usuarios</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-truck fa-lg" aria-hidden="true"></i>&ensp;&ensp; <span>ALmacen</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=reg_almacen"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Registrar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-list-alt fa-lg" aria-hidden="true"></i>&ensp;&ensp; <span>Productos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=reg_producto"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Registrar Prod.</a></li>
            <li><a href="?p=list_producto"><i class="fa fa-list-alt" aria-hidden="true"></i>&ensp;Listar Prod.</a></li>
            <li><a href="?p=reg_categoria"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Categoria</a></li>
            <li><a href="?p=reg_marca"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Marca</a></li>
            <li><a href="?p=reg_tipo_prod"><i class="fa fa-list-ul" aria-hidden="true"></i>&ensp;Tipo de Producto</a></li>
            <li><a href="?p=reg_lote"><i class="fa fa-list-ul" aria-hidden="true"></i>&ensp;Lote de Producto</a></li>
            <li><a href="?p=reg_presentacion"><i class="fa fa-list-ul" aria-hidden="true"></i>&ensp;Presentacion</a></li>
            <li><a href="?p=reg_prioridad"><i class="fa fa-list-ul" aria-hidden="true"></i>&ensp;Listar Prioridad</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>&ensp;&ensp; <span>Nota de Ingreso</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=reg_nota_ingreso"><i class="fa fa-sign-in" aria-hidden="true"></i>&ensp;Nota de Ingreso</a></li>
            <li><a href="?p=reg_nota_salida"><i class="fa fa-external-link-square" aria-hidden="true"></i>&ensp;Nota de Salida</a></li>
            <li><a href="?p=control_ingreso"><i class="fa fa-external-link-square" aria-hidden="true"></i>&ensp;Control de Ingreso</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-external-link fa-lg" aria-hidden="true"></i>&ensp;&ensp; <span>Nota de Salida</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=reg_nota_ingreso"><i class="fa fa-sign-in" aria-hidden="true"></i>&ensp;Nota de Ingreso</a></li>
            <li><a href="?p=reg_nota_salida"><i class="fa fa-external-link-square" aria-hidden="true"></i>&ensp;Nota de Salida</a></li>
            <li><a href="?p=control_ingreso"><i class="fa fa-external-link-square" aria-hidden="true"></i>&ensp;Control de Ingreso</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-book fa-lg" aria-hidden="true"></i>&ensp;&ensp; <span>Kardex</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=reg_kardex"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Listar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-archive fa-lg" aria-hidden="true"></i>&ensp;&ensp; <span>Inventario</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=reg_inventario"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Registrar Inv</a></li>
            <li><a href="?p=reg_tipo_inventario"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Tipo de Invent.</a></li>
            <li><a href="?p=reg_kardex"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Apertura de Inventario</a></li>
            <li><a href="?p=reg_kardex"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Cierre de Inventario</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-tags fa-lg" aria-hidden="true"></i>&ensp;&ensp; <span>Otros Datos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=otros_datos"><i class="fa fa-list-ul" aria-hidden="true"></i>&ensp;Tipos</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-database fa-lg" aria-hidden="true"></i>&ensp;&ensp; <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=reportes"><i class="fa fa-file-text-o" aria-hidden="true"></i>&ensp;Reportes PDF</a></li>
            <li><a href="?p=graficos"><i class="fa fa-bar-chart" aria-hidden="true"></i>&ensp;Gráficos</a></li>
            <li><a href="?p=graficos"><i class="fa fa-bar-chart" aria-hidden="true"></i>&ensp;Producto</a></li>
            <li><a href="?p=graficos"><i class="fa fa-bar-chart" aria-hidden="true"></i>&ensp;Almacen</a></li>
            <li><a href="?p=graficos"><i class="fa fa-bar-chart" aria-hidden="true"></i>&ensp;Ingreso</a></li>
            <li><a href="?p=graficos"><i class="fa fa-bar-chart" aria-hidden="true"></i>&ensp;Salidas</a></li>
            <li><a href="?p=graficos"><i class="fa fa-bar-chart" aria-hidden="true"></i>&ensp;Inventario</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Cuenta</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
