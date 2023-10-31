<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <base href="http://build.loc/"/> -->
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title><?=$title;?></title>
    <!-- Custom CSS -->
      <link href="../assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link href="../assets/font-awesome.css" rel="stylesheet">
    <link href="../assets/mystyles.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/fontawesome.css" integrity="" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
     <link rel="stylesheet" type="text/css" href="../assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/libs/jquery-minicolors/jquery.minicolors.css">
    <link rel="stylesheet" type="text/css" href="../assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/libs/quill/dist/quill.snow.css">
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/dataTables.dateTime.min.css">
    <link rel="stylesheet" type="text/css" href="assets/dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/buttons.dataTables.min.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark border-bottom">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="dashboard.php">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <i class="fa fa-user"></i> 
                           
                        </b>
                        <span class="logo-text">
                             <? echo strtoupper($_SESSION['user']);?> ROBA
                            
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                     
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-user m-r-5 m-l-5"></i>
                                    <?php echo $_SESSION['name']; ?> 
                                 </a>
                               
                                <a class="dropdown-item" href="exit.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                    
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
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
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                   <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                            href="dashboard.php" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
        

                        <li class="sidebar-item"><a href="object/index.php" class="sidebar-link"><i class="fa fa-house ml-2"></i>
                            <span class="hide-menu ml-2">Objects</span></a>
                        </li>
                       

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                            href="worker/index.php" >
                            <i class="mdi mdi-worker"></i>
                            <span class="hide-menu">Workers</span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                            href="fee/index.php" >
                            <i class="fa fa-dollar-sign ml-2"></i>
                            <span class="hide-menu ml-2">Add workers fee</span></a>
                        </li>

                        <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                            href="report/index.php" >
                            <i class="mdi mdi-plus"></i>
                            <span class="hide-menu">Add new report</span></a>
                        </li> -->

                         <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                            href="reports/index.php" >
                            <i class="mdi mdi-border-all"></i>
                            <span class="hide-menu">Reports</span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                            href="workers report/index.php">
                            <i class="mdi mdi-border-all"></i>
                            <span class="hide-menu">Workers report</span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                            href="surface report/index.php" >
                            <i class="mdi mdi-border-all"></i>
                            <span class="hide-menu">Surface report</span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                        href="extra objects/index.php" >
                        <i class="fa fa-bath"></i>
                        <span class="hide-menu ml-2"> Add extra objects</span></a>
                     </li>

                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                        href="finish_section/index.php" >
                        <i class="fa-solid fa-square-parking"></i>   
                         <span class="hide-menu ml-1"> Sections of Objects</span></a>
                     </li>

                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                        href="finish_floor/index.php" >
                         <i class="fa fa-stairs"></i> 
                         <span class="hide-menu ml-1"> Sections of Floors</span></a>
                     </li>

                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                        href="finish_flat/index.php" >
                        <i class="fa fa-person-shelter"></i>
                        <span class="hide-menu ml-1">Section of flat</span></a>
                     </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>