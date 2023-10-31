<?php 
   session_start();
   include '../config.php';
   include '../date.php';
   
   $sql_project = mysqli_query($link,"SELECT * FROM projects");
   $sql_worker = mysqli_query($link,"SELECT * FROM workers");
   
   
   
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
      <title>ROBO-ADD REPORT</title>
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
                     <? echo strtoupper($_SESSION['user']);?> ROBO
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
                           <?php echo $_SESSION['name']; ?> ROBO
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
                        <i class="fa fa-building ml-2"></i><span class="hide-menu ml-2">Projects</span></a>
                     </li>
                     <li class="sidebar-item"><a href="../object/index.php" class="sidebar-link"><i class="fa fa-house ml-2"></i>
                        <span class="hide-menu ml-2">Objects</span></a>
                     </li>

                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                        href="../worker/index.php" >
                        <i class="mdi mdi-worker"></i>
                        <span class="hide-menu">Workers</span></a>
                     </li>

                      <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                            href="../fee/index.php" >
                            <i class="fa fa-dollar-sign ml-2"></i>
                            <span class="hide-menu ml-2">Add workers fee</span></a>
                        </li>

                   <!--   <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                        href="index.php" >
                        <i class="mdi mdi-plus"></i>
                        <span class="hide-menu">Add new report</span></a>
                     </li> -->

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
                        href="../extra objects/index.php" >
                        <i class="fa fa-bath ml-2"></i>
                        <span class="hide-menu">Add extra objects</span></a>
                     </li>


                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                        href="../finish_section/index.php" >
                        <i class="fa-solid fa-square-parking ml-2"></i>   
                         <span class="hide-menu ml-2"> Sections of Objects</span></a>
                     </li>

                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                        href="../finish_floor/index.php" >
                         <i class="fa fa-stairs ml-2"></i> 
                         <span class="hide-menu ml-2"> Sections of Floors</span></a>
                     </li>

                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                        href="../finish_flat/index.php" >
                        <i class="fa fa-person-shelter ml-2"></i>
                        <span class="hide-menu ml-2">Section of flat</span></a>
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
               <div id="" >
                  <div class="row" >
                     <div class="col-lg-12">
                        <div class="card" >
                           <div class="card-body" >
                              <form method="POST" id="report" >

                                 <h3 class="text-center border-bottom m-b-20"><i class="fa fa-book"></i> Add new Report</h3>
                                 <div class="row mb-3" >
                                  
                                    <div class="col-lg-4">
                                       <i class=" fas fa-hospital-alt "></i>
                                       <label> Projects</label> 
                                       <select name="project_id" class="form-control" placeholder="Address" required 
                                          style="background-color: #F8F8F8 !important;" id="project">
                                          <option value="">choose project</option>
                                          <?php 
                                             foreach($sql_project as $opt){
                                             ?>
                                          <option value="<?=$opt['id'];?>"><?=$opt['project_name'];?></option>
                                          <? } 
                                             ?>
                                       </select>
                                    </div>

                                    <div class="col-lg-4" id="test">
                                       <i class=" fas fa-hospital "></i>
                                       <label> Objects</label>
                                       <select  name="" class="form-control object" placeholder="Address" required 
                                          style="background-color: #F8F8F8 !important;">
                                          <option>Choose object</option>
                                       </select>
                                    </div>

                                    <div class="col-lg-4" id="selfloor">
                                       <i class="fa fa-arrow-up-1-9"></i>
                                       <label> Floor</label> 
                                       <select class="js-example-basic-single bg-light form-control">
                                          <option style="background-color: #F8F8F8 !important"; value="">Choose floor</option>
                                       </select>
                                    </div>
                                 </div>

                                 <div class="row mb-3" >

                                    <div class="col-lg-4" id="selroom">
                                       <i class="fa fa-house"></i>
                                       <label> Flat</label> 
                                       <select class="js-example-basic-single bg-light form-control" 
                                          style="background-color: #F8F8F8 !important;" onchange="a()">
                                          <option>Choose flat</option>
                                       </select>
                                    </div>

                                    <div class="col-lg-4" id="selworker">
                                    </div>

                                    <div class="col-lg-3">
                                       <i class=" fas fa-calculator"></i>
                                       <label>Surface 2^m</label> 
                                       <input type="text" class="form-control" name="surface" style="background-color: #F8F8F8 !important;">
                                    </div>

                                     <div class="col-lg-1 ">
                                       <label>Finish</label><br>
                                        <input name="status" class=" form-control flexCheckDefault " type="checkbox" value="true" id="flexCheckDefault" style="width:50px !important;height: 35px;background-color:red !important;" checked>
                                    </div>
 
                                 </div>

                                 <div class="row mb-3">
                                    <!-- <div class="col-lg-4">
                                       <i class="fa fa-dollar-sign"></i> 
                                       <label> Fee</label>
                                       <?php 
                                          $sqlfee = mysqli_query($link,"SELECT * FROM objects WHERE id = '$fid'");
                                          $feeres = mysqli_fetch_assoc($sqlfee);
                                       ?>
                                       <input type="text" class="form-control" name="fee" style="background-color:#F8F8F8 !important;" value="<?=$feeres['fee']?>"> -->
                                    <!-- </div> -->
                                    
                                   
                                    <div class="ml-3">
                                    <label>Add</label>
                                    <button type="button" onclick="myFunction()" class="btn btn-primary form-control" style="padding:5px;"><i class="fa fa-plus"></i></button>
                                    </div>
                                    <div class="col-lg-3" id="card" style="background-color:#fff !important;">
                                    <label>New worker</label>
                                    <div class="row">
                                    <div class="col-lg-8">
                                    <input list="opt" name="worker" id="addworker" name="addworker"  class="form-control" style="background-color: #F8F8F8 !important;">
                                    <datalist id="opt">
                                    <?php 
                                       foreach($sql_worker as $opt){
                                       ?>
                                    <option style="background-color: #F8F8F8 !important"; value="<?=$opt['name'];?>">
                                    <? } 
                                       ?>
                                    </datalist>
                                    </div>

                                    <div class="col-lg-1">
                                    <button type="button" class="btn btn-primary" name="addworker" onclick="add()">add</button>
                                    </div>
                                    </div>
                                    </div>   
                                 </div>

                                 
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
         &copy 2023 All rigth reserved.
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
      <!-- <script src="../assets/libs/jquery/dist/jquery.min.js"></script> -->
      <script src="../js/jquery-3.6.3.min.js"></script>
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
      <script src="../assets/all.min.js"></script>
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
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script type="text/javascript">
         $(document).ready(function() {
           $(".js-example-basic-single").select2();
           $(".js-example-basic-single")..css("background-color", "yellow");

         });
      </script>
      <script>
         //***********************************//
         // For select 2
         //***********************************//
         $(".select2").select2();
         
         $('#project').change(function (e) {
             e.preventDefault();
             let project = $(this).val();
         
             $.ajax({
                 url: "obj.php",
                 type: "POST",
                 data:{
                     project:project,
                 },
                 success:function(data) {
                    $('#test').html(data);
                 },
                 error:function(xhr){
                     alert("Coonnecting error!!!");
                 }
             });
         });
         
         // $('#browsers').empty();
         
         
         
         function add(){
         
                 let addworker = $('#addworker').val();
         
                 $.ajax({
                     url: "add_room.php",
                     type: "POST",
                     data: {
                         name:addworker
                     },
                     success:function(data){
                         var obj = jQuery.parseJSON(data);
                         if(obj.xatolik == 0){
                             swal('Good job!!',obj.xabar,'success');
                         }
                         else {
                             swal('Error!!',obj.xabar,'error');
                         }
                         
                     },
                     error:function(xhr){
                         alert("Coonnecting error!!!");
                     }
                 });
             
         }

          function finexsecob(){

            // alert("extra section of obj")
         
                 let exsection = $('#exsection').val();
                 let fid = $('.object').val();
         
                 $.ajax({
                     url: "finexsecob.php",
                     type: "POST",
                     data: {
                         object:exsection,
                         fid:fid,
                     },
                     success:function(data){
                         var obj = jQuery.parseJSON(data);
                         if(obj.xatolik == 0){
                             swal('Good job!!',obj.xabar,'success');
                         }
                         else {
                             swal('Error!!',obj.xabar,'error');
                         }
                         
                     },
                     error:function(xhr){
                         alert("Coonnecting error!!!");
                     }
                 });
             
         }

          function finexobf(){

            // alert("extra floor")
         
                 let extrafloor = $('#extrafloor').val();
                 let obj_id = $('.object').val();
         
                 $.ajax({
                     url: "finexobf.php",
                     type: "POST",
                     data: {
                         floor:extrafloor,
                         id:obj_id
                     },
                     success:function(data){
                         var obj = jQuery.parseJSON(data);
                         if(obj.xatolik == 0){
                             swal('Good job!!',obj.xabar,'success');
                         }
                         else {
                             swal('Error!!',obj.xabar,'error');
                         }
                         
                     },
                     error:function(xhr){
                         alert("Coonnecting error!!!");
                     }
                 });
             
         }

         function finexob(){

            // alert("extra object")
         
                 let finexob = $('input[name=object]').val();
                 let obj_id = $('.object').val();

                 
         
                 $.ajax({
                     url: "finexob.php",
                     type: "POST",
                     data: {
                         section:finexob,
                         id:obj_id
                     },
                     success:function(data){
                         var obj = jQuery.parseJSON(data);
                         if(obj.xatolik == 0){
                             swal('Good job!!',obj.xabar,'success');
                         }
                         else {
                             swal('Error!!',obj.xabar,'error');
                         }
                         
                     },
                     error:function(xhr){
                         alert("Coonnecting error!!!");
                     }
                 });
             
         }

         
         
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
         $('#report').submit(function(e){
             e.preventDefault();
             let report = $('#report').serialize();
         
             $.ajax({
                 url: "valid.php",
                 type: "POST",
                 data: report,
                 success:function(data){
                     var obj = jQuery.parseJSON(data);
                     if(obj.xatolik == 0){
                         swal('Good job',obj.xabar,'success');
                         function ref() {
                             window.location.href = '../reports/index.php';
                         }
         
                         const p = setTimeout(ref,500);
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
      <script type="text/javascript">
         $('.uchir').click(function() {
             
             let id = $(this).attr("salom");
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
                 swal("Exellent! Project deleted successfully!!!", {
                   icon: "success",
                 });
                  function rel(){
                             location.reload();
                 }
                 const d = setTimeout(rel,800);
                 $.ajax({
                 url: "delete.php",
                 type: "POST",
                 data:{
                     id:id,
                 },
                 success:function(data){
                     console.log(data);
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
         
         });
      </script>
      <script type="text/javascript">
         function myFunction() {
               var x = document.getElementById("card");
               if (x.style.display === "block") {
                   x.style.display = "none";
                   // console.log(1111)
               } 
               else {
                   x.style.display = "block";
                   // console.log(2222)
               }
         }
         
      </script>
      <script type="text/javascript">
         function a(){
         
          let idf = $('.object').val();
              
              $.ajax({
                  url: "floor.php",
                  type: "POST",
                  data:{
                      idf:idf,
                  },
                  success:function(data) {
                     $('#selfloor').html(data);
                      // alert(data)
                  },
                  error:function(xhr){
                      alert("Coonnecting error!!!");
                  }
              });
         }
      </script>
      <script type="text/javascript">
         function b(){
         
             let idr = $('.object').val();
         
             $.ajax({
                     url: "room.php",
                     type: "POST",
                     data:{
                         idr:idr,
                     },
                     success:function(data) {
                        $('#selroom').html(data);
                         // alert(data)
                     },
                     error:function(xhr){
                         alert("Coonnecting error!!!");
                     }
                 });
         
         }
      </script>
      <script type="text/javascript">
         let idw = 1
           $.ajax({
                     url: "worker.php",
                     type: "POST",
                     data:{
                         idw:idw,
                     },
                     success:function(data) {
                        $('#selworker').html(data);
                         // alert(data)
                     },
                     error:function(xhr){
                         alert("Coonnecting error!!!");
                     }
                 });
      </script>
   </body>
</html>
<? }
   else {
       header("Location:index.php");
   }
   
   ?>