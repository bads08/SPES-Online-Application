<?php 
 session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SPES</title>
  <link rel="shortcut icon" href="dist\img\spes.png" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="dist/css/spes.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="bower_components/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="plugins\magic-master\dist\magic.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
   <style>
     /*.well{
            background-color: #f5f5f580;
          }*/
   </style>
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-purple layout-top-nav">
<!--loader-->
<div class="overlays"><span class="spin"><img src="dist/img/preloader_3.gif" alt=""></span></div>
<div class="wrapper">

  <?php require_once "shared/header.php"?>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="row">

          <div class="col-md-4">
         
          </div>
          <div class="col-md-4">
            <div class="well magictime slideRightReturn">
                <center><h3 class="text-purple">Login</h3></center>
              <br>
                <form action="admin/function/login2.php" method="post" id="formlogin">



                <div class="form-group has-feedback">
                  <label for="">Username</label>
                  <input type="text" class="form-control" name="username" placeholder="Enter username" required>
                  <span class="glyphicon glyphicon-user form-control-feedback"></span>
                  <?php
                      if (isset($_SESSION["not-found"])) {
                          echo $_SESSION["not-found"];
                          unset($_SESSION["not-found"]);
                       } 
                       ?>
                </div>
                  <div class="form-group has-feedback">
                    <label for="">Password</label>
                    <input type="password" class="form-control" placeholder="Enter password" name="password" placeholder="Enter password" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <?php
                      if (isset($_SESSION["wrong-pass"])) {
                          echo $_SESSION["wrong-pass"];
                          unset($_SESSION["wrong-pass"]);
                       } 
                       ?>
                  </div>

                  <div class="form">
                      <input type="submit" name="login" value="Login" class="btn btn-flat bg-purple"><br><br>
                      <center>No Account yet? <a href="register">Create here</a></center>
                  </div>
                </form>
            </div>
          </div>
          <div class="col-md-4">
         
          </div>


        </div>
      </section>
      
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
  <?php //require_once "shared/footer.php"?>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- Select2 -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/validateFile.js"></script>

<script>
  $(window).on("load", function () {
    $(".overlays").fadeOut("slow");
  });
  $("#appbtn").attr("disabled","");
  $("#appbtn").on("click",function () {
    $("#appbtn").html("Submitting...");
  });
  $('#file2').jqExtension({
   allowed: 'pdf', 
   validMessage: 'Valid', 
   invalidMessage: 'Invalid File (PDF file only allowed.)'
   });
</script>

</body>
</html>
