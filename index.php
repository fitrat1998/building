<?php 
    session_start();

 if (!$_SESSION['user']) {
?>
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Building and repairing</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="assets/mystyles.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
                <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db text-white"><h2><i class="mdi mdi-account-card-details"></i> Welcome to the ROBA calculation system</h2></span>
                    </div>
                    <!-- Form -->
                    <form method="POST" class="form-horizontal m-t-20" id="login" >
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Username"   required="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="text" name="password" class="form-control form-control-lg" placeholder="Password"   required="" >
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <h4 class="text-center"><button class="btn btn-success mybtn " type="submit" name="sub"><i class="mdi mdi-login"></i> Login</button></h4>
                        </div>
                    </form>
                    <div class="border-top border-secondary"></div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <!-- <script src="assets/libs/jquery/dist/jquery.min.js"></script> -->
    <script src="js/jquery-3.6.3.min.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>

    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    // $('#to-recover').on("click", function() {
    //     $("#login").slideUp();
    //     $("#recoverform").fadeIn();
    // });
    // $('#to-login').click(function(){
        
    //     $("#recoverform").hide();
    //     $("#login").fadeIn();
    // });
    </script>

    <script>
        $('#login').submit(function(e){
            e.preventDefault();
           let login = $('#login').serialize();
           console.log(login)

           $.ajax({
                url: "login.php",
                type: "POST",
                data : login,
                success:function(data){
                    console.log(data);
                    if(data === "good"){
                        swal('Good job!',"Conguratulations",'success');
                        function ref(){
                            location.reload();
                        }

                        const l = setTimeout(ref,300);
                    }
                    else{
                        swal('Error!',data,'error');
                    }
                },
                error:function(xhr){
                    alert('Connecting error, check your network');
                }
           });
        });
    </script>

</body>

</html>
<? } 
else {
    header("Location:dashboard.php");
}