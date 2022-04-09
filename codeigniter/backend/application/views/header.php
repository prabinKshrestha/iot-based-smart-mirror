<?php $this->load->model('crud_model','crud'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="templates/assets/images/favicon.png">
    <title>Smart Mirror | <?php echo $title;?></title>
    <base href="<?php echo base_url(); ?>" />
    <!-- This page CSS -->
    <!-- chartist CSS -->
    <link href="templates/assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <!--Toaster Popup message CSS -->
    <link href="templates/assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="templates/material/dist/css/style.min.css" rel="stylesheet">
    <link href="templates/material/dist/css/pages/tab-page.css" rel="stylesheet">
    <!-- Dashboard 1 Page CSS -->
    <link href="templates/material/dist/css/pages/dashboard1.css" rel="stylesheet">
    
    <link href="templates/assets/node_modules/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <link href="templates/assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <link href="templates/assets/node_modules/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" rel="stylesheet">
    <!-- Page plugins css -->
    <link href="templates/assets/node_modules/clockpicker/dist/jquery-clockpicker.min.css" rel="stylesheet">

    <link href="templates/assets/node_modules/switchery/dist/switchery.min.css" rel="stylesheet" />
    <link href="templates/assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="templates/assets/node_modules/bootstrap-select/bootstrap-select.min.css" rel="stylesheet" />
    <link href="templates/assets/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="templates/assets/node_modules/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link href="templates/assets/node_modules/multiselect/css/multi-select.css" rel="stylesheet" type="text/css" />


    <script type="text/javascript" src="themes/plugins/ckeditor/ckeditor.js"></script>
    <script src="themes/js/jquery.min.js"></script>
    <script src="themes/js/jquery-ui.min.js"></script>
    <!--  -->
    <!-- Custom CSS -->
    <link href="static/css/style.css" rel="stylesheet">
  

<script type="text/javascript" src="static/js/nepali.datepicker.v2.2.min.js"></script>    
<link href="static/css/nepali.datepicker.v2.2.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-default fixed-layout">
<?php
$user_id= $this->session->userdata('admin_id');
$this->db->where('user_id', $user_id);
$detail = $this->db->get('igc_users')->row_array();


?>
<!-- ============================================================== -->
<!-- Preloader - style you can find in spinners.css -->
<!-- ============================================================== -->
<!-- <div class="preloader">
    <div class="loader">
        <div class="loader__figure"></div>
        <p class="loader__label">CCS Nepal</p>
    </div>
</div> -->
<!-- ============================================================== -->
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo site_url(); ?>">
                    <!-- Logo icon --><b>
                        SmartMirror
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->

                        <!-- Light Logo icon -->
                        <!-- <img src="templates/assets/images/logo-light-icon.png" alt="homepage"  class="light-logo" /> -->
                    </b>
                    <!--End Logo icon -->
                    <!-- Logo text --><span>
                         <!-- dark Logo text -->
                         <!-- <img src="templates/assets/images/logo-text.png" width="75%" alt="homepage" class="dark-logo" /> -->
                        <!-- Light Logo text -->
                      <!--    <img src="templates/assets/images/logo-light-text.png" width="75%" class="light-logo" alt="homepage" /></span>
                       --></a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <div class="navbar-collapse">
                <!-- ============================================================== -->
                <!-- toggle and nav items -->
                <!-- ============================================================== -->
                <ul class="navbar-nav mr-auto">
                    <!-- This is  -->
                    <li class="nav-item"> <a class="nav-link nav-toggler d-block d-sm-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                    <!-- ============================================================== -->
                    <!-- Search -->
                    <!-- ============================================================== -->

                </ul>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <ul class="navbar-nav my-lg-0">
                    <li class="nav-item dropdown u-pro">
                        <a class="nav-link dropdown-toggle waves-effect waves-dark profile-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="templates/assets/images/users/1.jpg" alt="user" class=""> <span class="hidden-md-down"><?php echo $this->session->userdata('username');?> &nbsp;<i class="fa fa-angle-down"></i></span> </a>
                        <div class="dropdown-menu dropdown-menu-right animated flipInY">
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="<?php echo site_url('profile');?>" class="dropdown-item"><i class="ti-key"></i> Password</a>
                            <!-- text-->
                            <div class="dropdown-divider"></div>
                            <!-- text-->
                            <a href="<?php echo site_url('login/logout');?>" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                            <!-- text-->
                        </div>
                    </li>
                    <!-- ============================================================== -->
                    <!-- End User Profile -->
                </ul>
            </div>
        </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="user-pro"> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><img src="templates/assets/images/users/1.jpg" alt="user-img" class="img-circle"><span class="hide-menu"><?php echo $this->session->userdata('username');?></span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="<?php echo site_url('profile');?>"><i class="ti-key"></i> Password</a></li>
                            <li><a href="<?php echo site_url('login/logout');?>"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                    <li class="nav-small-cap"><span class="side_shift_am">TODO MANAGEMENT</span></li>
                    <li> 
                        <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-list"></i><span class="hide-menu">To Do </span></a>
                        <ul aria-expanded="false" class="collapse">

                            <li><a href="<?php echo site_url(); ?>todo/form">Add To Do</a></li>
                            <li><a href="<?php echo site_url(); ?>todo">My todo </a></li>
                            <li><a href="<?php echo site_url(); ?>todo/todo_today">Today Todo </a></li>
                            <li><a href="<?php echo site_url(); ?>todo/todo_upcomings">Upcomings Todo </a></li>
<!-- ============================================================================ -->
                     </ul>
                 </li>
                    <li><a href="<?php echo site_url(); ?>newspaper"><i class="icon  icon-book-open"></i>Newspaper </a></li>
                    <li><a href="<?php echo site_url(); ?>user"><i class="fa fa-user"></i>Users</a></li>
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->


