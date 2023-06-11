<?php
 session_start();
 $status = $_SESSION["status"];
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
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

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
        <div class="row">
          <div class="col-md-3">
         
     
          </div>

          <div class="col-md-6">

           <?php
           if ($status == "applied") {?>
             <h3><i class="fa fa-check text-green"></i> <i><span class="text-white">You Already Applied.</span> <a href="home" class="btn bg-purple">OK</a></h3><br>
              
           <?php } else{?>
            <div class="alert bg-purple alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-info"></i> Notice!</h4>
            All data collected here is for SPES application porpuse only.
          </div>
          <form action="admin/function/application.php" method="post" enctype="multipart/form-data">
              <div class="well">
               <h4 class="text-purple">Fill-Up the required Information below to create your Application</h4>

                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="">First Name*</label>
                    <input type="text" class="form-control" name="fname" required placeholder="Firstname">
                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Last Name*</label>
                    <input type="text" class="form-control" name="lname" required placeholder="Lastname">
                  </div> 
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Gender*</label>
                    <select name="gender" id="" class="form-control" required>
                      <option disable>Select</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div> 
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Birthday*</label>
                    <input type="date" class="form-control" name="birthday" required>
                  </div> 
                  </div>
                </div>   

                <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                    <label>Contact No.*</label>
                    <input type="text" class="form-control" maxlength="11" name="contact_no" required placeholder="Contact number">
                  </div> 
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Address</label>
                    <input type="text" class="form-control" name="address" required placeholder="Address">
                  </div> 
                  </div>
                </div>

                  <div class="form-group">
                  <label for="exampleInputFile">Attach your Requirements here (<span class="text-yellow">Note: Youre file should be PDF format only.</span>)</label>
                    <input type="file" name="requirements[]" multiple class="form-control" id="file2" required>
                    <span class="file-message"></span>
                  </div>
                  <button type="submit" class="btn bg-purple btn-block btn-lg" id="appbtn" name="appBtn">Submit</button>
              </div> 
              </form>
           <?php } ?>
          
          </div>
        
          <div class="col-md-3">
         
          
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
