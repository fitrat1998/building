<?php 
   session_start();
   include '../config.php';
   include '../date.php';

    $sql = mysqli_query($link,"SELECT * FROM objects GROUP BY obj_name HAVING COUNT(obj_name) > 0");
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
      <title>ROBO-FINISH FLAT</title>
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
                        href="../worker/index.php" >
                        <i class="mdi mdi-worker"></i>
                        <span class="hide-menu">Workers</span></a>
                     </li>

                  <!--    <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                        href="../report/index.php" >
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
                        href="../fee/index.php" >
                        <i class="fa fa-dollar-sign ml-2"></i>
                        <span class="hide-menu ml-2">Workers fee</span></a>
                     </li>

                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                        href="../surface report/index.php" >
                        <i class="mdi mdi-border-all"></i>
                        <span class="hide-menu">Surface report</span></a>
                     </li>

                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                        href="../extra objects/index.php" >
                        <i class="fa fa-bath ml-2"></i>
                        <span class="hide-menu ml-2">Add extra objects</span></a>
                     </li>

                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                        href="../finish_section/index.php" >
                        <i class="fa-solid fa-square-parking ml-2"></i>   
                         <span class="hide-menu ml-1 ml-2"> Sections of Objects</span></a>
                     </li>

                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                        href="../finish_floor/index.php" >
                         <i class="fa fa-stairs ml-2"></i> 
                         <span class="hide-menu ml-1 ml-2"> Sections of Floors</span></a>
                     </li>

                     <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" 
                        href="index.php" >
                        <i class="fa fa-person-shelter ml-2"></i>
                        <span class="hide-menu ml-1 ml-2">Section of flat</span></a>
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
                     <h4 class="page-title">
                       <button onclick="myFunction()" class="font-light text-white m-b-20 btn btn-primary" >
                    <span style="font-size:14px !important;">Add <i class="fa fa-plus"></i></span>
                   </button  name="add"><br>
                     </h4>
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

                <div id="" >
                  <div class="row" >
                     <div class="col-lg-12">
                        <div class="card" >
                           <div class="card-body" >
                              <form method="POST" id="report" >
                                 <h3 class="text-center border-bottom m-b-20">
                                 </h3>
                                 
                                  <div class="row mb-3" >
                                 
                                    <div class="col-lg-4" id="test">
                                       <i class=" fas fa-hospital "></i>
                                       <label> Objects</label>
                                       <select  name="object_name" class="form-control object" placeholder="Address" required 
                                          style="background-color: #F8F8F8 !important;" id="object" onchange="b()">
                                          <option>Choose object</option>
                                          <?php 
                                             while ($rows = mysqli_fetch_assoc($sql)) {
                                                ?>
                                                   <option value="<?=$rows['obj_name']?>">
                                                   <?php echo $rows['obj_name'];?>
                                                   </option>
                                                <?
                                             }
                                          ?>

                                       </select>
                                    </div>

                                    <div class="col-lg-4" id="selroom">
                                       <i class="fa fa-house"></i>
                                       <label> Flat</label> 
                                        <select name="room" class="js-example-basic-single bg-light form-control" 
                                        style="background-color: #F8F8F8 !important;">
                                        <option>Choose flat</option>
                                         
                                      </select>
                                    </div>

                                    <div class="col-lg-4" id="selroom">
                                       <i class="fa fa-calendar"></i>
                                       <label> Date</label> 
                                        <input type="date" name="date" class="form-control">
                                    </div>

                                    </div>

                                    <div class="row mb-3" id="generated">
                                    
                                    

                                    
                                     </div>


                                 
                                 <button type="submit" class="btn btn-success float-justify" ><h4>Submit</h4></button>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>

                <div class="card">
                    <div class="card-body">
                       <h3 class="card text-center"><i class="fa fa-house"></i> Section of flat</h3><hr>
                        <div class="table-responsive">
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
                            <table id="example" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <!-- <th>Object</th> -->
                                        <th>Flat</th>
                                        <?php 
                                          $sql_sec = mysqli_query($link,"SELECT * FROM sections WHERE parent='flat'");
                                          while ($row_sec = mysqli_fetch_assoc($sql_sec)) {
                                             ?>
                                                <th><?=$row_sec['section_name']?></th>
                                             <?
                                          }
                                        ?>
                                        <th>Created date</th>
                                        <th>Updatedd date</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                        $sql = mysqli_query($link,"SELECT * FROM extra_object WHERE  flat > 0");
                                        while($row = mysqli_fetch_assoc($sql)){?>
                                            <tr>
                                            <td><?=$row['flat']?></td>
                                            <?php
                                                $ids = $row['surface'];
                                                $exploded = explode(",", $ids);
                                                array_pop($exploded);
                                                foreach($exploded as $item){
                                                   if($item){
                                                      ?>
                                                          <td><?=$item?></td>
                                                      <?
                                                   }
                                                   else {
                                                      ?>
                                                          <td>0</td>
                                                      <?
                                                   }
                                                }
                                            ?>
                                            <td><?=date("Y-m-d",$row['created_date'])?></td>
                                            <td>
                                            <?php
                                                if($row2['updated_date']) echo date("Y-m-d",$row['updated_date']);
                                                else echo 0;
                                            ?>
                                          </td>

                                          
                                          <td><a href="edit.php?id=<?=$row['id']?>"><i class="fa fa-pencil btn-success p-10"></i></a></td>
                                          <td>
                                            <form id="delete" class="">
                                            <button type="button" class="btn btn-danger uchir" salom="<?=$row['id']?>"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                        <?}
                                      ?>
                                </tbody>
                            </table>
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
      <script src="../assets/all.min.js"></script>
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
      <script src="" integrity="" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    <script type="text/javascript" src="assets/select.min.js"></script>
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
        dom: 'Bfrtip',
        destroy:true,
        buttons: [
            'copy',
            'csv',
            'excel',
            'pdf',
            {
                extend: 'print',
                text: 'Print ',
                exportOptions: {
                    modifier: {
                        selected: null
                    },
                    rows: ':visible'
                }
            }
        ],
        select: true
    } );
} );
    </script>

      <script type="text/javascript">
        
           $(".js-example-basic-single").css("background-color", "yellow");
           

           $(document).ready(function() {
              $(".js-example-basic-multiple").select2();
              $(".js-example-basic-multiple").css("background-color","gray");
            });

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
       function change(){
            
            let room_id = $('#room').val();
         
             $.ajax({
                 url: "table.php",
                 type: "POST",
                 data:{
                     num:room_id,
                 },
                 success:function(data) {
                    $('#generated').html(data);
                    // alert(data)
                 },
                 error:function(xhr){
                     alert("Coonnecting error!!!");
                 }
             });      
         }
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
         
         
         
        

          function finish(){

            // alert("extra section of obj")
         
                 let section = $('#section').val();
                 let fid = $('.object').val();
         
                 $.ajax({
                     url: "finish.php",
                     type: "POST",
                     data: {
                         object:section,
                         id:fid,
                     },
                     success:function(data){
                        alert(data)
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
         $('#report').submit(function(e){
             e.preventDefault();
             let section = $('#section').val();
             let oid = $('#object').val();
             let surface = $('#surface').val();
             // section:section,
             //         object_id:oid,
             //         surface:surface
             let form = $('#report').serialize();

             $.ajax({
                 url: "valid.php",
                 type: "POST",
                 data: form,
                 success:function(data){
                  // console.log(data)
                     var obj = jQuery.parseJSON(data);
                     if(obj.xatolik == 0){
                         swal('Good job',obj.xabar,'success');
                         // function ref() {
                         //     location.reload();
                         // }
         
                         // const p = setTimeout(ref,500);
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
          function b(){
         
              let name = $('#object').val();
         
              $.ajax({
                      url: "room.php",
                      type: "POST",
                      data:{
                          name:name,
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
       function  com(){
            var x = document.getElementById("com");
              if (x.style.display === "block") {
                  x.style.display = "none";
                  console.log(1111)
              } 
              else {
                  x.style.display = "block";
                  console.log(2222)
              }
        }
    </script>***

   </body>
</html>
<? }
   else {
       header("Location:index.php");
   }
   
   ?>


<?php
session_start();
include "../config.php";
include '../date.php';


 $ide = $_POST["ide"];

 echo $ide;



// $sql = mysqli_query($link,"SELECT * FROM objects WHERE obj_name = '$ide' GROUP BY section_flat HAVING COUNT(section_flat) > 0");
// $row = mysqli_fetch_assoc($sql);
//  $extr = array();
//  array_push($extr, $row['id']);
//     $section = explode(",", $row['section_flat']);
//     array_pop($section);
 /*
 while ($row = mysqli_fetch_assoc($sql)) {
    array_push($extr, $row['id']);
    $section = explode(",", $row['section_flat']);
    array_pop($section);
 }
*/


?>
<thead>
  <tr>
  <?php  
    $sql2 = mysqli_query($link,"SELECT * FROM sections WHERE parent = 'flat'");

    $temp_arr = [];

    while ($row = mysqli_fetch_assoc($sql2)) {
       array_push($temp_arr,$row['id']);
        ?>
          <th><?=$row['section_name']?></th>
        <?
    }
    $temp_arr2 = [];

    $sql3 = mysqli_query($link,"SELECT * FROM extra_object WHERE object_name = '$ide'");

    while ($row3 = mysqli_fetch_assoc($sql3)) {
       array_push($temp_arr2,$row3);
    }

     
  ?>                                    
     <th>Flat</th>
     <th>Edit</th>
     <th>Delete</th>
     <th>Created date</th>
     <th>Updated date</th>

  </tr>
  </thead>
<tbody>
  <tr>
      <?php
        
         foreach ($temp_arr2 as $key => $value) {
          echo $value
          foreach ($temp_arr as $key2 => $value2) {
             if($value['surface'] == $value2){
                ?>
                  <td><?=$value['surface']?></td>

                <?
             }
             else {
                ?>
                  <td>0</td>
                <?
             }
          }

      ?>
         <td><?=$value['flat']?></td>
         <td><a class="btn btn-success" href="edit.php?id=<?=$value['id']?>"><i class="fa fa-pencil"></i></a></td>
         <td>
            <form id="delete" class="">
            <button type="button" class="btn btn-danger uchir" salom="<?=$row['id']?>"><i class="fa fa-trash"></i></button>
            </form>
        </td>
         <td><?=date("Y-m-d",$value['flat']);?></td>
         <td>
          <?php
           if($value['updated_date']) echo $value['update'];
           else echo 0;
            ?>
          </td>
    </tr>
</tbody>
<?
       }
?>
   



 <div class="row mb-3" >
                                 
                                    <div class="col-lg-4" id="test">
                                       <i class=" fas fa-hospital "></i>
                                       <label> Objects</label>
                                       <select  name="object_name" class="form-control object" placeholder="Address" required 
                                          style="background-color: #F8F8F8 !important;" id="object" onchange="b()">
                                          <option>Choose object</option>
                                          <?php 
                                             while ($rows = mysqli_fetch_assoc($sql)) {
                                                ?>
                                                   <option value="<?=$rows['obj_name']?>">
                                                   <?php echo $rows['obj_name'];?>
                                                   </option>
                                                <?
                                             }
                                          ?>

                                       </select>
                                    </div>

                                    <div class="col-lg-4" id="selroom">
                                       <i class="fa fa-house"></i>
                                       <label> Flat</label> 
                                        <select name="room" class="js-example-basic-single bg-light form-control" 
                                        style="background-color: #F8F8F8 !important;">
                                        <option>Choose flat</option>
                                         
                                      </select>
                                    </div>

                                    <div class="col-lg-4" id="selroom">
                                       <i class="fa fa-calendar"></i>
                                       <label> Date</label> 
                                        <input type="date" name="date" class="form-control">
                                    </div>

                                 </div>

                                 <diw class="row mb-3"></diw>
                                    
                                     <div class="row" id="test">
                                       <div class="col-lg-4">
                                          <?php 
                                             $sql2 = mysqli_query($link,"SELECT * FROM sections WHERE parent='flat'");

                                             while ($row2 = mysqli_fetch_assoc($sql2)) {
                                                 $count = count($row2);

                                                 ?>
                                                    <br />
                                                    <i class=" fas fa-calculator "></i>
                                                    <label><?=$row2['section_name']?></label>
                                                    <input type="text" name="<?=$row2['section_name']?>" class="form-control object" placeholder="<?=$row2['section_name']?> surface" required style="background-color: #F8F8F8 !important;" id="surface">

                                                    <i class="mdi mdi-worker"></i>
                                                   <label>Workers</label><br>
                                                   <select name="worker[]" class="js-example-basic-multiple form-control" multiple="multiple" style="background-color: #F8F8F8 !important;width: 380px !important; " required>
                                                    <?php 
                                                      $sql3 = mysqli_query($link,"SELECT * FROM workers");
                                                      while($rows = mysqli_fetch_assoc($sql3)){
                                                         ?>
                                                            <option class="form-control" value="<?=$rows['id']?>"><?=$rows['name']?></option>
                                                         <?
                                                      }
                                                    ?>
                                                   </select>
                                                 <?

                                             }
                                        ?>
                                       </div>  
                                    </div>
                                  
                                 
                                 </div>

                                     

                                    <div class="col-lg-4">
                                       <i class="mdi mdi-worker"></i>
                                       <label>Workers</label><br>
                                       <select name="worker[]" class="js-example-basic-multiple form-control" multiple="multiple" style="background-color: #F8F8F8 !important;width: 380px !important; " required>
                                        <?php 
                                          $sql3 = mysqli_query($link,"SELECT * FROM workers");
                                          while($rows = mysqli_fetch_assoc($sql3)){
                                             ?>
                                                <option class="form-control" value="<?=$rows['id']?>"><?=$rows['name']?></option>
                                             <?
                                          }
                                        ?>
                                       </select>
                                    </div>

                                    <div class="col-lg-3">
                                       <label>Comment</label><br>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input name="check" class=" form-control flexCheckDefault " type="checkbox" value="true" id="flexCheckDefault" style="width:50px !important;height: 35px;background-color:red !important;" onchange="com()" id="">
                                            </div>
                                            <div class="col-md-10 comment" id="com">
                                                <input type="text" name="comment" class="form-control "
                                                style="background-color: #F8F8F8 !important;">
                                            </div>
                                        </div>
                                    </div>

                                    
                                 </div>



$row2 = mysqli_fetch_assoc($sql2);
                                             $count = count($row2);
                                             for($i = 0; $i <= $count; $i++){
                                                ?>
                                                   <i class=" fas fa-calculator "></i>
                                                   <label> Surface 2^m</label>
                                                   <input type="text" name="surface" class="form-control object" placeholder="surface" required style="background-color: #F8F8F8 !important;" id="surface">
                                                <?
                                             }



$sql = mysqli_query($link,"SELECT extra_object.object_name,objects.obj_name, extra_object.section, SUM(extra_object.surface),extra_object.created_date,extra_object.updated_date
      FROM objects INNER JOIN extra_object  ON objects.obj_name=extra_object.object_name GROUP BY section HAVING COUNT(extra_object.section) > 0");
<?php 
session_start();
include '../config.php';
include '../date.php';

$sql_project = mysqli_query($link,"SELECT * FROM projects");

$title = "OBJECTS - ROBO";

 if($_SESSION['user']){
 
 require "$_SERVER[DOCUMENT_ROOT]/header.php";   

?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">
                             <button onclick="myFunction()" class="font-light text-white m-b-20 btn btn-primary" >
                                    <span style="font-size:14px !important;">Add <i class="fa fa-plus"></i></span>
                                   </button  name="add"><br>
                        </h4>
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

             <div id="" >
                  <div class="row" >
                      <div class="col-lg-12">
                         <div class="card" >
                            <div class="card-body" >
                             <form method="POST" id="object" >
                               <div class="row mb-3" >
                                   <div class="col-lg-4">
                                    <i class=" fas fa-hospital-alt "></i>
                                     <label> Project id</label> 
                                     <select name="project_id" class="form-control" placeholder="Address" required 
                                      style="background-color: #F8F8F8 !important;">
                                     <?php 
                                        foreach($sql_project as $opt){
                                     ?>
                                        <option value="<?=$opt['id'];?>"><?=$opt['project_name'];?></option>
                                     <? } 
                                     ?>
                                     </select>
                                  </div>

                                  <div class="col-lg-4">
                                    <i class="fa fa-building"></i>
                                    <label>Object name</label>
                                     <input type="text" name="object_name" class="form-control" placeholder="Name of object" required style="background-color: #F8F8F8 !important;">
                                  </div>

                                  <div class="col-lg-4">
                                       <i class="fa fa-bath"></i>
                                       <label>Extra section of object</label><br>
                                       <select name="ob_sec[]" class="js-example-basic-multiple form-control" multiple="multiple" style="background-color: #F8F8F8 !important;width:!important; ">
                                        <?php 
                                          $sql = mysqli_query($link,"SELECT * FROM sections WHERE parent = 'object'");
                                          while($rows = mysqli_fetch_assoc($sql)){
                                             ?>
                                                <option class="form-control" value="<?=$rows['id']?>">
                                                    <?=$rows['section_name']?></option>
                                             <?
                                          }
                                        ?>
                                       </select>
                                    </div>

                                  

                                  

                               </div>

                               <div class="row mb-3" >

                                    <div class="col-lg-4">
                                    <i class="fa fa-arrow-up-1-9"></i>
                                    <label>Floors</label>
                                     <input type="text" name="floors" class="form-control" placeholder="Floor" required style="background-color: #F8F8F8 !important;">
                                  </div>

                                    <div class="col-lg-4">
                                    <i class="fa fa-house"></i>
                                    <label>Flats</label>
                                     <input type="text" name="rooms" class="form-control" placeholder="Room" required style="background-color: #F8F8F8 !important;">
                                  </div>

                                  <div class="col-lg-4">
                                       <label>Comment</label><br>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input name="check" class=" form-control flexCheckDefault " type="checkbox" value="true" id="flexCheckDefault" style="width:50px !important;height: 35px;background-color:red !important;" onchange="com()" id="">
                                            </div>
                                            <div class="col-md-10 comment" id="com">
                                                <input type="text" name="comment" class="form-control "
                                                style="background-color: #F8F8F8 !important;">
                                            </div>
                                        </div>
                                    </div> 

                                     
                               </div>
                               
                                   <button type="submit" class="btn btn-success float-justify"><h4>Submit</h4></button>
                                 </form>
                                </div>
                            </div>
                         </div>
                      </div>
                  </div>
            

            <div class="card">
                    <div class="card-body">
                       <h3 class="card text-center"><i class="fa fa-hospital-alt"></i> Objects </h3><hr>
                        <div class="table-responsive">
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
                            <table id="example" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Project name</th>
                                        <th>Object name</th>
                                        <th>Floors</th>
                                        <th>Flats</th>
                                        <th>Surface</th>
                                        <th>Fee</th>
                                       <!--  <th>Section</th>
                                        <th>Finished floors</th>
                                        <th>Finished flats</th> -->
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                        $sql = mysqli_query($link,"SELECT * FROM objects");
                                        while($row = mysqli_fetch_assoc($sql)){?>
                                            <tr>
                                            <td>
                                                <?php 
                                                    $id = $row['project_id'];
                                                    $sql2 = mysqli_query($link,"SELECT * FROM projects WHERE id = '$id'");
                                                    $res = mysqli_fetch_assoc($sql2);
                                                    echo $res['project_name'];;
                                                ?>
                                            </td>
                                            <td><?=$row['obj_name']?></td>
                                            <td><?=$row['floors']?></td>
                                            <td><?=$row['rooms']?></td>
                                            <td><?=$row['surface']?></td>
                                            <td><?=$row['fee']?></td>
                                            <!-- <td><?=$row['section']?></td>
                                            <td><textarea disabled><?=$row['finished_floor']?></textarea></td>
                                            <td><textarea disabled><?=$row['finished_flat']?></textarea></td> -->
                                            <td>
                                            <?php
                                                if($row['created_date']) echo date("d-m-Y",$row['created_date']);
                                                else echo date("d-m-Y",$row['updated_date']);
                                            ?>
                                          </td>
                                          <td><?=$row['status']?></td>
                                          <td><a href="edit.php?id=<?=$row['id']?>"><i class="fa fa-pencil btn-success p-10"></i></a></td>
                                          <td>
                                            <form id="delete" class="">
                                            <button type="button" class="btn btn-danger uchir" salom="<?=$row['id']?>"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                        <?}
                                      ?>
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
  <script type="text/javascript" src="../js/jquery-3.6.3.min.js"></script>
  
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
    <script type="text/javascript">
        
           $(".js-example-basic-single").css("background-color", "yellow");
           

           $(document).ready(function() {
              $(".js-example-basic-multiple").select2();
              $(".js-example-basic-multiple").css("background-color","gray");
            });

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
        $('#object').submit(function(e){
            e.preventDefault();
            let object = $('#object').serialize();

            alert(object)

            $.ajax({
                url: "valid.php",
                type: "POST",
                data: object,
                success:function(data){
                    console.log(data)
                    alert(data)
                    // var obj = jQuery.parseJSON(data);
                    // if(obj.xatolik == 0){
                    //     swal('Good job',obj.xabar,'success');
                    //     function ref() {
                    //         location.reload();
                    //     }

                    //     const p = setTimeout(ref,400);
                    // }
                    // else {
                    //     swal('Error!!!',obj.xabar,'error');
                    // }
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
                const d = setTimeout(rel,300);
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
       function  com(){
            var x = document.getElementById("com");
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

  

</body>

</html>
<? }
else {
    header("Location:index.php");
}

?>


<?php 
session_start();
include '../config.php';
include '../date.php';

define("SITE_URL",dirname(dirname($_SERVER['SERVER_NAME'])));

$sql_project = mysqli_query($link,"SELECT * FROM projects");

$title = "OBJECTS - ROBO";

 if($_SESSION['user']){

    require "$_SERVER[DOCUMENT_ROOT]/header.php";   
?>

        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">
                             <button onclick="myFunction()" class="font-light text-white m-b-20 btn btn-primary" >
                                    <span style="font-size:14px !important;">Add <i class="fa fa-plus"></i></span>
                                   </button  name="add"><br>
                        </h4>
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

             <div id="" >
                  <div class="row" >
                      <div class="col-lg-12">
                         <div class="card" >
                            <div class="card-body" >
                             <form method="POST" id="object" >
                               <div class="row mb-3" >
                                   <div class="col-lg-4">
                                    <i class=" fas fa-hospital-alt "></i>
                                     <label> Project id</label> 
                                     <select name="project_id" class="form-control" placeholder="Address" required 
                                      style="background-color: #F8F8F8 !important;">
                                     <?php 
                                        foreach($sql_project as $opt){
                                     ?>
                                        <option value="<?=$opt['id'];?>"><?=$opt['project_name'];?></option>
                                     <? } 
                                     ?>
                                     </select>
                                  </div>

                                  <div class="col-lg-4">
                                    <i class="fa fa-building"></i>
                                    <label>Object name</label>
                                     <input type="text" name="object_name" class="form-control" placeholder="Name of object" required style="background-color: #F8F8F8 !important;">
                                  </div>

                                  <div class="col-lg-4">
                                       <i class="fa fa-bath"></i>
                                       <label>Extra section of object</label><br>
                                       <select name="ob_sec[]" class="js-example-basic-multiple form-control" multiple="multiple" style="background-color: #F8F8F8 !important;width:!important; ">
                                        <?php 
                                          $sql = mysqli_query($link,"SELECT * FROM sections WHERE parent = 'object'");
                                          while($rows = mysqli_fetch_assoc($sql)){
                                             ?>
                                                <option class="form-control" value="<?=$rows['id']?>">
                                                    <?=$rows['section_name']?></option>
                                             <?
                                          }
                                        ?>
                                       </select>
                                    </div>

                                  

                                  

                               </div>

                               <div class="row mb-3" >

                                    <div class="col-lg-4">
                                    <i class="fa fa-arrow-up-1-9"></i>
                                    <label>Floors</label>
                                     <input type="text" name="floors" class="form-control" placeholder="Floor" required style="background-color: #F8F8F8 !important;">
                                  </div>

                                    <div class="col-lg-4">
                                    <i class="fa fa-house"></i>
                                    <label>Flats</label>
                                     <input type="text" name="rooms" class="form-control" placeholder="Room" required style="background-color: #F8F8F8 !important;">
                                  </div>

                                  <div class="col-lg-4">
                                       <label>Finish</label><br>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input name="check" class=" form-control flexCheckDefault " type="checkbox" value="true" id="flexCheckDefault" style="width:50px !important;height: 35px;background-color:red !important;" onchange="com()" id="">
                                            </div>
                                            <div class="col-md-10 comment" id="com">
                                                <input type="text" name="comment" class="form-control "
                                                style="background-color: #F8F8F8 !important;">
                                            </div>
                                        </div>
                                    </div> 

                                     
                               </div>
                               
                                   <button type="submit" class="btn btn-success float-justify"><h4>Submit</h4></button>
                                 </form>
                                </div>
                            </div>
                         </div>
                      </div>
                  </div>
            

            <div class="card">
                    <div class="card-body">
                       <h3 class="card text-center"><i class="fa fa-hospital-alt"></i> Objects </h3><hr>
                        <div class="table-responsive">
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
                            <table id="example" class="display nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Project name</th>
                                        <th>Object name</th>
                                        <th>Floors</th>
                                        <th>Flats</th>
                                        <th>Surface</th>
                                        <th>Fee</th>
                                       <!--  <th>Section</th>
                                        <th>Finished floors</th>
                                        <th>Finished flats</th> -->
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Update</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php 
                                        $sql = mysqli_query($link,"SELECT * FROM objects");
                                        while($row = mysqli_fetch_assoc($sql)){?>
                                            <tr>
                                            <td>
                                                <?php 
                                                    $id = $row['project_id'];
                                                    $sql2 = mysqli_query($link,"SELECT * FROM projects WHERE id = '$id'");
                                                    $res = mysqli_fetch_assoc($sql2);
                                                    echo $res['project_name'];;
                                                ?>
                                            </td>
                                            <td><?=$row['obj_name']?></td>
                                            <td><?=$row['floors']?></td>
                                            <td><?=$row['rooms']?></td>
                                            <td><?=$row['surface']?></td>
                                            <td><?=$row['fee']?></td>
                                            <!-- <td><?=$row['section']?></td>
                                            <td><textarea disabled><?=$row['finished_floor']?></textarea></td>
                                            <td><textarea disabled><?=$row['finished_flat']?></textarea></td> -->
                                            <td>
                                            <?php
                                                if($row['created_date']) echo date("d-m-Y",$row['created_date']);
                                                else echo date("d-m-Y",$row['updated_date']);
                                            ?>
                                          </td>
                                          <td><?=$row['status']?></td>
                                          <td><a href="edit.php?id=<?=$row['id']?>"><i class="fa fa-pencil btn-success p-10"></i></a></td>
                                          <td>
                                            <form id="delete" class="">
                                            <button type="button" class="btn btn-danger uchir" salom="<?=$row['id']?>"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                        <?}
                                      ?>
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
    <script type="text/javascript">
        
           $(".js-example-basic-single").css("background-color", "yellow");
           

           $(document).ready(function() {
              $(".js-example-basic-multiple").select2();
              $(".js-example-basic-multiple").css("background-color","gray");
            });

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
        $('#object').submit(function(e){
            e.preventDefault();
            let object = $('#object').serialize();

            $.ajax({
                url: "valid.php",
                type: "POST",
                data: object,
                success:function(data){
                    console.log(data)
                    alert(data)
                    // var obj = jQuery.parseJSON(data);
                    // if(obj.xatolik == 0){
                    //     swal('Good job',obj.xabar,'success');
                    //     function ref() {
                    //         location.reload();
                    //     }

                    //     const p = setTimeout(ref,400);
                    // }
                    // else {
                    //     swal('Error!!!',obj.xabar,'error');
                    // }
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
                const d = setTimeout(rel,300);
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
       function  com(){
            var x = document.getElementById("com");
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

  

</body>

</html>
<? }
else {
    header("Location:index.php");
}

?>

























<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title></title>
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.4.1/css/dataTables.dateTime.min.css">
</head>
<body>


<table border="0" cellspacing="5" cellpadding="5">
   <tbody>
      <tr>
         <td>Minimum date:</td>
         <td><input type="text" id="min" name="min" autocomplete="off"></td>
      </tr>
      <tr>
         <td>Maximum date:</td>
         <td><input type="text" id="max" name="max" autocomplete="off"></td>
      </tr>
   </tbody>
</table>
<div id="example_wrapper" class="dataTables_wrapper">
   <div class="dataTables_length" id="example_length">
      <label>
         Show 
         <select name="example_length" aria-controls="example" class="">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
            <option value="100">100</option>
         </select>
         entries
      </label>
   </div>
   <div id="example_filter" class="dataTables_filter"><label>Search:<input type="search" class="" placeholder="" aria-controls="example"></label></div>
   <table id="example" class="display nowrap dataTable" style="width:100%" aria-describedby="example_info">
      <thead>
         <tr>
            <th class="sorting sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 133.4px;">Name</th>
            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 221.575px;">Position</th>
            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 98.75px;">Office</th>
            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 40.0125px;">Age</th>
            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 87.175px;">Start date</th>
            <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 74.7625px;">Salary</th>
         </tr>
      </thead>
      <tbody>
         <tr class="odd">
            <td class="sorting_1">Airi Satou</td>
            <td>Accountant</td>
            <td>Tokyo</td>
            <td>33</td>
            <td>2008-11-28</td>
            <td>$162,700</td>
         </tr>
         <tr class="even">
            <td class="sorting_1">Angelica Ramos</td>
            <td>Chief Executive Officer (CEO)</td>
            <td>London</td>
            <td>47</td>
            <td>2009-10-09</td>
            <td>$1,200,000</td>
         </tr>
         <tr class="odd">
            <td class="sorting_1">Ashton Cox</td>
            <td>Junior Technical Author</td>
            <td>San Francisco</td>
            <td>66</td>
            <td>2009-01-12</td>
            <td>$86,000</td>
         </tr>
         <tr class="even">
            <td class="sorting_1">Bradley Greer</td>
            <td>Software Engineer</td>
            <td>London</td>
            <td>41</td>
            <td>2012-10-13</td>
            <td>$132,000</td>
         </tr>
         <tr class="odd">
            <td class="sorting_1">Brenden Wagner</td>
            <td>Software Engineer</td>
            <td>San Francisco</td>
            <td>28</td>
            <td>2011-06-07</td>
            <td>$206,850</td>
         </tr>
         <tr class="even">
            <td class="sorting_1">Brielle Williamson</td>
            <td>Integration Specialist</td>
            <td>New York</td>
            <td>61</td>
            <td>2012-12-02</td>
            <td>$372,000</td>
         </tr>
         <tr class="odd">
            <td class="sorting_1">Bruno Nash</td>
            <td>Software Engineer</td>
            <td>London</td>
            <td>38</td>
            <td>2011-05-03</td>
            <td>$163,500</td>
         </tr>
         <tr class="even">
            <td class="sorting_1">Caesar Vance</td>
            <td>Pre-Sales Support</td>
            <td>New York</td>
            <td>21</td>
            <td>2011-12-12</td>
            <td>$106,450</td>
         </tr>
         <tr class="odd">
            <td class="sorting_1">Cara Stevens</td>
            <td>Sales Assistant</td>
            <td>New York</td>
            <td>46</td>
            <td>2011-12-06</td>
            <td>$145,600</td>
         </tr>
         <tr class="even">
            <td class="sorting_1">Cedric Kelly</td>
            <td>Senior Javascript Developer</td>
            <td>Edinburgh</td>
            <td>22</td>
            <td>2012-03-29</td>
            <td>$433,060</td>
         </tr>
      </tbody>
      <tfoot>
         <tr>
            <th rowspan="1" colspan="1">Name</th>
            <th rowspan="1" colspan="1">Position</th>
            <th rowspan="1" colspan="1">Office</th>
            <th rowspan="1" colspan="1">Age</th>
            <th rowspan="1" colspan="1">Start date</th>
            <th rowspan="1" colspan="1">Salary</th>
         </tr>
      </tfoot>
   </table>
   <div class="dataTables_info" id="example_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div>
   <div class="dataTables_paginate paging_simple_numbers" id="example_paginate"><a class="paginate_button previous disabled" aria-controls="example" aria-disabled="true" aria-role="link" data-dt-idx="previous" tabindex="-1" id="example_previous">Previous</a><span><a class="paginate_button current" aria-controls="example" aria-role="link" aria-current="page" data-dt-idx="0" tabindex="0">1</a><a class="paginate_button " aria-controls="example" aria-role="link" data-dt-idx="1" tabindex="0">2</a><a class="paginate_button " aria-controls="example" aria-role="link" data-dt-idx="2" tabindex="0">3</a><a class="paginate_button " aria-controls="example" aria-role="link" data-dt-idx="3" tabindex="0">4</a><a class="paginate_button " aria-controls="example" aria-role="link" data-dt-idx="4" tabindex="0">5</a><a class="paginate_button " aria-controls="example" aria-role="link" data-dt-idx="5" tabindex="0">6</a></span><a class="paginate_button next" aria-controls="example" aria-role="link" data-dt-idx="next" tabindex="0" id="example_next">Next</a></div>
</div>
<script type="text/javascript" src="js/jquery-3.6.3.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/datetime/1.4.1/js/dataTables.dateTime.min.js"></script>
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
</body>
</html>