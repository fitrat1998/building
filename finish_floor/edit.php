<?php 
session_start();
include '../config.php';

$id = $_GET['id'];

$sql = mysqli_query($link,"SELECT * FROM extra_object WHERE id = '$id'");
$res = mysqli_fetch_assoc($sql);
$_SESSION['sec_id'] = $res['id'];

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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Matrix Template - The Ultimate Multipurpose admin template</title>
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
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <i class="fa fa-user"></i> 
                           
                        </b>
                        <span class="logo-text">
                             <? echo strtoupper($_SESSION['user']);?>
                            
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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-user m-r-5 m-l-5"></i>
                                    <?php echo $_SESSION['name']; ?>
                                 </a>
                               
                                <a class="dropdown-item" href="../exit.php"><i class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                                    
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
                            href="../dashboard.php" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                            href="../project/index.php" >
                            <i class="fa fa-building"></i><span class="hide-menu">Projects</span></a>
                        </li>

                        <li class="sidebar-item"><a href="../object/index.php" class="sidebar-link"><i class="fa fa-house"></i>
                            <span class="hide-menu">Objects</span></a>
                        </li>
                       

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                            href="index.php" >
                            <i class="mdi mdi-worker"></i>
                            <span class="hide-menu">Workers</span></a>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                            href="../report/index.php" >
                            <i class="mdi mdi-plus"></i>
                            <span class="hide-menu">Add new report</span></a>
                        </li>

                         <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                            href="../reports/index.php" >
                            <i class="mdi mdi-border-all"></i>
                            <span class="hide-menu">Reports</span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                            href="../workers report/index.php">
                            <i class="mdi mdi-border-all"></i>
                            <span class="hide-menu">Workers report</span></a>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                            href="../surface report/index.php" >
                            <i class="mdi mdi-border-all"></i>
                            <span class="hide-menu">Surface report</span></a>
                        </li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                            href="index.php" >
                            <i class="fa fa-bath"></i>
                            <span class="hide-menu">Add extra objects</span></a>
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
                    <div class="col-12 d-flex no-block align-items-center text-center">
                        <h4 class="text-center">Dashboard</h4>
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
              
             
              <div class="row" >
                      <div class="col-lg-12">
                         <div class="row" >
                     <div class="col-lg-12">
                        <div class="card" >
                           <div class="card-body" >
                              <form method="POST" id="edit" >
                                 <h3 class="text-center border-bottom m-b-20">
                                    Updating
                                 </h3>
                                 <div class="row mb-3" >
                                  
                                    <div class="col-lg-4" id="test">
                                       <i class=" fas fa-hospital "></i>
                                         <label> Objects</label> 
                                        <input type="text" name="object_name" class="form-control object" placeholder="object" required style="background-color: #F8F8F8 !important;" id="object_id" value="<?=$res['object_name']?>">
                                    </div>

                                     <div class="col-lg-4" id="test">
                                       <i class=" fas fa-calculator "></i>
                                       <label> Surface 2^m</label>
                                       <input type="text" name="surface" class="form-control object" placeholder="surface" required style="background-color: #F8F8F8 !important;" id="surface" value="<?=$res['surface']?>">
                                    </div>

                                    <div class="col-lg-4" id="test">
                                       <i class="fa fa-stair "></i>
                                       <label>Floor</label>
                                       <input type="text" name="floor" class="form-control object" placeholder="floor" required style="background-color: #F8F8F8 !important;" id="surface" value="<?=$res['floor']?>">
                                    </div>

                                </div>

                                <div class="row mb-3" >
                                    <div class="col-lg-4" id="test">
                                       
                                       <i class="fa fa-parking"></i>
                                       <label>Extra section of object</label><br>
                                       <select name="section[]" class="js-example-basic-multiple form-control" multiple="multiple" style="background-color: #F8F8F8 !important;width: !important; ">
                                        <?php 
                                          $sql = mysqli_query($link,"SELECT * FROM sections WHERE parent = 'floor'");
                                          while($rows = mysqli_fetch_assoc($sql)){
                                             ?>
                                                <option class="form-control" value="<?=$rows['id']?>">
                                                    <?=$rows['section_name']?></option>
                                             <?
                                          }
                                        ?>
                                       </select>
                                                
                                   </div>
                                     

                                    <div class="col-lg-4">
                                       <i class="mdi mdi-worker"></i>
                                       <label>Workers</label><br>
                                       <select name="worker[]" class="js-example-basic-multiple form-control" multiple="multiple" style="background-color: #F8F8F8 !important;width:px!important; ">
                                        <?php 
                                          $sql = mysqli_query($link,"SELECT * FROM workers");
                                          while($rows = mysqli_fetch_assoc($sql)){
                                             ?>
                                                <option class="form-control" value="<?=$rows['id']?>"><?=$rows['name']?></option>
                                             <?
                                          }
                                        ?>
                                       </select>
                                    </div>

                                    </div>

                                 <input type="hidden" name="section_ex" value="<?=$res['section']?>">
                                 <input type="hidden" name="worker_ex" value="<?=$res['workers']?>">
                                 <input type="hidden" name="id" value="<?=$res['id']?>">

                                 
                                 <button type="submit" class="btn btn-success float-justify" ><h4>Submit</h4></button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                      </div>
                  </div>

                
            
           
               
            </div>
            <footer class="footer text-center">
                All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
            
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!-- This Page JS -->

    <!-- <script src="../js/jquery-3.6.3.min.js"></script> -->
    <script src="../js/sweetalert.min.js"></script>

    <!-- This Page JS -->
    <!-- <script src="../assets/libs/inputmask/../dist/min/jquery.inputmask.bundle.min.js"></script> -->
    <!-- <script src="../dist/js/pages/mask/mask.init.js"></script> -->
    <script src="../assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="../assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="../assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="../assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="../assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="../assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="../assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/libs/quill/dist/quill.min.js"></script>
   <script>
       
       
           $(document).ready(function() {
              $(".js-example-basic-multiple").select2();
            });

    </script>

    <script type="text/javascript">
        function myFunction() {
              var x = document.getElementById("card");
              if (x.style.display === "block") {
                  x.style.display = "none";
                  console.log(1111)
              } 
              else {
                  x.style.display = "block";
                  console.log(2222)
              }
        }

    </script>

    <script type="text/javascript">
        $('#edit').submit(function(e){
            e.preventDefault();
            let edit = $('#edit').serialize();

            $.ajax({
                url: "update.php",
                type: "POST",
                data: edit,
                success:function(data){
                    // console.log(data)
                    var obj = jQuery.parseJSON(data);
                    if(obj.xatolik == 0){
                        swal('Good job',obj.xabar,'success');
                        function ref() {
                            window.location.href = 'index.php';
                        }

                        const p = setTimeout(ref,300);
                    }
                    else {
                        swal('Error!!!',obj.xabar,'error');
                    }
                },
                error:function(xhr){
                    alert("Coonnecting error");
                }
            });
        });
    </script>

  

</body>

</html>
<? }
else {
    header("Location:index.php");
}

?>