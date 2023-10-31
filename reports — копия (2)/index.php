<?php 
   session_start();
   include '../config.php';
   include '../date.php';
   $res = array();
   
   $sql = mysqli_query($link,"SELECT * FROM report_worker");
   $sql2 = mysqli_query($link,"SELECT * FROM workers WHERE id = ");
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
      <title>ROBO-REPORT FLAT</title>
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

                     <!-- <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                        href="../project/index.php" >
                        <i class="fa fa-building ml-2"></i><span class="hide-menu ml-2">Projects</span></a>
                     </li> -->

                     <li class="sidebar-item"><a href="../object/index.php" class="sidebar-link"><i class="fa fa-house ml-2"></i>
                        <span class="hide-menu ml-2">Objects</span></a>
                     </li>

                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                        href="../project/index.php" >
                        <i class="mdi mdi-worker"></i>
                        <span class="hide-menu">Workers</span></a>
                     </li>

                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                        href="../fee/index.php" >
                        <i class="fa fa-dollar-sign ml-2"></i>
                        <span class="hide-menu ml-2">Workers fee</span></a>
                     </li>


                    <!--  <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                        href="../report/index.php" >
                        <i class="mdi mdi-plus"></i>
                        <span class="hide-menu">Add new report</span></a>
                     </li> -->

                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                        href="index.php" >
                        <i class="mdi mdi-border-all"></i>
                        <span class="hide-menu">Reports</span></a>
                     </li>
                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                        href="../workers report/index.php" >
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
                        <span class="hide-menu ml-2"> Add extra objects</span></a>
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
                     <h4 class="page-title"><a href="../reports3/index.php">Object </a></h4>
                        <span class="ml-2">/</span>  
                       <h4 class="page-title ml-2"><a href="../reports2/index.php"> Floor</a></h4>
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
               <div class="row">
                  <div class="col-lg-12">
                     <div class="card">
                        <div class="card-body">
                           <div class="row mb-3" >
                               <!--  -->

                                  <div class="col-lg-4" id="test">
                                    <i class=" fas fa-hospital "></i>
                                    <label> Objects</label>
                                       <select name="object_name" class="form-control object" placeholder="Address" required id="object" onchange="d()">
                                       <option>Choose object</option> 
                                    <?php 
                                       $sql3 = mysqli_query($link,"SELECT * FROM objects GROUP BY obj_name HAVING COUNT(obj_name) > 0");
                                       while ($row3 = mysqli_fetch_assoc($sql3)) {
                                          ?>
                                                style="background-color: #F8F8F8 !important;">
                                                <option value="<?=$row3['obj_name']?>"><?=$row3['obj_name']?></option>
                                          <?
                                       }
                                    ?>
                                             </select>
                                 </div>

                               

                              <div class="row mb-3">
                                 
                                 
                              </div>
                        </div>
                     </div>
                  </div>
               </div>

               <div class="card">

                  <div class="card-body">
                     <h5 class="card-title">Reports</h5>
                     
                     <div class="table-responsive" id="">
                       <table border="0" cellspacing="5" cellpadding="5">
                                <tbody><tr>
                                    <td>Minimum date:</td>
                                    <td><input type="text" id="min" name="min"></td>
                                </tr>
                                <tr>
                                    <td>Maximum date:</td>
                                    <td><input type="text" id="max" name="max"></td>
                                </tr>
                            </tbody></table>
                        <table id="example" class="display nowrap table" style="width:100%">
                           <thead>
                              <tr>
                                 <th>Object name</th>
                                 <th>Flat</th>
                                 <th>Section</th>
                                 <th>Surface</th>
                                 <th>Date</th>
                                 <th>Updated date</th>
                                 <th>Comment</th>
                                 <th>Edit</th>
                                 <th>Delete</th>
                                 <!-- <th>Status</th> -->
                                 
                              </tr>
                           </thead>
                           <tbody id="tbody">
                              
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <footer class="footer text-center">
               &copy 2023 All right reserved.
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
      
    <!--    <script type="text/javascript">
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
         //function b(){
         
             let id2 = $('#floor').val();
             // alert(id2)
         
             $.ajax({
                     url: "room.php",
                     type: "POST",
                     data:{
                         id2:id2,
                     },
                     success:function(data) {
                        $('#flat').html(data);
                         // alert(data)
                     },
                     error:function(xhr){
                         alert("Coonnecting error!!!");
                     }
                 });
         //}
      </script>
      <script type="text/javascript">
         //function c(){
         
          let ids = $('#flats').val();
              
              $.ajax({
                  url: "select.php",
                  type: "POST",
                  data:{
                      ids:ids,
                  },
                  success:function(data) {
                     $('#select').html(data);
                      // console.log(data)
                  },
                  error:function(xhr){
                      alert("Coonnecting error!!!");
                  }
              });
         //}
      </script> -->

      <script type="text/javascript">
          function d(){
         
          let ide = $('#object').val();
             // console.log(ide)
         
              
              $.ajax({
                  url: "table.php",
                  type: "POST",
                  data:{
                      ide:ide,
                  },
                  success:function(data) {
                     // console.log(data)
                     const obj = jQuery.parseJSON(data)
                     const table = new DataTable('#example');
                     for (var i = 0; i <= obj.length - 1; i++) {
                        // console.log(obj[i])
                         table.row
                             .add([
                                 obj[i][0],
                                 obj[i][1],
                                 obj[i][2],
                                 obj[i][3],
                                 obj[i][4],
                                 obj[i][5],
                                 obj[i][6],
                                 '<button class="btn btn-success"><a class="text-white" href=edit.php?id='+ obj[i][7]+'><i class="fa fa-pencil"></i></a></button>',

                                 '<form id="delete" class=""><button type="button" class="btn btn-danger uchir" onclick="del()" salom='+console.log(obj[i][8])+'><i class="fa fa-trash"></i></button></form>',
                                
                              
                                
                             ])
                             .draw(false);
                     }
                     // console.log(data)

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
         
      </script>
      <script type="text/javascript">
         $('#worker').submit(function(e){
             e.preventDefault();
             let worker = $('#worker').serialize();
         
             $.ajax({
                 url: "valid.php",
                 type: "POST",
                 data: worker,
                 success:function(data){
                     var obj =jQuery.parseJSON(data);
                     if(obj.xatolik == 0){
                         swal('Good job',obj.xabar,'success');
                         function ref() {
                             location.reload();
                         }
         
                         const p = setTimeout(ref,400);
                     }
                     else {
                         swal('Error!!!',obj.xatolik,'error');
                     }
                 },
                 error:function(xhr){
                     alert("Coonnecting error");
                 }
             });
         });
      </script>
      <script type="text/javascript">
         // $('.uchir').click(function() {

            function del(){
             
             let id = $(this).attr('salom');
 
             alert(id)
         
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

            }

         // });
      </script>
      <!-- <script type="text/javascript" src=" https://code.jquery.com/jquery-3.5.1.js"></script> -->
      <script type="text/javascript" src="assets/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="assets/moment.min.js"></script>
      <script type="text/javascript" src="assets/dataTables.dateTime.min.js"></script>
      <!-- <script type="text/javascript" src=".js"></script>  -->
      <script type="text/javascript" src="assets/dataTables.buttons.min.js"></script> 
      <script type="text/javascript" src="assets/jszip.min.js"></script> 
      <script type="text/javascript" src="assets/pdfmake.min.js"></script> 
      <script type="text/javascript" src="assets/vfs_fonts.js"></script> 
      <script type="text/javascript" src="assets/buttons.html5.min.js"></script> 
      <script type="text/javascript" src="assets/buttons.print.min.js"></script>
        <script>
         $(".select2").select2();
      </script>
      <script type="text/javascript">
         var minDate, maxDate;
         
         // Custom filtering function which will search data in column four between two values
         DataTable.ext.search.push(function (settings, data, dataIndex) {
         var min = minDate.val();
         var max = maxDate.val();
         var date = new Date(data[4]);
         
         if (
             (min === null && max === null) ||
             (min === null && date <= max) ||
             (min <= date && max === null) ||
             (min <= date && date <= max)
         ) {
             return true;
         }
         return false;
         });
         
         // Create date inputs
         minDate = new DateTime('#min', {
         format: 'MMMM Do YYYY'
         });
         maxDate = new DateTime('#max', {
         format: 'MMMM Do YYYY'
         });
         
         // DataTables initialisation
         var table = $('#example').DataTable();
         
         // Refilter the table
         $('#min, #max').on('change', function () {
         table.draw();
         });
      </script>
      <script type="text/javascript">
         $(document).ready(function() {
         $('#example').DataTable( {
             destroy:true,
             dom: 'Bfrtip',
             buttons: [
                 'copy', 'csv', 'excel', 'pdf', 'print'
             ]
         } );
         } );
      </script>
   </body>
</html>
<? }
   else {
       header("Location:index.php");
   }
   
   ?>