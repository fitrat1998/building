<?php 
session_start();

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
  <title>Matrix Template - The Ultimate Multipurpose admin template</title>
  <!-- Custom CSS -->
  <link href="assets/libs/flot/css/float-chart.css" rel="stylesheet">

   <link rel="stylesheet" href="assets/font-awesome.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="assets/libs/jquery-minicolors/jquery.minicolors.css">
    <link rel="stylesheet" type="text/css" href="assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="assets/libs/quill/dist/quill.snow.css">
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
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
           <div class="navbar-header" data-logobg="skin5">
              <!-- This is for the sidebar toggle which is visible on mobile only -->
              <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
              <!-- ============================================================== -->
              <!-- Logo -->
              <!-- ============================================================== -->
              <a class="navbar-brand" href="index.html">
                 <!-- Logo icon -->
                 <b class="logo-icon p-l-10">
                    <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                    <!-- Dark Logo icon -->
                    <img src="assets/images/logo-icon.png" alt="homepage" class="light-logo" />
                 </b>
                 <!--End Logo icon -->
                 <!-- Logo text -->
                 <span class="logo-text">
                    <!-- dark Logo text -->
                    <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" />
                 </span>
                 <!-- Logo icon -->
                 <!-- <b class="logo-icon"> -->
                 <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                 <!-- Dark Logo icon -->
                 <!-- <img src="assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                 <!-- </b> -->
                 <!--End Logo icon -->
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
                    <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="mdi mdi-bell font-24"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                       <a class="dropdown-item" href="#">Action</a>
                       <a class="dropdown-item" href="#">Another action</a>
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                 </li>
                 <!-- ============================================================== -->
                 <!-- End Comment -->
                 <!-- ============================================================== -->
                 <!-- ============================================================== -->
                 <!-- Messages -->
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
                 <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                 <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="tables.php" ><i class="mdi mdi-border-inside"></i><span class="hide-menu">Tables</span></a></li>
                 <li class="sidebar-item"><a href="forms.php" class="sidebar-link"><i class="mdi mdi-receipt"></i><span class="hide-menu"> Form Basic </span></a></li>
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
              <div class="col-md-6 col-lg-2 col-xlg-3">
                 <div class="card card-hover">
                    <div class="box bg-cyan text-center">
                       <h1 class="font-light text-white"><i class="mdi mdi-view-dashboard"></i></h1>
                       <h6 class="text-white">Dashboard</h6>
                    </div>
                 </div>
              </div>
              <!-- Column -->
              <div class="col-md-6 col-lg-4 col-xlg-3">
                 <div class="card card-hover">
                    <div class="box bg-success text-center">
                       <h1 class="font-light text-white"><i class="mdi mdi-chart-areaspline"></i></h1>
                       <h6 class="text-white">Charts</h6>
                    </div>
                 </div>
              </div>
              <!-- Column -->
              <div class="col-md-6 col-lg-2 col-xlg-3">
                 <div class="card card-hover">
                    <div class="box bg-warning text-center">
                       <h1 class="font-light text-white"><i class="mdi mdi-collage"></i></h1>
                       <h6 class="text-white">Widgets</h6>
                    </div>
                 </div>
              </div>
              <!-- Column -->
              <div class="col-md-6 col-lg-2 col-xlg-3">
                 <div class="card card-hover">
                    <div class="box bg-danger text-center">
                       <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                       <h6 class="text-white">Tables</h6>
                    </div>
                 </div>
              </div>
           </div>
           <div class="row">
              <div class="col-lg-12">
                 <div class="card">
                    <div class="card-body">
                       
                            <form>
                                
                               <div class="row mb-3">
                                  <div class="col-lg-4">
                                    <i class=" fas fa-hospital-alt "></i>
                                    <label> Number of flats </label> 
                                     <input type="text" class="form-control" placeholder="" required>
                                  </div>
                                  <div class="col-lg-4">
                                    <i class="fas fa-location-arrow"></i>
                                    <label> Address</label>
                                     <input type="text" class="form-control" placeholder="" required>
                                  </div>
                                  <div class="col-lg-4 m-b-10">
                                    <i class="fas fa-warehouse"></i>
                                    <label> Room</label>
                                     <input type="text" class="form-control" placeholder="" required>
                                  </div>

                                  <div class="col-lg-4">
                                    <i class="far fa-caret-square-up"></i>
                                    <label> Stage</label>
                                     <input type="text" class="form-control" placeholder="" required>
                                  </div>
                                  <div class="col-lg-4">
                                    <i class="fa fa-arrow-up-1-9"></i>
                                    <label> Number</label>
                                     <input type="text" class="form-control" placeholder="" required>
                                  </div>
                                  <div class="col-lg-4 m-b-10">
                                    <i class="fas fa-warehouse"></i>
                                    <label> Number of rooms</label>
                                     <input type="text" class="form-control" placeholder="" required>
                                 </div>
                                 
                                 <div class="col-lg-4">
                                    <i class="fa fa-bath"></i>
                                    <label> Extra objects</label>
                                        <select class="select2 form-control" multiple="multiple">
                                                <option value="kitchen">Kitchen</option>
                                                <option value="bathroom">Bathroom</option>
                                                <option value="balcony">balcony</option>
                                        </select>
                                  </div>
                                  <div class="col-lg-4">
                                    <i class="fa fa-users"></i>
                                    <label> Worker</label>
                                     <input type="text" class="form-control" placeholder="" required>
                                  </div>
                                  <div class="col-lg-4 m-b-10">
                                    <i class="fas fa-phone"></i>
                                    <label> Phone of worker</label>
                                     <input type="text" class="form-control" placeholder="" required>
                                 </div>

                                 <div class="col-lg-4">
                                    <i class="fa fa-user"></i>
                                    <label> Name of worker</label>
                                     <input type="text" class="form-control" placeholder="" required>
                                  </div>
                                  <div class="col-lg-4">
                                    <i class="fa fa-dollar-sign"></i>
                                    <label> Salary</label>
                                     <input type="text" class="form-control" placeholder="" required>
                                  </div>
                                  <div class="col-lg-4 m-b-10">
                                    <i class="fas fa-phone"></i>
                                    <label> Phone of worker</label>
                                     <input type="text" class="form-control" placeholder="" required>
                                 </div>




                               </div>
                            </form>
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
           All Rights Reserved by Matrix-admin. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
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
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <!-- This Page JS -->
    <script src="assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="dist/js/pages/mask/mask.init.js"></script>
    <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="assets/libs/quill/dist/quill.min.js"></script>
   <script>
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function() {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });
        var quill = new Quill('#editor', {
            theme: 'snow'
        });

    </script>
</body>
</html>
<? }
else {
   header("Location:index.php");
}

?>