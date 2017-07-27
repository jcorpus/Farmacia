<?php
require_once 'core/app.config.php';
if(isset($_GET['contentType'])){
    header('Content-Type: '.
        $_GET['contentType'].
        '; charset=utf-8');
    require_once('core/model_conexion.php');
    $controller = 'nota_salida';
    if (!empty($_GET['controller'])) {
        $controller = $_GET['controller'];
    }
    if (file_exists('module/controller/controller_' . $controller . '.php')) {
        require_once('module/controller/controller_' . $controller . '.php');
    } else {
        echo json_encode([
           'success' => false
        ]);
    }
}else {
    ?>
    <!doctype html>
    <html lang="em">
    <head>
        <meta charset="utf-8"/>
        <title>Farmacia</title>
        <link rel="stylesheet" type="text/css"
              href="module/site_media/components/bootstrap/dist/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="module/site_media/components/font-awesome/css/font-awesome.css"/>
        <link rel="stylesheet" type="text/css" href="module/site_media/components/Ionicons/css/ionicons.min.css"/>
        <link rel="stylesheet" type="text/css" href="module/site_media/css/AdminLTE.css"/>
        <link rel="stylesheet" type="text/css" href="module/site_media/css/skins/_all-skins.min.css"/>
    </head>
    <body class="skin-blue sidebar-mini wysihtml5-supported">
    <header class="main-header">
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Farmacia</b>+</span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
        </nav>
    </header>
    <aside class="main-sidebar">
        <section class="sidebar">
            <ul class="sidebar-menu tree">
                <li class="header">PRINCIPAL</li>
                <li class="active treeview menu-open">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Menú</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="active"><a href="?controller=tipo_nota_salida"><i class="fa fa-circle-o"></i> Tipo
                                Nota Salida</a></li>
                        <li><a href="?controller=nota_salida"><i class="fa fa-circle-o"></i> Nota Salida</a></li>
                    </ul>
                </li>
            </ul>
        </section>
    </aside>
    <div class="content-wrapper">
        <div class="content-header">
            <?= isset($headerContent) ? $headerContent : '' ?>
        </div>
        <div class="content">
            <?php
            require_once('core/model_conexion.php');
            $controller = 'nota_salida';
            if (!empty($_GET['controller'])) {
                $controller = $_GET['controller'];
            }
            if (file_exists('module/controller/controller_' . $controller . '.php')) {
                require_once('module/controller/controller_' . $controller . '.php');
            } else {
                echo '<div class="box box-solid box-danger">
                            <div class="box-header">
                                <div class="box-title"><i class="fa fa-ban"></i> Error</div>
                            </div>
                            <div class="box-body">
                                <h1>Pagina no encontrada</h1>
                            </div>
                        </div>';
            }
            ?>
        </div>
    </div>
    <script src="module/site_media/components/jquery/dist/jquery.js"></script>
    <script src="module/site_media/components/bootstrap/dist/js/bootstrap.js"></script>
    <script src="module/site_media/components/bootstrapDialog/bootstrap-dialog.min.js"></script>
    <script>
        $.ajaxSetup({
            type: 'POST',
            contentType: 'json',
            error: function (xhr, code, mesage) {
                console.error(xhr.responseText);
            }
        });
    </script>
    </body>
    </html>
    <?php
}