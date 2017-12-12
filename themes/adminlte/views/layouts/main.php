<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?= Yii::app()->theme->baseUrl; ?>/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= Yii::app()->theme->baseUrl; ?>/bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?= Yii::app()->theme->baseUrl; ?>/bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= Yii::app()->theme->baseUrl; ?>/dist/css/fonts.css">
        <link rel="stylesheet" href="<?= Yii::app()->theme->baseUrl; ?>/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Make sure you
              apply the skin class to the body tag so the changes take effect. -->
        <link rel="stylesheet" href="<?= Yii::app()->theme->baseUrl; ?>/dist/css/skins/skin-blue.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <!--
    BODY TAG OPTIONS:
    =================
    Apply one or more of the following classes to get the
    desired effect
    |---------------------------------------------------------|
    | SKINS         | skin-blue                               |
    |               | skin-black                              |
    |               | skin-purple                             |
    |               | skin-yellow                             |
    |               | skin-red                                |
    |               | skin-green                              |
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
    -->
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->
                <a href="<?= Yii::app()->request->baseUrl ?>" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>S</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Ahad</b>SDM</span>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">

                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="<?= Yii::app()->theme->baseUrl; ?>/dist/img/user-160x160.png" class="user-image" alt="Logo Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs"><?= Yii::app()->user->namaLengkap ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->
                                    <li class="user-header">
                                        <img src="<?= Yii::app()->theme->baseUrl; ?>/dist/img/user-160x160.png" class="img-circle" alt="User Image">

                                        <p>
                                            <?= Yii::app()->user->namaLengkap ?>
                                            <small>[<?= Yii::app()->user->name ?>]</small>
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?= Yii::app()->controller->createUrl('/user/ubah', ['id' => Yii::app()->user->id]); ?>" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?= Yii::app()->controller->createUrl('/sistem/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
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
                            <img src="<?= Yii::app()->theme->baseUrl; ?>/dist/img/user-160x160.png" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?= Yii::app()->user->namaLengkap ?></p>
                            <!-- Status -->
                            <a href="#"><i class="fa fa-circle text-green"></i> Online</a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MENU</li>
                        <!-- Optionally, you can add icons to the links -->
                        <?php
                        $this->widget('application.components.BMenu', [
                            'activateParents' => true,
                            'encodeLabel' => false,
                            'id' => '',
                            'items' => [
                                [
                                    'label' => '<i class="fa fa-hashtag fa-fw"></i><span>' . 'Input</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>',
                                    'url' => '',
                                    'itemOptions' => ['class' => 'treeview'],
                                    'submenuOptions' => ['class' => 'treeview-menu'],
                                    'items' => [
                                        ['label' => '<i class="fa fa-calendar-minus-o fa-fw"></i><span>' . ' Cuti</span>', 'url' => ['/pegawaicuti/index']],
                                        ['label' => '<i class="fa fa-handshake-o fa-fw"></i><span>' . ' Mutasi</span>', 'url' => ['/pegawaimutasi/index']],
                                    ],
                                ],
                                [
                                    'label' => '<i class="fa fa-database fa-fw"></i><span>' . 'Master Data</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>',
                                    'url' => '',
                                    'itemOptions' => ['class' => 'treeview'],
                                    'submenuOptions' => ['class' => 'treeview-menu'],
                                    'items' => [
                                        ['label' => '<i class="fa fa-sitemap fa-fw"></i><span>' . ' Cabang</span>', 'url' => ['/cabang/index']],
                                        ['label' => '<i class="fa fa-user-circle-o fa-fw"></i><span>' . ' Bagian</span>', 'url' => ['/bagian/index']],
                                        ['label' => '<i class="fa fa-user-secret fa-fw"></i><span>' . ' Jabatan</span>', 'url' => ['/jabatan/index']],
                                        ['label' => '<i class="fa fa-user fa-fw"></i><span>' . ' Pegawai</span>', 'url' => ['/pegawai/index']],
                                        ['label' => '<i class="fa fa-user-o fa-fw"></i><span>' . ' Pegawai (Config)</span>', 'url' => ['/pegawaiconfig/index']],
                                        ['label' => '<i class="fa fa-calendar-check-o fa-fw"></i><span>' . ' Alasan Cuti</span>', 'url' => ['/alasancuti/index']],
                                    ],
                                ],
                                [
                                    'label' => '<i class="fa fa-wrench fa-fw"></i><span>' . 'Config</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>',
                                    'url' => '',
                                    'itemOptions' => ['class' => 'treeview'],
                                    'submenuOptions' => ['class' => 'treeview-menu'],
                                    'items' => [
                                        ['label' => '<i class="fa fa-user fa-fw"></i><span>' . ' User</span>', 'url' => ['/user/index']],
                                        ['label' => '<i class="fa fa-shield fa-fw"></i><span>' . ' Auth Item</span>', 'url' => ['/authitem/index']],
                                    ],
                                ],
//                                ['label' => '<i class="fa fa-sliders fa-fw"></i><span>' . ' Aplikasi</span>', 'url' => ['/config/index']],
//                                ['label' => '<i class="fa fa-cog fa-fw"></i><span>' . ' Devices</span>', 'url' => ['/device/index']],
//                                ['label' => '<i class="fa fa-user fa-fw"></i><span>' . ' Profil</span>', 'url' => ['/profil/index']],
                            ]]
                        );
                        ?>
                    </ul>
                    <!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?= CHtml::encode($this->pageHeader['title']) ?>
                        <small><?= CHtml::encode(isset($this->pageHeader['desc']) ? $this->pageHeader['desc'] : '') ?></small>
                    </h1>
                    <?php
                    if (isset($this->breadcrumbs)):
                        $this->widget('zii.widgets.CBreadcrumbs', [
                            'links' => $this->breadcrumbs,
                            'tagName' => 'ol',
                            'activeLinkTemplate' => '<li><a href="{url}">{label}</a></li>',
                            'inactiveLinkTemplate' => '<li>{label}</li>',
                            'htmlOptions' => ['class' => 'breadcrumb'],
                            'separator' => ''
                        ]);
                    endif
                    ?>
                </section>

                <!-- Main content -->
                <section class="content container-fluid">
                    <?php echo $content; ?>
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <div class="pull-right hidden-xs">
                    Powered by Yiiframework
                </div>
                <!-- Default to the left -->
                <strong>Copyright &copy; 1438. Sponsored by <a href="#">Ahadmart</a>.</strong>
            </footer>

        </div>
        <!-- ./wrapper -->

        <!-- REQUIRED JS SCRIPTS -->

        <!-- jQuery 3 -->
        <!--<script src="<?= Yii::app()->theme->baseUrl; ?>/bower_components/jquery/dist/jquery.min.js"></script> Digantikan dengan yang atas-->
        <?php Yii::app()->clientScript->registerCoreScript('jquery') ?>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?= Yii::app()->theme->baseUrl; ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?= Yii::app()->theme->baseUrl; ?>/dist/js/adminlte.min.js"></script>

        <!-- Optionally, you can add Slimscroll and FastClick plugins.
             Both of these plugins are recommended to enhance the
             user experience. -->
    </body>
</html>