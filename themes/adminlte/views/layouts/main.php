<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Starter</title>
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
                <a href="index2.html" class="logo">
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
                                            <?= Yii::app()->user->namaLengkap ?> [<?= Yii::app()->user->name ?>]
                                            <small>Member since Nov. 2012</small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="row">
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Followers</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Sales</a>
                                            </div>
                                            <div class="col-xs-4 text-center">
                                                <a href="#">Friends</a>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?= Yii::app()->controller->createUrl('/sistem/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
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
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>

                    <!-- search form (Optional) -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->

                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MENU</li>
                        <!-- Optionally, you can add icons to the links -->
                        <?php
                        $this->widget('application.components.BMenu', [
//                            'htmlOptions' => ['class' => 'left'],
                            'activateParents' => true,
                            'encodeLabel' => false,
                            'id' => '',
                            'items' => [
                                [
                                    'label' => '<i class="fa fa-user fa-fw"></i><span>' . 'Akses</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>',
                                    'url' => '',
                                    'itemOptions' => ['class' => 'treeview'],
                                    'submenuOptions' => ['class' => 'treeview-menu'],
                                    'items' => [
                                        ['label' => '<i class="fa fa-user fa-fw"></i><span>' . ' User</span>', 'url' => ['/user/index']],
                                        ['label' => '<i class="fa fa-shield fa-fw"></i><span>' . ' Otorisasi Item</span>', 'url' => ['/auth/item/index']],
                                        ['label' => '<i class="fa fa-user-plus fa-fw"></i><span>' . ' User Assignment</span>', 'url' => ['/auth/assignment/index']],
                                    ],
                                ],
                                ['label' => '<i class="fa fa-sliders fa-fw"></i><span>' . ' Aplikasi</span>', 'url' => ['/config/index']],
                                ['label' => '<i class="fa fa-cog fa-fw"></i><span>' . ' Devices</span>', 'url' => ['/device/index']],
                                ['label' => '<i class="fa fa-user fa-fw"></i><span>' . ' Profil</span>', 'url' => ['/profil/index']],
                            ]]
                        );
                        ?>
                        <!--<li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>-->
                        <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
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
                <strong>Copyright &copy; 1438 <a href="#">Ahadmart</a>.</strong> All rights reserved.
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Create the tabs -->
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
                    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- Home tab content -->
                    <div class="tab-pane active" id="control-sidebar-home-tab">
                        <h3 class="control-sidebar-heading">Tasks Progress</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="javascript:;">
                                    <h4 class="control-sidebar-subheading">
                                        Custom Template Design
                                        <span class="pull-right-container">
                                            <span class="label label-danger pull-right">70%</span>
                                        </span>
                                    </h4>

                                    <div class="progress progress-xxs">
                                        <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <!-- /.control-sidebar-menu -->

                    </div>
                    <!-- /.tab-pane -->
                    <!-- Stats tab content -->
                    <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
                    <!-- /.tab-pane -->
                    <!-- Settings tab content -->
                    <div class="tab-pane" id="control-sidebar-settings-tab">
                        <form method="post">
                            <h3 class="control-sidebar-heading">General Settings</h3>

                            <div class="form-group">
                                <label class="control-sidebar-subheading">
                                    Report panel usage
                                    <input type="checkbox" class="pull-right" checked>
                                </label>

                                <p>
                                    Some information about this general settings option
                                </p>
                            </div>
                            <!-- /.form-group -->
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
            </aside>
            <!-- /.control-sidebar -->
            <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
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