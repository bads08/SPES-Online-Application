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

  <!-- Google Font -->
  
  <style>
     hr{
       border: 1px #8000808a solid;
     }
   </style>
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-purple layout-top-nav fixed">
<!--loader-->
<!--<div class="overlays"><span class="spin"><img src="dist/img/preloader_3.gif" alt=""></span></div>-->
<div class="wrapper">

  <?php require_once "shared/header.php"?>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <section>
       <br>
        <div class="row">

          <div class="col-md-4">
         
          </div>
          <div class="col-md-4">
            <div class="login-box-body magictime slideRightReturn">
              <h4 class="text-purple text-bold">Setting Your Account</h4>
                <form action="admin/function/register.php" method="post">
                 
                 <div class="form-group">
                      <label for="">Im a:</label>
                      <select name="" id="" class="form-control">
                        <option value="">SPES Applicant</option>
                      </select>
                  </div>

                  <div class="form-group">
                      <label for="">Username:</label>
                      <input type="text" class="form-control" placeholder="Username" name="username" required autofocus>
                  </div>
                  <?php
                      if (isset($_SESSION["exist"])) {
                          echo $_SESSION["exist"];
                          unset($_SESSION["exist"]);
                       } 
                       ?>

                  <div class="form-group">
                      <label for="">Password:</label>
                      <input type="text" class="form-control" placeholder="Password" name="password" required>
                  </div>
                  <hr>

                  <div class="form-group">
                      <label for="">Firstname:</label>
                      <input type="text" class="form-control" placeholder="Firstname" name="fname" required>
                  </div>

                  <div class="form-group">
                      <label for="">Middle Name:</label>
                      <input type="text" class="form-control" placeholder="Middle Name" name="mname" required>
                  </div>

                  <div class="form-group">
                      <label for="">Lastname:</label>
                      <input type="text" class="form-control" placeholder="Lastname" name="lname" required>
                  </div>

                  <div class="form-group">
                      <label for="">Sex:</label>
                      <select name="sex" id="" class="form-control">
                        <option value="Select" disabled>Select</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                  </div>



                  <div class="form-group">
                      <label for="">Email:</label>
                      <input type="email" class="form-control" placeholder="e.g. myEmail@gmail.com" name="email" required>
                  </div>
             
                  <div class="form-group">
                      <label for="">Contact No:</label>
                      <input type="text" class="form-control" maxlength="11" placeholder="e.g. 09348576483" name="contact_no" required>
                  </div>
                  <br>
                  <div class="form-group">
                      <input type="submit" name="register" value="Submit" class="btn btn-primary"><br><br>
                      <center>Already have Account? <a href="login">Login here</a></center>
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
