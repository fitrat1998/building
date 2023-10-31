<?php 
session_start();
include'config.php';

$sql = mysqli_query($link,"SELECT * FROM projects");
$projects = mysqli_num_rows($sql);

$sql2 = mysqli_query($link,"SELECT * FROM objects GROUP BY obj_name HAVING COUNT(obj_name) > 0");
$objects = mysqli_num_rows($sql2);

$sql3 = mysqli_query($link,"SELECT * FROM projects WHERE status = 'done'");
$done = mysqli_num_rows($sql3);

$sql4 = mysqli_query($link,"SELECT * FROM projects WHERE status = 'processing'");
$processing = mysqli_num_rows($sql4);

 if($_SESSION['user']){
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>HOME-ROBA</title>
    <!-- Custom CSS -->
    <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link href="assets/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/fontawesome.css" integrity="" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
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

                    <ul class="navbar-nav mr-auto">
                       
                        <li class="nav-item d-FLEX d-md-block">
                             <form method="POST" id="form">
                                    <?php
                                      if(!$_SESSION['globaldate']){?>
                                          <input type="date" name="globaldate" class="p-1 m-3" id="globaldate">
                                          <button type="submit" class="btn btn-success " >Submit</button>
                                       <? } ?>
                            </form>
                        </li>

                        <li class="nav-item d-flex d-md-block" style="margin-top:20px;">

                             <form method="POST" id="delete">
                                <!-- <span class="ml-3 border p-1 m-1"> -->
                                    <?php
                                      if($_SESSION['globaldate']){
                                        echo "<span class='text-white p-1  m-2 border'>".$_SESSION['globaldate']."</span>";
                                      }
                                      else {
                                         echo "<span class='text-white p-3'>Global date not set up yet!</span>";
                                      }
                                    ?>
                                        
                                    <!-- </span>    -->
                                <?php if($_SESSION['globaldate']){ ?>
                                <button type="button" class="btn btn-danger uchir p-1" salom="1" onclick="del()"> Unset</button>
                                 <? }?>
                             </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">

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
        
                        <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                            href="project/index.php" >
                            <i class="fa fa-building ml-2"></i><span class="hide-menu ml-2">Projects</span></a>
                        </li> -->

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
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <!-- <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><i class="fa fa-hospital"></i></h1>
                                <h6 class="text-white">All projects</h6>
                                <h6 class="text-white"><?=$projects?></h6>
                            </div>
                        </div>
                    </div> -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-danger text-center">
                                <h1 class="font-light text-white"><i class="fa fa-hospital-alt"></i></h1>
                                <h6 class="text-white">Objects</h6>
                                <h6 class="text-white"><?=$objects?></h6>
                            </div>
                        </div>
                    </div>

                     <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-success text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-calendar-check"></i></h1>
                                <h6 class="text-white">Done</h6>
                                <h6 class="text-white"><?=$done?></h6>
                            </div>
                        </div>
                    </div>

                    <!-- Column -->
                    <div class="col-md-6 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="box bg-warning text-center">
                                <h1 class="font-light text-white"><i class="mdi mdi-percent"></i></h1>
                                <h6 class="text-white">Processing</h6>
                                <h6 class="text-white"><?=$processing?></h6>
                            </div>
                        </div>
                    </div>
                   
                </div>
             
            </div>
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                &copy 2023 All right reserved.</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="assets/libs/flot/excanvas.js"></script>
    <script src="assets/libs/flot/jquery.flot.js"></script>
    <script src="assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="assets/libs/flot/jquery.flot.time.js"></script>
    <script src="assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="dist/js/pages/chart/chart-page-init.js"></script>
    <script type="text/javascript" src="assets/all.min.js"></script>
    <script type="text/javascript">
        $('#form').submit(function(e){
            e.preventDefault();

            let data = $('#globaldate').val();

            $.ajax({
                url : "globaldate.php",
                type: "POST",
                data:{
                    date:data
                },
                success:function(data){
                    var obj = jQuery.parseJSON(data);
                    if(obj.xatolik == 0){
                        swal(obj.xabar, {
                          icon: "success",
                        });
                         function rel1(){
                            location.reload();
                        }
                        const d1 = setTimeout(rel1,300);
                    }
                    else {
                        swal(obj.xabar,{
                         icon: "error"});
                    }
                },
                error:function(xhr){
                    alert('Connecting error!!!');
                }
            });
        });
    </script>

    <script type="text/javascript">
      function del(){
            
            let id = $('.uchir').attr("salom");
            console.log(id);

            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this imaginary file!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                
                 function rel(){
                            location.reload();
                }
                const d = setTimeout(rel,800);
                $.ajax({
                url: "deletedate.php",
                type: "POST",
                data:{
                    id:id,
                },
                success:function(data){
                    var obj2 = jQuery.parseJSON(data);                    
                    if(obj2.xatolik == 0){
                        swal(obj2.xabar, {
                          icon: "success",
                        });
                    }
                    else {
                        swal("HERE ",{icon: "error"});
                    }
                },
                error:function(xhr){
                    alert("Connecting error!!!")
                }
            }); 

                
              } else {
                swal("Canceled!!!",{
                  icon: "error"});
              }
            });
        }
    </script>

</body>

</html>
<? }
else {
    header("Location:index.php");
}

?>